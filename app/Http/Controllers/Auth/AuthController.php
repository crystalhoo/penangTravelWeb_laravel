<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:api', ['except' => ['login']]);
  }

  public function login()
  {
  $credentials = request(['email', 'password']);
  if (!$token = auth()->attempt($credentials)) {
    return response()->json(['error' => 'Unauthorized'], 401);
  }
  return $this->respondWithToken($token);
  }
  public function me()
  {
    return response()->json(auth()->user());
  }

  public function logout()
  {
    auth()->logout();
    return response()->json(['message' => 'Successfully logged out']);
  }
/**
* Refresh a token.
*
* @return \Illuminate\Http\JsonResponse
*/
  public function refresh()
  {
  return $this->respondWithToken(auth()->refresh());
  }
/**
* Get the token array structure.
*
* @param string $token
*
* @return \Illuminate\Http\JsonResponse
*/
  protected function respondWithToken($token)
  {
    return response()->json([
      'access_token' => $token,
      'token_type' => 'bearer',
      'expires_in' => auth()->factory()->getTTL() * 60
    ]);
  }

  //CRUD for admin
  public function create()
  {
    if (Gate::allows('isAdmin')) {
        dd('Admin allowed');
    } else {
        dd('You are not Admin');
    }

  }

  public function edit()
  {
    if (Gate::allows('isAdmin')) {
        dd('Admin allowed');
    } else {
        dd('You are not Admin');
    }

  }
  public function delete()
{
    if (Gate::allows('isAdmin')) {
        dd('Admin allowed');
    } else {
        dd('You are not Admin');
    }

}

}
