<?php
namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index($langCode = null)
    {
        $this->data['SeoTitle'] = 'berkan';
        return view('Home/index', $this->data);
    }
}
