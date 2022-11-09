<?php

namespace App\Http\Controllers;

use App\Models\Balita;
use App\Models\BalitaPosyandu;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;

class BalitaPosyanduController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_balita = Balita::all();
        $users = User::all();

        $data = [
            'data_balita' => $data_balita,
            'users' => $users,
        ];

        return view('admin.pages.balita-posyandu', $data);
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
        $balita_posyandu = new BalitaPosyandu();

        $balita_posyandu->balita_id = Crypt::decryptString($request->balita_id);
        $balita_posyandu->tgl_posyandu = $request->tgl_posyandu;
        $balita_posyandu->berat_badan = $request->berat_badan;
        $balita_posyandu->tinggi_badan = $request->tinggi_badan;
        $balita_posyandu->lingkar_kepala = $request->lingkar_kepala;

        $save = $balita_posyandu->save();

        if ($save) {
            return redirect()
                ->route('admin.balita-posyandu.show', $balita_posyandu->balita_id)
                ->with('success', 'Data berhasil ditambahkan');
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
        $balita = Balita::findOrFail($id);
        $balita_posyandu = BalitaPosyandu::where('balita_id', $id)->get();

        $data = [
            'balita' => $balita,
            'balita_posyandu' => $balita_posyandu,
        ];

        return view('admin.pages.balita-posyandu-show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posyandu = BalitaPosyandu::findOrFail($id);

        return view('admin.pages.balita-posyandu-edit', ['posyandu' => $posyandu]);
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
        $posyandu = BalitaPosyandu::findOrFail($id);

        $posyandu->tgl_posyandu = $request->tgl_posyandu;
        $posyandu->berat_badan = $request->berat_badan;
        $posyandu->tinggi_badan = $request->tinggi_badan;
        $posyandu->lingkar_kepala = $request->lingkar_kepala;

        $save = $posyandu->update();

        if ($save) {
            return redirect()
                ->route('admin.balita-posyandu.show', $posyandu->balita_id)
                ->with('success', 'Data berhasil diubah');
        } else {
            dd('gagal');
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
        $posyandu = BalitaPosyandu::findOrFail($id);

        $posyandu->delete();

        return back()->with('success', 'Data berhasil dihapus');
    }
}
