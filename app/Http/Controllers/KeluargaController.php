<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class KeluargaController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $data_keluarga = User::all();

    return view('admin.pages.keluarga', ['data_keluarga' => $data_keluarga]);
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
    $keluarga = new User();

    $keluarga->no_kk = $request->no_kk;
    $keluarga->nama = $request->nama;
    $keluarga->alamat = $request->alamat;
    $keluarga->password = bcrypt($request->password);

    $save = $keluarga->save();

    if ($save) {
      return back()->with('success', 'Data berhasil ditambahkan');
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
    $keluarga = User::findOrFail($id);

    return view('admin.pages.keluarga-edit', ['keluarga' => $keluarga]);
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
    $keluarga = User::findOrFail($id);

    $keluarga->no_kk = $request->no_kk;
    $keluarga->nama = $request->nama;
    $keluarga->alamat = $request->alamat;

    if (!empty($request->password)) {
      $keluarga->password = bcrypt($request->password);
    } else {
      $keluarga->password = $keluarga->password;
    }

    $save = $keluarga->update();

    if ($save) {
      return redirect()->route('admin.keluarga.index')->with('success', 'Data berhasil diubah');
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
    $keluarga = User::findOrFail($id);

    $keluarga->delete();

    return back()->with('success', 'Data berhasil dihapus');
  }
}
