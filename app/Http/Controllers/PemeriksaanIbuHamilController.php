<?php

namespace App\Http\Controllers;

use App\Models\IbuHamil;
use App\Models\PemeriksaanIbuHamil;
use Illuminate\Http\Request;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;

class PemeriksaanIbuHamilController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $data_ibu_hamil = IbuHamil::all();

    $data = [
      'data_ibu_hamil' => $data_ibu_hamil,

    ];

    return view('admin.pages.pemeriksaan-ibu-hamil', $data);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create($id)
  {
    $ibu_hamil = IbuHamil::findOrFail($id);

    $data = [
      'ibu_hamil' => $ibu_hamil,
    ];
    return view('admin.pages.pemeriksaan-ibu-hamil-create', $data);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $pemeriksaan = new PemeriksaanIbuHamil();
    $ibu_hamil_id = Crypt::decryptString($request->ibu_hamil_id);

    $pemeriksaan->ibu_hamil_id = $ibu_hamil_id;
    $pemeriksaan->tgl_pemeriksaan = $request->tgl_pemeriksaan;
    $pemeriksaan->keluhan = $request->keluhan;
    $pemeriksaan->tekanan_darah = $request->tekanan_darah;
    $pemeriksaan->berat_badan = $request->berat_badan;
    $pemeriksaan->umur_kehamilan = $request->umur_kehamilan;
    $pemeriksaan->tinggi_fundus = $request->tinggi_fundus;
    $pemeriksaan->letak_janin = $request->letak_janin;
    $pemeriksaan->denyut_jantung_janin = $request->denyut_jantung_janin;
    $pemeriksaan->kaki_bengkak = $request->kaki_bengkak;
    $pemeriksaan->hasil_lab = $request->hasil_lab;
    $pemeriksaan->tindakan = $request->tindakan;
    $pemeriksaan->nasihat = $request->nasihat;
    $pemeriksaan->nama_pemeriksa = $request->nama_pemeriksa;
    $pemeriksaan->tgl_kembali = $request->tgl_kembali;

    $save = $pemeriksaan->save();

    if ($save) {
      return redirect()->route('admin.pemeriksaan-ibu-hamil.show', $ibu_hamil_id)->with('success', 'Data Pemeriksaan Berhasil ditambahkan');
    } else {
      dd('error');
    }
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $ibu_hamil = IbuHamil::findOrFail($id);
    $data_pemeriksaan = PemeriksaanIbuHamil::where('ibu_hamil_id', $id)->get();

    $data = [
      'ibu_hamil' => $ibu_hamil,
      'data_pemeriksaan' => $data_pemeriksaan,
    ];

    return view('admin.pages.pemeriksaan-ibu-hamil-show', $data);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $pemeriksaan = PemeriksaanIbuHamil::findOrFail($id);

    return view('admin.pages.pemeriksaan-ibu-hamil-edit', ['pemeriksaan' => $pemeriksaan]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $pemeriksaan = PemeriksaanIbuHamil::findOrFail($id);

    $pemeriksaan->tgl_pemeriksaan = $request->tgl_pemeriksaan;
    $pemeriksaan->keluhan = $request->keluhan;
    $pemeriksaan->tekanan_darah = $request->tekanan_darah;
    $pemeriksaan->berat_badan = $request->berat_badan;
    $pemeriksaan->umur_kehamilan = $request->umur_kehamilan;
    $pemeriksaan->tinggi_fundus = $request->tinggi_fundus;
    $pemeriksaan->letak_janin = $request->letak_janin;
    $pemeriksaan->denyut_jantung_janin = $request->denyut_jantung_janin;
    $pemeriksaan->kaki_bengkak = $request->kaki_bengkak;
    $pemeriksaan->hasil_lab = $request->hasil_lab;
    $pemeriksaan->tindakan = $request->tindakan;
    $pemeriksaan->nasihat = $request->nasihat;
    $pemeriksaan->nama_pemeriksa = $request->nama_pemeriksa;
    $pemeriksaan->tgl_kembali = $request->tgl_kembali;

    $save = $pemeriksaan->update();

    if ($save) {
      return redirect()->route('admin.pemeriksaan-ibu-hamil.show', $pemeriksaan->ibu_hamil_id)->with('success', 'Data Pemeriksaan Berhasil diubah');
    } else {
      dd('error');
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $pemeriksaan = PemeriksaanIbuHamil::findOrFail($id);

    $pemeriksaan->delete();

    return back()->with('success', 'Data pemeriksaan berhasil dihapus');
  }
}
