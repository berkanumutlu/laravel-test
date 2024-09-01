<?php

namespace App\Providers;

use app\Contracts\CustomCache;
use Illuminate\Contracts\Cache\Repository;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        /*
         * Binding Contracts to Implementations
         */
        $this->app->singleton(Repository::class, function ($app) {
            return new CustomCache;
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blade::directive("customMethod", function ($value = null) {
            $value = str_replace('"', '', $value);
            $value = str_replace("'", '', $value);
            $value = strtoupper($value);
            $custom_methods = ["BERKAN", "CUSTOMGET", "CUSTOMPOST"];
            if (!in_array($value, $custom_methods)) {
                return "";
            }
            return '<input type="hidden" name="_customMethod" value="'.$value.'">';
        });
        /**
         * php artisan vendor:publish --tag=laravel-pagination
         */
        //Paginator::useBootstrapFive();
        Paginator::defaultView("vendor.pagination.custom");
    }
}
