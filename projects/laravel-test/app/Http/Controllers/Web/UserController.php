<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('web.user.index');
    }

    public function update(Request $request)
    {
        dump($request->all());
    }

    public function update_all(Request $request)
    {
        dump($request->all());
    }

    public function delete($id)
    {
        dump('User #'.$id.' deleted.');
    }

    public function show(Request $request, $id)
    {
        dump('User #'.$id.' show');
    }

    public function show_name(Request $request, $name)
    {
        dump('User #'.$name.' show name');
    }

    public function check_role(Request $request, $role)
    {
        dump('User role is '.$role);
    }
}
