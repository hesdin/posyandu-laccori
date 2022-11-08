<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
  public function loginPageAdmin()
  {
    return view('auth.login-admin');
  }
}
