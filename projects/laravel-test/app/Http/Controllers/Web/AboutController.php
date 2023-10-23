<?php
namespace App\Http\Controllers\Web;

class AboutController extends BaseController
{
    public function index()
    {
        //return redirect(route('home'));
        //return redirect()->route('home');
        return view('web.about.index');
    }
}
