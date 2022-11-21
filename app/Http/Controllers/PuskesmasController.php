<?php

namespace App\Http\Controllers;

use Svg\Tag\Rect;
use App\Models\User;
use App\Models\Balita;
use App\Models\IbuHamil;
use App\Models\Puskesmas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PuskesmasController extends Controller
{
  public function dashboard()
  {
    $keluarga = User::count();
    $ibuHamil = IbuHamil::count();
    $balita = Balita::count();



    $data = [
      'keluarga' => $keluarga,
      'ibuHamil' => $ibuHamil,
      'balita' => $balita,
    ];
    return view('puskesmas.pages.dashboard', $data);
  }

  public function laporanBalita()
  {
    return view('puskesmas.pages.laporan-balita');
  }

  public function laporanIbuHamil()
  {
    return view('puskesmas.pages.laporan-ibu-hamil');
  }

  public function profile()
  {
    return view('puskesmas.pages.profile');
  }

  public function profileUpdate(Request $request, $id)
  {
    $puskesmas = Puskesmas::findOrFail($id);

    $puskesmas->username = $request->username;
    $puskesmas->nama = $request->nama;

    if (Hash::check($request->pass, $puskesmas->password)) {
      $puskesmas->password = bcrypt($request->new_pass);
    } else {
      return back()->with('error', 'Gagal Update, Password Lama Salah!');
    }

    $save = $puskesmas->update();
    if ($save) {
      return redirect()->route('puskesmas.profile')->with('success', 'Data berhasil diubah!');
    }
  }
}
