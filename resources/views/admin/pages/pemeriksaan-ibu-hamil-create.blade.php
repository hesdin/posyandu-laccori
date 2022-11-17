@extends('admin.layouts.app')

@section('title', 'Tambah Data Pemeriksaan Ibu Hamil')

@section('content')
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="row align-items-center">
          <div class="col">
            <h5 class="h5 mb-0 page-title">Tambah Data Pemeriksaan Ibu {{ $ibu_hamil->nama }}</h5>
          </div>
        </div>

      </div>
    </div>
    <form action="{{ route('admin.pemeriksaan-ibu-hamil.store') }}" method="post">
      @csrf
      <div class="row my-4">
        <div class="col-md-6">
          <div class="card shadow">
            <div class="card-body">
              <div class="modal-body">
                <input type="hidden" name="ibu_hamil_id" value="{{ Crypt::encryptString($ibu_hamil->id) }}">
                <div class="form-group mb-2">
                  <label for="tgl_pemeriksaan">Tanggal Pemeriksaan</label>
                  <input class="form-control" id="tgl_pemeriksaan" type="date" name="tgl_pemeriksaan"
                    value="{{ \Carbon\Carbon::today()->isoFormat('Y-m-d') }}" required>
                </div>

                <div class="form-group mb-2">
                  <label for="keluhan">Keluhan Sekarang</label>
                  <input class="form-control" id="keluhan" type="text" name="keluhan">
                  <p class="text-danger mb-0"><em>*Kosongkan jika tidak ada keluhan</em></p>
                </div>

                <div class="form-group mb-2">
                  <label for="tekanan_darah">Tekanan Darah (mm/Hg)</label>
                  <input class="form-control" id="tekanan_darah" type="text" name="tekanan_darah" placeholder="mm/Hg">
                </div>

                <div class="form-group mb-2">
                  <label for="berat_badan">Berak Badan (Kg)</label>
                  <input class="form-control" id="berat_badan" type="text" name="berat_badan" placeholder="Kg">
                </div>

                <div class="form-group mb-2">
                  <label for="umur_kehamilan">Umur Kehamilan (Minggu)</label>
                  <input class="form-control" id="umur_kehamilan" type="text" name="umur_kehamilan"
                    placeholder="Minggu">
                </div>

                <div class="form-group mb-2">
                  <label for="tinggi_fundus">Tinggi Fundus (Cm)</label>
                  <input class="form-control" id="tinggi_fundus" type="text" name="tinggi_fundus" placeholder="Cm">
                </div>

                <div class="form-group mb-2">
                  <label for="letak_janin">Letak Janin : Kep/Su/Li</label>
                  <input class="form-control" id="letak_janin" type="text" name="letak_janin" placeholder="Kep/Su/Li">
                </div>

                <div class="form-group mb-2">
                  <label for="denyut_jantung_janin">Denyut Jantung Janin / Menit</label>
                  <input class="form-control" id="denyut_jantung_janin" type="text" name="denyut_jantung_janin">
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
                  <input class="form-control" id="kaki_bengkak" type="text" name="kaki_bengkak" placeholder="-/+">
                  <p class="text-danger mb-0"><em>*Isi - (negatif) atau + (positif)</em></p>
                </div>
                <div class="form-group mb-2">
                  <label for="hasil_lab">Hasil Pemeriksaan Laboratorium</label>
                  <input class="form-control" id="hasil_lab" type="text" name="hasil_lab">
                  <p class="text-danger mb-0"><em>*Kosongkan jika tidak dilakukan pemeriksaan lab</em></p>
                </div>
                <div class="form-group mb-2">
                  <label for="tindakan">Tindakan (pemberian TI, Fe, terapi, rujukan, umpan balik)</label>
                  <input class="form-control" id="tindakan" type="text" name="tindakan">
                </div>
                <div class="form-group mb-2">
                  <label for="nasihat">Nasihat yang disampaikan</label>
                  <input class="form-control" id="nasihat" type="text" name="nasihat">
                </div>
                <div class="form-group mb-2">
                  <label for="nama_pemeriksa">Nama Pemeriksa</label>
                  <input class="form-control" id="nama_pemeriksa" type="text" name="nama_pemeriksa">
                </div>
                <div class="form-group mb-2">
                  <label for="tgl_kembali">Kapan Harus Kembali</label>
                  <input class="form-control" id="tgl_kembali" type="date" name="tgl_kembali" required>
                </div>
                <div class="modal-footer">
                  <a href="{{ url()->previous() }}" type="button" class="btn mb-2 btn-secondary">Batal</a>
                  <button type="submit" class="btn mb-2 btn-primary">Tambah Data</button>
                </div>
              </div>

            </div>
          </div> <!-- .col-12 -->
        </div> <!-- .row -->
      </div>
    </form>
  </div>
@endsection
