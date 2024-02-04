<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\User;
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
        try {
            User::where("id", $id)->delete();
            alert()->success("Success", "User has been updated deleted.")->showConfirmButton("OK");
        } catch (\Exception $e) {
            alert()->error("Error", "An error occurred while deleting a user.")->showConfirmButton("OK");
        }
        return redirect()->back();
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
