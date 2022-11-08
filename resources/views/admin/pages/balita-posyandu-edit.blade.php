@extends('admin.layouts.app')

@section('title', 'Edit Data Posyandu')

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
                                <form action="{{ route('balita-posyandu.update', $posyandu->id) }}" method="post">
                                    @method('PUT')
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-group mb-3">
                                            <label for="tgl_posyandu">Tanggal Posyandu</label>
                                            <input class="form-control" value="{{ $posyandu->tgl_posyandu }}"
                                                id="tgl_posyandu" type="date" name="tgl_posyandu" required>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="berat_badan">Berat Badan (Kg)</label>
                                            <input type="number" name="berat_badan" class="form-control"
                                                value="{{ $posyandu->berat_badan }}" step="0.1" required>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="tinggi_badan">Tinggi Badan (Cm)</label>
                                            <input type="number" value="{{ $posyandu->tinggi_badan }}" name="tinggi_badan"
                                                class="form-control" step="0.1" required>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="lingkar_kepala">Lingkar Kepala (Cm)</label>
                                            <input type="number" value="{{ $posyandu->lingkar_kepala }}"
                                                name="lingkar_kepala" class="form-control" step="0.1" required>
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
