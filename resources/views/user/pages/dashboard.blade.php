@extends('user.app')

@section('content')
    <div class="col-md-12 mb-4">
        <div class="card profile shadow">
            <div class="card-body my-4">
                <div class="row align-items-center">
                    <div class="col-md-3 text-center mb-5">
                        <img src="{{ asset('assets/img/logo2.png') }}" alt="logo" style="width: 150px"  >

                    </div>
                    <div class="col">
                        <div class="row align-items-center">
                            <div class="col-md-7">
                                <h5 class="mb-1">Aplikasi Pengolahan Data Balita dan Ibu Hamil</h5>
                                <p class="small mb-3"><span class="badge badge-dark badge-xl">Desa Laccori, Dua Boccoe</span></p>
                            </div>
                            <div class="col">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-7">
                                <p class="text-dark h6"> Selamat Datang di Aplikasi Pengolahan Data Balita dan Ibu Hamil Desa Laccori Kecamatan Dua Boccoe. Memuat Informasi Pasyandu Balita dan Data Pemeriksaan Ibu Hamil. </p>
                            </div>
                            <div class="col">
                                <p class="small mb-0">{{ auth()->user()->nama }}</p>
                                <p class="small mb-0">{{ auth()->user()->no_kk }}</p>
                                <p class="small mb-0">{{ auth()->user()->alamat }}</p>
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-md-7 mb-2">
                                <span class="small text-dark mb-0">{{ \Carbon\Carbon::now()->isoFormat('dddd, D MMMM Y') }}</span>
                            </div>
                            <div class="col mb-2">
                                <button type="button" class="btn btn-secondary">Profile</button>
                                <button type="button" class="btn btn-primary">Message</button>
                            </div>
                        </div>
                    </div>
                </div> <!-- / .row- -->
            </div> <!-- / .card-body - -->
        </div> <!-- / .card- -->
    </div>
@endsection
