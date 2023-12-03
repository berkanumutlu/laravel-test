<?php
// php artisan make:controller Web/LoginController
namespace App\Http\Controllers\Web;

use App\Http\Requests\Web\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends BaseController
{
    public function index()
    {
        $this->data['is_logged_in'] = Auth::guard('web')->check();
        $this->data['title'] = 'Login';
        return view('web.login.index', $this->data);
    }

    public function login(LoginRequest $request)
    {
        $email = $request->email;
        $password = $request->password;
        $remember_me = isset($request->remember_me);
        if (Auth::guard('web')->attempt(['email' => $email, 'password' => $password], $remember_me)) {
            return redirect()->route('home');
        }
        return redirect()->route('login')->withErrors([
            "email" => "Email or password is incorrect."
        ])->onlyInput("email", "remember_me");
    }
}
