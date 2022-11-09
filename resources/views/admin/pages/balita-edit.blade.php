@extends('admin.layouts.app')

@section('title', 'Edit Data Balita')

@push('css')
<link rel="stylesheet" href="{{ asset('assets/css/select2.css') }}">
@endpush

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="row align-items-center">
                    <div class="col">
                        <h4 class="h4 mb-0 page-title">Edit Data Balita {{ Str::ucfirst($balita->nama_balita) }}</h4>
                    </div>
                </div>
                <div class="row my-4">
                    <div class="col-md-6">
                        <div class="card shadow">
                            <div class="card-body">
                                <form action="{{ route('admin.balita.update', $balita->id) }}" method="post">
                                    @method('PUT')
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-group mb-3">
                                            <label for="nama">Nama Balita</label>
                                            <input type="text" name="nama" class="form-control"
                                                value="{{ $balita->nama }}" required>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="user_id">Nama Orang Tua</label>
                                            <select class="form-control select2 select2-hidden-accessible" id="user_id"
                                                data-select2-id="user_id" tabindex="-1" aria-hidden="true" name="user_id">
                                                @foreach ($users as $user)
                                                    <option value="{{ $user->id }}">{{ $user->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="jenis_kelamin">Jenis Kelamin</label>
                                            <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                                                <option value="laki-laki"
                                                    {{ $balita->jenis_kelamin == 'laki-laki' ? 'selected' : '' }}>Laki-laki
                                                </option>
                                                <option value="perempuan"
                                                    {{ $balita->jenis_kelamin == 'perempuan' ? 'selected' : '' }}>Perempuan
                                                </option>
                                            </select>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="tgl_lahir">Tanggal Lahir</label>
                                            <input class="form-control" id="tgl_lahir" type="date" name="tgl_lahir"
                                                value="{{ $balita->tgl_lahir }}">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn mb-2 btn-secondary"
                                            data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn mb-2 btn-primary">Update</button>
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


