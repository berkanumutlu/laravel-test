<?php
namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index($langCode = null)
    {
        return view('Home/index');
    }
}
