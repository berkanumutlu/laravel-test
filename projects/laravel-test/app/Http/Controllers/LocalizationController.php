<?php

namespace App\Http\Controllers;

class LocalizationController extends Controller
{
    public function set_locale($locale)
    {
        app()->setLocale($locale);
        session()->put('locale', $locale);
        return redirect()->back();
    }
}
