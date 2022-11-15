@extends('user.app')

@section('title', 'Detail Pemeriksaan Ibu Hamil')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="row align-items-center">
                    <div class="col">
                        <h5 class="h5 mb-0 page-title">Detail Pemeriksaan Ibu {{ auth()->user()->ibuHamil->nama }}
                        </h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="row my-4">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="modal-body">
                            <div class="form-group mb-2">
                                <label for="tgl_pemeriksaan">Tanggal Pemeriksaan</label>
                                <input class="form-control" id="tgl_pemeriksaan" type="text" name="tgl_pemeriksaan"
                                    value="{{ \Carbon\Carbon::parse($pemeriksaan->tgl_pemeriksaan)->isoFormat('dddd, D MMMM Y') }}"
                                    readonly>
                            </div>

                            <div class="form-group mb-2">
                                <label for="keluhan">Keluhan Sekarang</label>
                                @if ($pemeriksaan->keluhan == null)
                                    <input class="form-control" id="keluhan" type="text" name="keluhan" value="-"
                                        readonly>
                                @else
                                    <input class="form-control" id="keluhan" type="text" name="keluhan"
                                        value="{{ $pemeriksaan->keluhan }}" readonly>
                                @endif
                            </div>

                            <div class="form-group
                                    mb-2">
                                <label for="tekanan_darah">Tekanan Darah (mm/Hg)</label>
                                <input class="form-control" id="tekanan_darah" type="text" name="tekanan_darah"
                                    value="{{ $pemeriksaan->tekanan_darah }}" readonly>
                            </div>

                            <div class="form-group mb-2">
                                <label for="berat_badan">Berak Badan (Kg)</label>
                                <input class="form-control" id="berat_badan" type="text" name="berat_badan"
                                    value="{{ $pemeriksaan->berat_badan . ' ' . 'Kg' }}" readonly>
                            </div>

                            <div class="form-group mb-2">
                                <label for="umur_kehamilan">Umur Kehamilan (Minggu)</label>
                                <input class="form-control" id="umur_kehamilan" type="text" name="umur_kehamilan"
                                    value="{{ $pemeriksaan->umur_kehamilan . ' ' . 'Minggu' }}" readonly>
                            </div>

                            <div class="form-group mb-2">
                                <label for="tinggi_fundus">Tinggi Fundus (Cm)</label>
                                <input class="form-control" id="tinggi_fundus" type="text" name="tinggi_fundus"
                                    value="{{ $pemeriksaan->tinggi_fundus . ' ' . 'Cm' }}" readonly>
                            </div>

                            <div class="form-group mb-2">
                                <label for="letak_janin">Letak Janin : Kep/Su/Li</label>
                                <input class="form-control" id="letak_janin" type="text" name="letak_janin"
                                    value="{{ $pemeriksaan->letak_janin }}" readonly>
                            </div>

                            <div class="form-group mb-2">
                                <label for="denyut_jantung_janin">Denyut Jantung Janin / Menit</label>
                                <input class="form-control" id="denyut_jantung_janin" type="text"
                                    name="denyut_jantung_janin" value="{{ $pemeriksaan->denyut_jantung_janin }}" readonly>
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
                                    value="{{ $pemeriksaan->kaki_bengkak }}" readonly>
                            </div>
                            <div class="form-group mb-2">
                                <label for="hasil_lab">Hasil Pemeriksaan Laboratorium</label>
                                @if ($pemeriksaan->hasil_lab == null)
                                    <input class="form-control" id="hasil_lab" type="text" name="hasil_lab"
                                        value="-" readonly>
                                @else
                                    <input class="form-control" id="hasil_lab" type="text" name="hasil_lab"
                                        value="{{ $pemeriksaan->hasil_lab }}" readonly>
                                @endif
                            </div>
                            <div class="form-group mb-2">
                                <label for="tindakan">Tindakan (pemberian TI, Fe, terapi, rujukan, umpan balik)</label>
                                <input class="form-control" id="tindakan" type="text" name="tindakan"
                                    value="{{ $pemeriksaan->tindakan }}" readonly>
                            </div>
                            <div class="form-group mb-2">
                                <label for="nasihat">Nasihat yang disampaikan</label>
                                <input class="form-control" id="nasihat" type="text" name="nasihat"
                                    value="{{ $pemeriksaan->nasihat }}" readonly>
                            </div>
                            <div class="form-group mb-2">
                                <label for="nama_pemeriksa">Nama Pemeriksa</label>
                                <input class="form-control" id="nama_pemeriksa" type="text" name="nama_pemeriksa"
                                    value="{{ $pemeriksaan->nama_pemeriksa }}" readonly>
                            </div>
                            <div class="form-group mb-2">
                                <label for="tgl_kembali">Kapan Harus Kembali</label>
                                <input class="form-control" id="tgl_kembali" type="text" name="tgl_kembali"
                                    value="{{ \Carbon\Carbon::parse($pemeriksaan->tgl_kembali)->isoFormat('dddd, D MMMM Y') }}"
                                    readonly>
                            </div>
                            <div class="modal-footer">
                                <a href="{{ url()->previous() }}" type="button"
                                    class="btn mb-2 btn-primary">Kembali</a>
                            </div>
                        </div>

                    </div>
                </div> <!-- .col-12 -->
            </div> <!-- .row -->
        </div>
    </div>
@endsection
