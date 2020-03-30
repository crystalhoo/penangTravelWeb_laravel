<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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

<<<<<<< HEAD

=======
    use AuthenticatesUsers;
>>>>>>> 23f07f56364cd7211e101a475fc463485f6df57e

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
     public function login(){
       return redirect()->route('admin.home');
     }

     public function logout(){

     }

     public function showLoginForm(){
       return view('auth.login');
     }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}