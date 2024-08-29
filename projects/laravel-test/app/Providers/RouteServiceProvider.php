<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to your application's "home" route.
     * Typically, users are redirected here after authentication.
     * @var string
     */
    public const HOME = '/home';
    /*
     * Route::get('/', "HomeController@index"); ===> şeklinde kullanımı sağlamak için namespace tanımı yaparak boot::routes içerisinde namespace'i set etmek gerekiyor.
     */
    protected $namespace = "\\App\\Http\\Controllers\\Web";
    protected $namespace_admin = "\\App\\Http\\Controllers\\Admin";

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        // Tüm route tanımlarında id geçen parametrelerin sayı olması gerektiğini tanımlar.
        Route::pattern('id', '[0-9]+');
        // Implicit Enum Binding
        Route::model('user', \App\Models\User::class);
        // Rate Limiter (throttle middleware)
        RateLimiter::for('global', function (Request $request) {
            return Limit::perMinute(1000)->response(function (Request $request, array $headers) {
                return response('Custom response...', 429, $headers);
            });
        });
        // Rate Limiter - Defining Rate Limiters
        RateLimiter::for('global', function ($request) {
            return $request->user()?->vipCustomer()
                ? Limit::none()
                : Limit::perMinute(60)->by($request->ip());
        });
        // Rate Limiter - Segmenting Rate Limits
        RateLimiter::for('uploads', function (Request $request) {
            return $request->user()
                ? Limit::perMinute(100)->by($request->user()->id)
                : Limit::perMinute(10)->by($request->ip());
        });
        // Rate Limiter - Multiple Rate Limits
        RateLimiter::for('login', function (Request $request) {
            return [
                Limit::perMinute(500),
                Limit::perMinute(3)->by($request->input('email')),
            ];
        });
        // Rate Limiter - User plan based
        RateLimiter::for('plan_based', function ($request) {
            $user = $request->user();
            return match ($user->plan) {
                'free' => Limit::perMinute(30),
                'basic' => Limit::perMinute(60),
                'premium' => Limit::perMinute(120),
                default => Limit::perMinute(10),
            };
        });
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)
                ->by($request->user()?->id ?: $request->ip());
        });
        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));
            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/web.php'));
            Route::middleware(['admin', 'auth:admin'])
                ->prefix('admin')
                ->name('admin.')
                ->namespace($this->namespace_admin)
                ->group(base_path('routes/admin.php'));
        });
    }
}
