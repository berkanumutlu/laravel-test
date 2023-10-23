<?php
namespace App\Http\Controllers\Web;

class HomeController extends BaseController
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
        //return view('web.home.index', compact(['person', 'name', 'age']));
        $this->data['persona'] = $person;
        return view('web.home.index', $this->data);
    }
}
