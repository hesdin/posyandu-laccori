@extends('admin.layouts.app')

@section('title', 'Edit Data Posyandu')

@push('css')
  <link rel="stylesheet" href="{{ asset('assets/css/select2.css') }}">
@endpush

@section('content')
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="row align-items-center">
          <div class="col">
            <h4 class="h4 mb-0 page-title">Edit Data Posyandu {{ Str::ucfirst($posyandu->balita->nama) }}</h4>
          </div>
        </div>
        <div class="row my-4">
          <div class="col-md-6">
            <div class="card shadow">
              <div class="card-body">
                <form action="{{ route('admin.balita-posyandu.update', $posyandu->id) }}" method="post">
                  @method('PUT')
                  @csrf
                  <div class="modal-body">
                    <div class="form-group mb-3">
                      <label for="tgl_posyandu">Tanggal Posyandu</label>
                      <input class="form-control" value="{{ $posyandu->tgl_posyandu }}" id="tgl_posyandu" type="date"
                        name="tgl_posyandu" required>
                    </div>

                    <div class="form-group mb-3">
                      <label for="berat_badan">Berat Badan (Kg)</label>
                      <input type="number" name="berat_badan" class="form-control" value="{{ $posyandu->berat_badan }}"
                        step="0.1" required>
                    </div>

                    <div class="form-group mb-3">
                      <label for="tinggi_badan">Tinggi Badan (Cm)</label>
                      <input type="number" value="{{ $posyandu->tinggi_badan }}" name="tinggi_badan" class="form-control"
                        step="0.1" required>
                    </div>

                    <div class="form-group mb-3">
                      <label for="lingkar_lengan">Lingkar Lengan (Cm)</label>
                      <input type="number" value="{{ $posyandu->lingkar_lengan }}" name="lingkar_lengan"
                        class="form-control" step="0.1" required>
                    </div>

                    <div class="form-group mb-3">
                      <label for="lingkar_kepala">Lingkar Kepala (Cm)</label>
                      <input type="number" value="{{ $posyandu->lingkar_kepala }}" name="lingkar_kepala"
                        class="form-control" step="0.1" required>
                    </div>

                    <div class="form-group mb-3">
                      <label for="imunisasi">Imunisasi - Pemberian Vaksin </label>
                      <select class="form-control select2 select2-hidden-accessible" id="imunisasi"
                        data-select2-id="imunisasi" tabindex="-1" aria-hidden="true" name="imunisasi">
                        @foreach ($d_imunisasi as $imunisasi)
                          <option value="" {{ $posyandu->imunisasi == null ? 'selected' : '' }}>Tidak Vaksin
                          </option>
                          <option value="{{ $imunisasi->id }}"
                            {{ $posyandu->imunisasi_id === $imunisasi->id ? 'selected' : '' }}>
                            {{ $imunisasi->nama }}
                          </option>
                        @endforeach
                      </select>

                    </div>

                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn mb-2 btn-primary">Ubah</button>
                  </div>
                </form>
              </div>
            </div> <!-- .col-12 -->
          </div> <!-- .row -->
        </div>
      </div>
    </div>
  </div>

  @push('script')
    <script src='{{ asset('assets/js/select2.min.js') }}'></script>
    <script>
      $('.select2').select2({
        theme: 'bootstrap4',
      });
      $('.select2-multi').select2({
        multiple: true,
        theme: 'bootstrap4',
      });
    </script>
  @endpush
@endsection
