<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class RegisterController extends Controller
{
    //

    public function create()
    {
        return view('auth.register.create');
    }

    public function store()
    {
      $this->validate(request(), [
        'name' => 'required',
        'email' => 'required|email',
        'password' => 'required'
      ]);

      $user = User::create(request(['name', 'email', 'password']));

      if ( ! $user)
      {
        echo 'Failed to register.';
      } else {
        echo 'Register succesfully.';
        return redirect()->route('login');
      }

    }
}
