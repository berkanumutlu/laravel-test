<?php
//php artisan make:controller Admin/LoginController
namespace App\Http\Controllers\Admin;

//use App\Models\Admin;
use App\Http\Requests\Admin\LoginRequest;
use Illuminate\Support\Facades\Auth;

//use App\Models\Admin;

class LoginController extends BaseController
{
    /**
     * @var string|null
     */
    //private ?string $favicon;
    /**
     * @var string|null
     */
    //private ?string $title;

    public function __construct()
    {
        parent::__construct();
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.home');
        }
        /*$this->favicon = public_path('favicon.ico');
        $this->title = 'Login';*/
    }

    public function index()
    {
        $this->data['title'] = 'Login';
        return view('admin.login.index', $this->data);
        //return view('admin.login.index', ['favicon' => $this->favicon, 'title' => $this->title]);
    }

    public function login(LoginRequest $request)
    {
        $email = $request->email;
        $password = $request->password;
        $remember_me = isset($request->remember_me);
        /*
         * 1. Yöntem
         * Yönetici bilgilerini almayı sağlıyor.
         */
        //$admin = Admin::where("email", $email)->first();
        /*
         * Yönetici varsa ve parola doğruysa
         */
        //if (!empty($admin) && Hash::check($password, $admin->password)) {
        /*
         * Yöneticinin giriş yapmasını sağlıyor.
         * config/auth.php dosyasındaki 'guards' içerisindeki 'admin' tanımı kullanılıyor.
         */
        //Auth::guard('admin')->login($admin, $remember_me);
        /*
         * Yönetici id bilgisi ile giriş yapmayı sağlıyor.
         */
        //Auth::guard('admin')->loginUsingId($admin->id, $remember_me);
        //return redirect()->route('admin.home');
        //}
        /*
         * 2. Yöntem
         * Yönetici bilgilerini kontrol edip login yapmayı sağlıyor.
         */
        if (Auth::guard('admin')->attempt(['email' => $email, 'password' => $password], $remember_me)) {
            return redirect()->route('admin.home');
        }
        /*
         * Eğer yönetici yoksa veya bilgileri doğru değilse
         * yönetici giriş sayfasına hata mesajı ve post edilen email, remember_me bilgileri ile geri dönüş yapıyor.
         */
        return redirect()->route('admin.login.index')->withErrors([
            "email" => "Email or password is incorrect."
        ])->onlyInput("email", "remember_me");
    }
}
