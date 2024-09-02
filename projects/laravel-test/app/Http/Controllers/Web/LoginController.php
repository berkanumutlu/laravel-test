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
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    use Loggable;

    public function index(Request $request)
    {
        //$is_logged_in = Auth::guard('web')->check();
        $title = 'Login';
        return view('web.login.index', compact(['title']));
    }

    public function login(LoginRequest $request)
    {
        $email = $request->email;
        $password = $request->password;
        $remember_me = isset($request->remember_me);
        /*if (Auth::guard('web')->attempt(['email' => $email, 'password' => $password], $remember_me)) {
            //return redirect()->route('home');
            return redirect()->route('login.index');
        }*/
        try {
            $user = User::query()->where("email", $email)->first();
            if (!empty($user)) {
                if (Hash::check($password, $user->password)) {
                    Auth::guard('web')->login($user, $remember_me);
                    $request->session()->regenerate();
                    $session = \App\Models\Session::query()->create([
                        'user_id'       => $user->id,
                        'ip_address'    => $request->ip(),
                        'user_agent'    => $request->userAgent(),
                        'payload'       => json_encode($request->except('password')),
                        'last_activity' => now()
                    ]);
                    session()->put('user_session_id', $session->id);
                    $this->log('login', $user, $user->id);
                    Log::info('User {id} failed to login.', ['id' => $user->id]);
                    return redirect()->route('login.index');
                }
            }
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
        }
        return redirect()->route('login.index')->withErrors([
            "email" => "Email or password is incorrect."
        ])->onlyInput("email", "remember_me");
    }

    public function logout(Request $request)
    {
        if (Auth::guard('web')->check()) {
            try {
                \App\Models\Session::query()->where('id', session()->get('user_session_id'))->update([
                    'last_activity' => now()
                ]);
                $this->log('logout', User::class, \auth()->id());
                Auth::guard('web')->logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
            } catch (\Exception $e) {
                return redirect()->route('login.index')->withErrors($e->getMessage());
            }
        }
        return redirect()->route('login.index');
        //return redirect()->back();
    }
}
