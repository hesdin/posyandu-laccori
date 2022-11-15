<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Charts\BalitaChart;
use Illuminate\Http\Request;
use App\Charts\IbuHamilChart;
use App\Models\PemeriksaanIbuHamil;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
  public function dashboard()
  {
    return view('user.pages.dashboard');
  }

  public function perkembanganBalita(BalitaChart $chart)
  {
    return view('user.pages.perkembangan-balita', ['chart' => $chart->build()]);
  }

  public function perkembanganIbuHamil(IbuHamilChart $chart)
  {

    return view('user.pages.perkembangan-ibu-hamil', ['chart' => $chart->build()]);
  }

  public function perkembanganIbuHamilShow($id)
  {
    $pemeriksaan = PemeriksaanIbuHamil::findOrFail($id);

    return view('user.pages.perkembangan-ibu-hamil-show', ['pemeriksaan' => $pemeriksaan]);
  }

  public function profile()
  {
    return view('user.pages.profile');
  }

  public function profileUpdate(Request $request, $id)
  {
    $user = User::findOrFail($id);

    if (Hash::check($request->pass, $user->password)) {
      $user->password = bcrypt($request->new_pass);
      $user->update();
      return back()->with('success', 'Data Berhasil diupdate');
    } else {
      return back()->with('error', 'Gagal Update, Password Lama Salah');
    }
  }
}
