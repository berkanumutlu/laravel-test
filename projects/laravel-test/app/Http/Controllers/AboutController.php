<?php
namespace App\Http\Controllers;

class AboutController extends Controller
{
    public function index()
    {
        //return redirect(route('home'));
        //return redirect()->route('home');
        return view('web.about.index');
    }
}
