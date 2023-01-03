<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BalitaPosyandu;
use App\Models\PemeriksaanIbuHamil;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{
  public function posyanduBalita()
  {
    return view('admin.pages.laporan-posyandu-balita');
  }
  public function laporanPosyandu(Request $request)
  {

    $year = $request->tahun;
    $month = $request->bulan;

    $myDate = $month . '/01/' . $year;
    $date = Carbon::createFromFormat('m/d/Y', $myDate)->isoFormat('MMMM Y');

    $d_posyandu = BalitaPosyandu::all();



    $d_posyandu = BalitaPosyandu::with('balita')
      ->whereYear('tgl_posyandu', $year)
      ->whereMonth('tgl_posyandu', $month)
      ->get();

    if ($d_posyandu->isEmpty()) {
      return back()->with('fail', 'Laporan untuk bulan dan tahun tersebut tidak ada');
    }

    $data = [
      'd_posyandu' => $d_posyandu,
      'date' => $date,
    ];

    $pdf = Pdf::loadView('laporan.posyandu-balita-pdf', $data)->setPaper('f4', 'landscape');

    if ($request->button == 'print') {
      return $pdf->stream('laporan_posyandu_balita.pdf');
    } else {
      return $pdf->download('laporan_posyandu_balita.pdf');
    }
  }

  public function ibuHamil()
  {
    return view('admin.pages.laporan-ibu-hamil');
  }

  public function laporanIbuHamil(Request $request)
  {
    $year = $request->tahun;
    $month = $request->bulan;

    $myDate = $month . '/01/' . $year;
    $date = Carbon::createFromFormat('m/d/Y', $myDate)->isoFormat('MMMM Y');

    $d_pemeriksaan = PemeriksaanIbuHamil::with('ibuHamil')
      ->whereYear('tgl_pemeriksaan', $year)
      ->whereMonth('tgl_pemeriksaan', $month)
      ->get();

    if ($d_pemeriksaan->isEmpty()) {
      return back()->with('fail', 'Laporan untuk bulan dan tahun tersebut tidak ada');
    }

    $data = [
      'd_pemeriksaan' => $d_pemeriksaan,
      'date' => $date,
    ];

    $pdf = Pdf::loadView('laporan.ibu-hamil-pdf', $data)->setPaper('f4', 'landscape');

    if ($request->button == 'print') {
      return $pdf->stream('laporan_pemeriksaan_ibu_hamil.pdf');
    } else {
      return $pdf->download('laporan_pemeriksaan_ibu_hamil.pdf');
    }
  }
}
