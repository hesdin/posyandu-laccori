@extends('admin.layouts.app')

@section('title', 'Edit Data Ibu Hamil')

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/css/dataTables.bootstrap4.css') }}">
@endpush

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="row align-items-center">
                    <div class="col">
                        <h4 class="h4 mb-0 page-title">Edit Ibu Hamil {{ Str::ucfirst($ibu_hamil->nama) }}</h4>
                    </div>
                </div>
                <div class="row my-4">
                    <div class="col-md-6">
                        <div class="card shadow">
                            <div class="card-body">
                                <form action="{{ route('ibu-hamil.update', $ibu_hamil->id) }}" method="post">
                                    @method('PUT')
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-group mb-3">
                                            <label for="nama">Nama Ibu Hamil</label>
                                            <input type="text" name="nama" class="form-control"
                                                value="{{ $ibu_hamil->nama }}" required>
                                        </div>
                                        <div class="form-group mb-3" data-select2-id="13">
                                            <label for="simple-select2">Keluarga</label>
                                            <select class="form-control select2 select2-hidden-accessible"
                                                id="simple-select2" data-select2-id="simple-select2" tabindex="-1"
                                                aria-hidden="true" name="keluarga_id">
                                                @foreach ($data_keluarga as $keluarga)
                                                    <option value="{{ $keluarga->id }}"
                                                        {{ $ibu_hamil->keluarga_id == $keluarga->id ? 'selected' : '' }}>
                                                        {{ $keluarga->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="anak_ke">Anak Ke- </label>
                                            <input type="number" name="anak_ke" class="form-control"
                                                value="{{ $ibu_hamil->anak_ke }}" required min="1">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="tgl_lahir">Tanggal Lahir</label>
                                            <input class="form-control" id="tgl_lahir" type="date" name="tgl_lahir"
                                                value="{{ $ibu_hamil->tgl_lahir }}" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn mb-2 btn-secondary"
                                            data-dismiss="modal">Batal</button>
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
@endsection

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
