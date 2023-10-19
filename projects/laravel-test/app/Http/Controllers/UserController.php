<?php
namespace App\Http\Controllers;

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
        dump('User #' . $id . ' deleted.');
    }
}
