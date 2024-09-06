<?php

if (!function_exists('date_format_custom')) {
    function date_format_custom(string $date): string
    {
        return date('Y-m-d', strtotime($date));
    }
}
if (!function_exists('get_current_language')) {
    function get_current_language(\Illuminate\Http\Request $request): object
    {
        if (!session()->has('current_language')) {
            if (cache()->has('languages') || app('languages')) {
                $languages = cache()->get('languages') ?? app('languages');
                $locale = $request->segment(1);
                if (!empty($locale) && strlen($locale) == 2) {
                    if (isset($languages[$locale])) {
                        app()->setLocale($locale);
                        session()->put('current_language', (object) $languages[$locale]);
                    }
                } else {
                    session()->put('current_language', (object) $languages[app()->getLocale()]);
                }
            } elseif (cache()->has('default_language')) {
                session()->put('current_language', cache()->get('default_language'));
            }
        }
        return session()->get('current_language');
    }
}
if (!function_exists('elasticsearch_to_paginator')) {
    function elasticsearch_to_paginator(
        array $elasticsearch,
        $model,
        $perPage = 1,
        $page = 1
    ): \Illuminate\Pagination\LengthAwarePaginator {
        $total = $elasticsearch['hits']['total']['value'];
        $records = array_map(function ($hit) use ($model) {
            return new $model($hit['_source']);
            //return $model::find($hit['_id']);
        }, $elasticsearch['hits']['hits']);
        return new \Illuminate\Pagination\LengthAwarePaginator(
            $records,
            $total,
            $perPage,
            $page,
            ['path' => request()->url(), 'query' => request()->query()]
        );
    }
}
