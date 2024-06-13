<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
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
        if (!is_null(session()->get('locale'))) {
            app()->setLocale(session()->get('locale'));
        } else {
            session()->put('locale', app()->getLocale());
            app()->setLocale(session()->get('locale'));
            //str_replace('_', '-', app()->getLocale());
        }
        return $next($request);
    }
}
