<?php
namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        $name = 'berkan';
        $age = 25;
        $person = new \stdClass();
        $person->name = $name;
        $person->age = $age;
        //return view('web.home.index', ['name_view' => $name]);
        //return view('web.home.index', compact('name'));
        //return view('web.home.index')->with('name', $name)->with('age', $age);
        //return view('web.home.index')->with(['name' => $name, 'age' => $age]);
        return view('web.home.index', compact(['person', 'name', 'age']));
    }
}
