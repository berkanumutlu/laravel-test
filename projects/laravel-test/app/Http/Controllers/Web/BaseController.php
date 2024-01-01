<?php

namespace App\Http\Controllers\Web;

//use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;

class BaseController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    protected array $data = [];

    public function __construct()
    {
        //Debugbar::startMeasure('render', 'Time for BaseController rendering');
        $this->data['current_language'] = app()->getLocale();
        $this->data['title'] = 'Laravel';
        //Debugbar::stopMeasure('render');
    }
}
