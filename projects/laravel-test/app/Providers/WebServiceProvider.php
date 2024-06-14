<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class WebServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        View::composer(['web.*', 'layouts.email', 'web.email.*'], function ($view) {
            $title = 'Laravel';
            $site_name = 'Laravel Website';
            $site_slogan = 'Site Slogan';
            $site_logo = !empty($settings->image_logo) ? asset($settings->image_logo) : asset('assets/web/images/logo.png');
            $view->with(compact(['title', 'site_name', 'site_slogan', 'site_logo']));
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
