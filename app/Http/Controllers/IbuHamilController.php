<?php

namespace App\Http\Controllers;

use App\Models\IbuHamil;
use App\Models\User;
use Illuminate\Http\Request;

class IbuHamilController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $data_ibu_hamil = IbuHamil::all();
    $users = User::all();

    $data = [
      'data_ibu_hamil' => $data_ibu_hamil,
      'users' => $users,

    ];

    return view('admin.pages.ibu-hamil', $data);
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
    $ibu_hamil = new IbuHamil();

    $ibu_hamil->nama = $request->nama;
    $ibu_hamil->user_id = $request->user_id;
    $ibu_hamil->anak_ke = $request->anak_ke;
    $ibu_hamil->tgl_lahir = $request->tgl_lahir;

    $save = $ibu_hamil->save();

    if ($save) {
      return back()->with('success', 'Data berhasil ditambahkan');
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
    $ibu_hamil = IbuHamil::findOrFail($id);
    $users = User::all();

    $data = [
      'ibu_hamil' => $ibu_hamil,
      'users' => $users,

    ];

    return view('admin.pages.ibu-hamil-edit', $data);
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
    $ibu_hamil = IbuHamil::findOrFail($id);

    $ibu_hamil->nama = $request->nama;
    $ibu_hamil->user_id = $request->user_id;
    $ibu_hamil->anak_ke = $request->anak_ke;
    $ibu_hamil->tgl_lahir = $request->tgl_lahir;

    $save = $ibu_hamil->update();

    if ($save) {
      return redirect()->route('admin.ibu-hamil.index')->with('success', 'Data berhasil diubah');
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
    $ibu_hamil = IbuHamil::findOrFail($id);

    $ibu_hamil->delete();

    return back()->with('success', 'Data berhasil dihapus');
  }
}
