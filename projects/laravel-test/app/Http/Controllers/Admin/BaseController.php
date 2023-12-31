<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;

class BaseController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * @var array
     */
    protected array $data = [];

    public function __construct()
    {
        $this->data['favicon'] = asset('favicon.ico');
        $this->data['title'] = '';
    }
}
