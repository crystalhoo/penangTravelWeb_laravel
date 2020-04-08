<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

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
     public function login(Request $request){
       $email = $request->input('email');
       $password = $request->input('password');

       Auth::attempt($request->only(['email','password']));
          // Authentication passed...
          return redirect()->route('admin.home');
     }

     public function logout(){
        Auth::logout();
        return view('auth.login');
     }

     public function showLoginForm(){
       return view('auth.login');
     }

    public function __construct()
    {
        // $this->middleware('guest')->except('logout');
    }
}
