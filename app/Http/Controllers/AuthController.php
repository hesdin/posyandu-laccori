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
      'password' => ['required'],
    ]);

    if (Auth::attempt($credentials)) {
      $request->session()->regenerate();

      return redirect()->route('dashboard');
    }

    return back()->with('error', 'NIK atau password salah!');
  }

  public function logout(Request $request)
  {
    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/');
  }

  // Admin Auth
  public function loginPageAdmin()
  {
    return view('auth.login-admin');
  }

  public function loginCheckAdmin(Request $request)
  {
    $credentials = $request->validate([
      'username' => ['required'],
      'password' => ['required'],
    ]);

    if (Auth::guard('admin')->attempt($credentials)) {
      $request->session()->regenerate();

      return redirect()->route('admin.dashboard');
    }

    return back()->with('error', 'Username atau password salah!');
  }

  public function logoutAdmin(Request $request)
  {
    Auth::guard('admin')->logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('admin.logout');
  }
}
