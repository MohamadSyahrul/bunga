<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected $redirectTo ;//= RouteServiceProvider::HOME;

    public function redirectTo()
    {
        // switch (Auth::user()->role_id) {
        //     case 1 :
        //         $this->redirectTo = '/buyer';
        //         return $this->redirectTo;
        //         break;
        //     case 2 :
        //         $this->redirectTo = '/seller';
        //         return $this->redirectTo;
        //         break;
        //     default:
        //         $this->redirectTo = '/';
        //         return $this->redirectTo;
        //         break;
        if(Auth::user()->role_id === 1){
            return '/buyer/dashboard';
        }
        if(Auth::user()->role_id === 2){
            return '/seller/dashboard';
        }
        
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        return 'name';
        
    }
}
