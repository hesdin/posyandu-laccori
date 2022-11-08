<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
  public function loginPage()
  {
    return view('auth.login-user');
  }

  public function loginCheck(Request $request)
  {

    $credentials = $request->validate([
        'no_kk' => ['required'],
        'password' => ['required']
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        return redirect()->route('dashboard');
    }

    return back();
  }
}
