<?php
namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blade::directive("customMethod", function ($value = null)
        {
            $value = str_replace('"', '', $value);
            $value = str_replace("'", '', $value);
            $value = strtoupper($value);
            $custom_methods = ["BERKAN", "CUSTOMGET", "CUSTOMPOST"];
            if (!in_array($value, $custom_methods))
            {
                return "";
            }
            return '<input type="hidden" name="_customMethod" value="' . $value . '">';
        });
    }
}
