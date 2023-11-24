<?php

namespace App\Http\Controllers\Web;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;

class BaseController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    protected array $data = [];

    public function __construct()
    {
        $this->data['current_language'] = app()->getLocale();
    }
}
