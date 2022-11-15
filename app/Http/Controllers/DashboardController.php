<?php

namespace App\Http\Controllers;

use App\Models\Balita;
use App\Models\IbuHamil;
use App\Models\User;
use Illuminate\Http\Request;

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
}
