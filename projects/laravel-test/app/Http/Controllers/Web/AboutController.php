<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    public function index()
    {
        //return redirect(route('home'));
        //return redirect()->route('home');
        return view('web.about.index');
    }
}
