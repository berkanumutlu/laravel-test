<?php

namespace App\Providers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class WebServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        if (!request()->fullUrlIs('*admin*') && !request()->fullUrlIs('*api*')) {
            $this->app->singleton('languages', function () {
                return Cache::remember('languages', null, function () {
                    return config('languages');
                });
            });
            $this->app->singleton('default_language', function () {
                return Cache::remember('default_language', null, function () {
                    $languages = $this->app->languages;
                    foreach ($languages as $language) {
                        if ($language['is_default'] == 1) {
                            return (object) $language;
                        }
                    }
                    return (object) current($languages);
                });
            });
        }
    }

    /**
     * Bootstrap services.
     */
    public function boot(Request $request): void
    {
        View::composer(['web.*', 'layouts.email', 'web.email.*'], function ($view) use ($request) {
            $title = 'Laravel';
            $site_name = 'Laravel Website';
            $site_slogan = 'Site Slogan';
            $site_logo = !empty($settings->image_logo) ? asset($settings->image_logo) : asset('assets/web/images/logo.png');
            $current_language = get_current_language($request);
            $view->with(compact(['title', 'site_name', 'site_slogan', 'site_logo', 'current_language']));
        });
    }
}
