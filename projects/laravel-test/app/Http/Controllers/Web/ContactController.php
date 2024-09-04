<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('web.contact.index');
    }

    public function contact_form(Request $request)
    {
        //dump(\request()->get('fullname'));
        //dump($request->fullname);
        //dump($request->all());
    }

    public function user_form($id = null, $name = null, Request $request)
    {
        //dump($id);
        //dump(gettype($id));
        //dump($request->id);
        //dump($name);
        //dump(gettype($name));
        //dump($request->name);
        //dump($request->all());
    }

    public function match_form(Request $request)
    {
        //dump($request->all());
    }
}
