<?php
// php artisan make:controller Web/LoginController
/*
 * /profile/{id} şeklinde bir route tanımına yönledirme yapmak isteniyorsa
 * return redirect()->route('profile', ['id' => 1]);
 * return redirect()->route('profile', [$user]);
 *
 * Controller'a yönlendirme yapılmak isteniyorsa
 * return redirect()->action([UserController::class, 'index']);
 * return redirect()->action([UserController::class, 'profile'], ['id' => 1]);
 *
 * Dış bir bağlantıya yönlendirme yapılacaksa
 * return redirect()->away('https://www.google.com');
 */

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\LoginRequest;
use App\Models\User;
use App\Traits\Loggable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    use Loggable;

    public function index()
    {
        $is_logged_in = Auth::guard('web')->check();
        $title = 'Login';
        return view('web.login.index', compact(['title', 'is_logged_in']));
    }

    public function login(LoginRequest $request)
    {
        $email = $request->email;
        $password = $request->password;
        $remember_me = isset($request->remember_me);
        /*if (Auth::guard('web')->attempt(['email' => $email, 'password' => $password], $remember_me)) {
            //return redirect()->route('home');
            return redirect()->route('login');
        }*/
        $user = User::query()->where("email", $email)->first();
        if (!empty($user)) {
            if (Hash::check($password, $user->password)) {
                Auth::guard('web')->login($user, $remember_me);
                $this->log('login', $user, $user->id);
                return redirect()->route('login');
            }
        }
        return redirect()->route('login')->withErrors([
            "email" => "Email or password is incorrect."
        ])->onlyInput("email", "remember_me");
    }

    public function logout(Request $request)
    {
        if (Auth::guard('web')->check()) {
            try {
                $this->log('logout', User::class, \auth()->id());
                Auth::guard('web')->logout();
                $request->session()->invalidate();
                $request->session()->regenerate();
            } catch (\Exception $e) {
                return redirect()->route('login')->withErrors($e->getMessage());
            }
        }
        return redirect()->route('login');
        //return redirect()->back();
    }
}
