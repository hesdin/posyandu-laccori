@extends('admin.layouts.app')

@section('title', 'Edit Data Balita')

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
                                <form action="{{ route('balita.update', $balita->id) }}" method="post">
                                    @method('PUT')
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-group mb-3">
                                            <label for="nama">Nama Balita</label>
                                            <input type="text" name="nama" class="form-control"
                                                value="{{ $balita->nama }}" required>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="nama_orang_tua">Nama Orang Tua</label>
                                            <select class="form-control" id="nama_orang_tua" name="nama_orang_tua">
                                                @foreach ($data_keluarga as $keluarga)
                                                    <option value="{{ $keluarga->id }}"
                                                        {{ $balita->keluarga_id == $keluarga->id ? 'selected' : '' }}>
                                                        {{ $keluarga->nama }}</option>
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
@endsection
