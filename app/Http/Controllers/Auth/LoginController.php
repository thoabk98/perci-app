<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/ult-upsell/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $request->validate([
            'usr' => 'required',
            'pwd' => 'required',
        ]);

        if (Auth::attempt(['name' =>$request->usr, 'password'=>$request->pwd])) {
            return redirect()->route('dashboard');
        } else {
            return redirect()->back()->with('error_msg', 'Thông tin đăng nhập không chính xác.');
        }
    }

    public function studentLogin(Request $request) {
        return $this->login($request, UserLogin::TYPE_STUDENT);
    }

    public function teacherLogin(Request $request) {
        return $this->login($request, UserLogin::TYPE_TEACHER);
    }

    public function logout(Request $request)
    {
        $redirect = 'ult-upsell/login';
        $this->guard()->logout();

        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect($redirect);
    }
}
