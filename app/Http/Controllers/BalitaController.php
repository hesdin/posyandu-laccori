<?php

namespace App\Http\Controllers;

use App\Models\Balita;
use App\Models\Keluarga;
use Illuminate\Http\Request;

class BalitaController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $data_balita = Balita::all();
    $data_keluarga = Keluarga::all();

    $data = [
      'data_balita' => $data_balita,
      'data_keluarga' => $data_keluarga,
    ];

    return view('admin.pages.balita', $data);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $balita = new Balita();

    $balita->nama = $request->nama;
    $balita->keluarga_id = $request->nama_orang_tua;
    $balita->jenis_kelamin = $request->jenis_kelamin;
    $balita->tgl_lahir = $request->tgl_lahir;

    $save = $balita->save();

    if ($save) {
      return back()->with('success', 'Data berhasil Ditambahkan');
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
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $balita = Balita::findOrFail($id);
    $data_keluarga = Keluarga::all();

    $data = [
      'balita' => $balita,
      'data_keluarga' => $data_keluarga,
    ];

    return view('admin.pages.balita-edit', $data);
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
    $balita = Balita::findOrFail($id);
    $balita->nama = $request->nama;
    $balita->keluarga_id = $request->nama_orang_tua;
    $balita->jenis_kelamin = $request->jenis_kelamin;
    $balita->tgl_lahir = $request->tgl_lahir;

    $save = $balita->update();

    if ($save) {
      return redirect()->route('balita.index')->with('success', 'Data berhasil diubah');
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
    $balita = Balita::findOrFail($id);

    $balita->delete();

    return back()->with('success', 'Data berhasil dihapus');
  }
}
