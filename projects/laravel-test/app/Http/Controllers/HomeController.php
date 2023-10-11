<?php
namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        return view('Web/Home/index');
    }
}
