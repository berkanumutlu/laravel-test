<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Symfony\Component\HttpFoundation\Response;

class Language
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $languages = Cache::remember('languages', null, function () {
            return config('languages');
        });
        $default_language = Cache::remember('default_language', null, function () use ($languages) {
            foreach ($languages as $language) {
                if ($language['is_default'] == 1) {
                    return (object) $language;
                }
            }
            return (object) current($languages);
        });
        App::setLocale($default_language->code);
        Session::put('current_language', $default_language);
        $locale = $request->segment(1);
        if (!empty($locale) && strlen($locale) == 2) {
            if (isset($languages[$locale])) {
                App::setLocale($locale);
                Session::put('current_language', (object) $languages[$locale]);
            } else {
                abort(404);
            }
        }
        View::composer('web.layouts.index', function ($view) use ($request, $languages, $default_language) {
            $route_parameters = $request->route()->parameters();
            $is_route_dynamic = !empty($route_parameters);
            $languages_with_url = [];
            /*
             * Dinamik route tanımları için mevcut route tanımına ait tüm dillerin kayıtlarını alıp url'lerini oluşturuyor.
             */
            if ($is_route_dynamic) {
                if (count($route_parameters) == 1) {
                    $model = current($route_parameters);
                    if ($model instanceof \Illuminate\Database\Eloquent\Model) {
                        $records = $model->query()->where('language_group_id',
                            $model->language_group_id)->get()->pluck('slug', 'language_id')->toArray();
                        $route_parameter_name = current($request->route()->parameterNames());
                        $route_binding_field_name = $request->route()->bindingFieldFor($route_parameter_name);
                        $route_binding_field = $route_parameter_name.':'.$route_binding_field_name;
                        $route_query_string = $request->getQueryString();
                        $translate_key_name = 'routes.'.str_replace('.', '_', $request->route()->getName());
                        foreach ($languages as $language) {
                            if (isset($records[$language['id']])) {
                                $language_code = $language['code'];
                                $binding_value = $records[$language['id']];
                                $language['url'] = LaravelLocalization::getURLFromRouteNameTranslated($language_code,
                                    $translate_key_name, [$route_binding_field => $binding_value]);
                                if (!empty($route_query_string)) {
                                    $language['url'] .= '?'.$route_query_string;
                                }
                                $languages_with_url[] = (object) $language;
                            }
                        }
                    } else {
                        $route_binding_field = current($request->route()->parameterNames());
                        $binding_value = $model;
                        $route_query_string = $request->getQueryString();
                        $translate_key_name = 'routes.'.str_replace('.', '_', $request->route()->getName());
                        foreach ($languages as $language) {
                            $language['url'] = LaravelLocalization::getURLFromRouteNameTranslated($language['code'],
                                $translate_key_name, [$route_binding_field => $binding_value]);
                            if (!empty($route_query_string)) {
                                $language['url'] .= '?'.$route_query_string;
                            }
                            $languages_with_url[] = (object) $language;
                        }
                    }
                }
            } else {
                foreach ($languages as $language) {
                    $language['url'] = LaravelLocalization::getLocalizedURL($language['code']);
                    $languages_with_url[] = (object) $language;
                }
            }
            if (empty($languages_with_url)) {
                $languages_with_url = $languages;
            }
            $languages = $languages_with_url;
            $current_language = Session::get('current_language');
            $view->with(compact(['languages', 'default_language', 'current_language']));
        });

        //View::share('languages', $languages);

        //$request->merge(['languages' => $languages]);

        /*$request->attributes->add(['languages' => $languages]);
        $request->attributes->get('languages');*/

        /*App::instance('languages', $languages);
        $language_list = resolve('languages');*/

        return $next($request);
    }
}
