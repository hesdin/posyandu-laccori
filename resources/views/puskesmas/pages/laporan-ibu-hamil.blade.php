@extends('puskesmas.app')

@section('title', 'Laporan')

@section('content')
  <div class="col-md-12">
    @if (Session::has('fail'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert" id="alertM">
        <strong>Gagal!</strong> {{ session('fail') }}.<button type="button" class="close" data-dismiss="alert"
          aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
    @endif
    <div class="card shadow">
      <div class="card-header">
        <div class="row align-items-center">
          <div class="col">
            <h5 class="h5 mb-0 page-title">Laporan Ibu Hamil</h5>
          </div>
          <div class="col-auto">
          </div>
        </div>

      </div>
      <form action="{{ route('puskesmas.laporan.ibu.hamil.pdf') }}" method="POST" target="_blank">
        @csrf

        <div class="card-body my-n2">
          <div class="form-group mb-3">
            <label for="bulan">Pilih Bulan</label>
            <select class="form-control" id="bulan" name="bulan">
              <option value="1">Januari</option>
              <option value="2">Februari</option>
              <option value="3">Maret</option>
              <option value="4">April</option>
              <option value="5">Mei</option>
              <option value="6">Juni</option>
              <option value="7">Juli</option>
              <option value="8">Agustus</option>
              <option value="9">September</option>
              <option value="10">Oktober</option>
              <option value="11">November</option>
              <option value="12">Desember</option>
            </select>
          </div>

          <div class="form-group mb-3">
            <label for="tahun">Tahun</label>
            <input type="number" name="tahun" class="form-control" min="2012" max="2099" step="1"
              value="2022" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn mb-2 btn-secondary" name="button" value="print">Print</button>
          <button type="submit" class="btn mb-2 btn-primary" name="button" value="download">Download</button>

        </div>
      </form>
    </div>
  </div>

  {{--  --}}
  @push('script')
  @endpush
@endsection
