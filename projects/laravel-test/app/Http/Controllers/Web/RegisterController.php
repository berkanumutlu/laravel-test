<?php
// php artisan make:controller Web / RegisterController
namespace App\Http\Controllers\Web;

//use App\Events\UserRegistered;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\UserStoreRequest;
use App\Models\User;
use App\Models\UserVerification;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        $title = 'Register';
        return view('web.register.index', compact(['title']));
    }

    public function store(UserStoreRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->status = 0;
        try {
            $user->save();
            //event(new UserRegistered($user));
        } catch (\Exception $e) {
            alert()->error("Error", trans_choice('auth.user_register', 'error'))->showConfirmButton("OK");
            return redirect()->back()->exceptInput("_token", "password", "password_confirmation");
        }
        alert()->success("Success", trans_choice('auth.user_register', 'success_with_confirmation'))
            ->showConfirmButton("OK");
        return redirect()->route('register');
    }

    public function verify(Request $request)
    {
        $user_verification = UserVerification::query()->where('token', $request->token)->first();
        if (empty($user_verification)) {
            abort(404);
        }
        $user = $user_verification->user;
        if (is_null($user->email_verified_at)) {
            $user->email_verified_at = now();
            $user->status = 1;
            $user->save();
            $user_verification->delete();
            alert()->success("Success",
                "Your account has been verified. You can log in to your account by going to the login page.")
                ->showConfirmButton("OK");
        } else {
            alert()->info("Info", "This account has been previously verified.")->showConfirmButton("OK");
        }
        return redirect()->route('login');
    }
}
