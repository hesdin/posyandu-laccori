<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use App\Models\Balita;
use App\Models\IbuHamil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
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
    return view('admin.pages.dashboard', $data);
  }

  public function profile()
  {
    return view('admin.pages.profile');
  }

  public function profileUpdate(Request $request, $id)
  {
    $admin = Admin::findOrFail($id);

    $admin->username = $request->username;
    $admin->nama = $request->nama;

    if ($request->filled('pass')) {
      if (Hash::check($request->pass, $admin->password)) {
        $admin->password = bcrypt($request->new_pass);
      } else {
        return back()->with('error', 'Gagal Update, Password Lama Salah!');
      }
    } else {
      $admin->password = $admin->password;
    }

    $save = $admin->update();

    if ($save) {
      return redirect()->route('admin.profile')->with('success', 'Data berhasil diubah!');
    }
  }
}
