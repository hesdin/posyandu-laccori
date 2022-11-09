@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="row align-items-center">
                    <div class="col">
                        <h4 class="h4 mb-0 page-title">Edit Data Keluarga {{ Str::ucfirst($keluarga->nama) }}</h4>
                    </div>
                </div>
                <div class="row my-4">
                    <div class="col-md-6">
                        <div class="card shadow">
                            <div class="card-body">
                                <form action="{{ route('admin.keluarga.update', $keluarga->id) }}" method="post">
                                    @method('PUT')
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-group mb-3">
                                            <label for="no_kk">No KK</label>
                                            <input type="text" name="no_kk" class="form-control" maxlength="16"
                                                minlength="16" value="{{ $keluarga->no_kk }}" required>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="nama">Nama</label>
                                            <input type="text" name="nama" class="form-control"
                                                value="{{ $keluarga->nama }}" required>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="alamat">Alamat</label>
                                            <textarea class="form-control" name="alamat" rows="3" required>{{ $keluarga->alamat }}</textarea>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="password">Ubah Password</label>
                                            <input type="password" name="password" class="form-control" minlength="6">
                                            <p class="text-danger mt-1">Kosongkan jika tidak merubah password!</p>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="{{ route('admin.keluarga.index') }}" type="button"
                                            class="btn mb-2 btn-secondary">Batal</a>
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
