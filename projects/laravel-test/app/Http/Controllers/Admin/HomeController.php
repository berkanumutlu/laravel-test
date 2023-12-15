<?php

namespace App\Http\Controllers\Admin;

class HomeController extends BaseController
{
    public function index()
    {
        $this->data['title'] = 'Home';
        return view('admin.home.index', $this->data);
    }
}
