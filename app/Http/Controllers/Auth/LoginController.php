<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use RealRashid\SweetAlert\Facades\Alert;

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
    protected $redirectTo = RouteServiceProvider::HOME;


    public function redirectTo()
    {
        if(auth()->user()->roles()->first()->allowed_route != '')
        {
            Alert::success('تم تسجيل الدخول بنجاح', 'EROS');
            return $this->redirectTo = auth()->user()->roles()->first()->allowed_route . '/index';
        }
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    //لو حبيت اعمل تسجيل بالايميل هعمل كومنت لدي واغير الانبوت بتاع اللوجن الي ايميل
    // public function username()
    // {
    //     return 'username';
    // }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    protected function loggedOut(Request $request)
    {
        Cache::forget('admin_side_menu');
        Cache::forget('role_routes');
        Cache::forget('user_routes');
    }


}
