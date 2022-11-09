@extends('admin.layouts.app')

@section('title', 'Edit Data Pemeriksaan Ibu Hamil')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="row align-items-center">
                    <div class="col">
                        <h5 class="h5 mb-0 page-title">Detail / Edit Data Pemeriksaan Ibu {{ $pemeriksaan->ibuHamil->nama }}
                        </h5>
                    </div>
                </div>

            </div>
        </div>
        <form action="{{ route('admin.pemeriksaan-ibu-hamil.update', $pemeriksaan->id) }}" method="post">
            @method('PUT')
            @csrf
            <div class="row my-4">
                <div class="col-md-6">
                    <div class="card shadow">
                        <div class="card-body">
                            <div class="modal-body">
                                <div class="form-group mb-2">
                                    <label for="tgl_pemeriksaan">Tanggal Pemeriksaan</label>
                                    <input class="form-control" id="tgl_pemeriksaan" type="date" name="tgl_pemeriksaan"
                                        value="{{ $pemeriksaan->tgl_pemeriksaan }}" required>
                                </div>

                                <div class="form-group mb-2">
                                    <label for="keluhan">Keluhan Sekarang</label>
                                    <input class="form-control" id="keluhan" type="text" name="keluhan"
                                        value="{{ $pemeriksaan->keluhan }}"required>
                                </div>

                                <div class="form-group mb-2">
                                    <label for="tekanan_darah">Tekanan Darah (mm/Hg)</label>
                                    <input class="form-control" id="tekanan_darah" type="text" name="tekanan_darah"
                                        value="{{ $pemeriksaan->tekanan_darah }}">
                                </div>

                                <div class="form-group mb-2">
                                    <label for="berat_badan">Berak Badan (Kg)</label>
                                    <input class="form-control" id="berat_badan" type="text" name="berat_badan"
                                        value="{{ $pemeriksaan->berat_badan }}">
                                </div>

                                <div class="form-group mb-2">
                                    <label for="umur_kehamilan">Umur Kehamilan (Minggu)</label>
                                    <input class="form-control" id="umur_kehamilan" type="text" name="umur_kehamilan"
                                        value="{{ $pemeriksaan->umur_kehamilan }}">
                                </div>

                                <div class="form-group mb-2">
                                    <label for="tinggi_fundus">Tinggi Fundus (Cm)</label>
                                    <input class="form-control" id="tinggi_fundus" type="text" name="tinggi_fundus"
                                        value="{{ $pemeriksaan->tinggi_fundus }}">
                                </div>

                                <div class="form-group mb-2">
                                    <label for="letak_janin">Letak Janin : Kep/Su/Li</label>
                                    <input class="form-control" id="letak_janin" type="text" name="letak_janin"
                                        value="{{ $pemeriksaan->letak_janin }}">
                                </div>

                                <div class="form-group mb-2">
                                    <label for="denyut_jantung_janin">Denyut Jantung Janin / Menit</label>
                                    <input class="form-control" id="denyut_jantung_janin" type="text"
                                        name="denyut_jantung_janin" value="{{ $pemeriksaan->denyut_jantung_janin }}">
                                </div>



                            </div>
                        </div>
                    </div> <!-- .col-12 -->
                </div> <!-- .row -->

                <div class="col-md-6">
                    <div class="card shadow">
                        <div class="card-body">
                            <div class="modal-body">
                                <div class="form-group mb-2">
                                    <label for="kaki_bengkak">Kaki Bengkak</label>
                                    <input class="form-control" id="kaki_bengkak" type="text" name="kaki_bengkak"
                                        value="{{ $pemeriksaan->kaki_bengkak }}">
                                </div>
                                <div class="form-group mb-2">
                                    <label for="hasil_lab">Hasil Pemeriksaan Laboratorium</label>
                                    <input class="form-control" id="hasil_lab" type="text" name="hasil_lab"
                                        value="{{ $pemeriksaan->hasil_lab }}">
                                </div>
                                <div class="form-group mb-2">
                                    <label for="tindakan">Tindakan (pemberian TI, Fe, terapi, rujukan, umpan balik)</label>
                                    <input class="form-control" id="tindakan" type="text" name="tindakan"
                                        value="{{ $pemeriksaan->tindakan }}">
                                </div>
                                <div class="form-group mb-2">
                                    <label for="nasihat">Nasihat yang disampaikan</label>
                                    <input class="form-control" id="nasihat" type="text" name="nasihat"
                                        value="{{ $pemeriksaan->nasihat }}">
                                </div>
                                <div class="form-group mb-2">
                                    <label for="nama_pemeriksa">Nama Pemeriksa</label>
                                    <input class="form-control" id="nama_pemeriksa" type="text" name="nama_pemeriksa"
                                        value="{{ $pemeriksaan->nama_pemeriksa }}">
                                </div>
                                <div class="form-group mb-2">
                                    <label for="tgl_kembali">Kapan Harus Kembali</label>
                                    <input class="form-control" id="tgl_kembali" type="date" name="tgl_kembali"
                                        value="{{ $pemeriksaan->tgl_kembali }}" required>
                                </div>
                                <div class="modal-footer">
                                    <a href="{{ url()->previous() }}" type="button"
                                        class="btn mb-2 btn-secondary">Kembali</a>
                                    <button type="submit" class="btn mb-2 btn-primary">Update Data</button>
                                </div>
                            </div>

                        </div>
                    </div> <!-- .col-12 -->
                </div> <!-- .row -->
            </div>
        </form>
    </div>
@endsection
