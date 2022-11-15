@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="row align-items-center mb-2">
                    <div class="col">
                        <h2 class="h5 page-title">Hi Admin!</h2>
                    </div>
                </div>
                {{-- Start Widgets --}}
                <div class="row">
                    <div class="col-md-6 col-xl-4 mb-4">
                        <div class="card shadow">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-3 text-center">
                                        <span class="circle circle-sm bg-primary">
                                            <i class="fe fe-16 fe-users text-white mb-0"></i>
                                        </span>
                                    </div>
                                    <div class="col pr-0">
                                        <p class="mb-0">Jumlah Keluarga</p>
                                        <span class="h3 mb-0">{{ $keluarga }}</span>
                                        <span class="small text-success">+16.5%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-xl-4 mb-4">
                        <div class="card shadow">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-3 text-center">
                                        <span class="circle circle-sm bg-primary">
                                            <i class="fe fe-16 fe-user text-white mb-0"></i>
                                        </span>
                                    </div>
                                    <div class="col pr-0">
                                        <p class="mb-0">Jumlah Ibu Hamil</p>
                                        <span class="h3 mb-0">{{ $ibuHamil }}</span>
                                        <span class="small text-success">+16.5%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-xl-4 mb-4">
                        <div class="card shadow">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-3 text-center">
                                        <span class="circle circle-sm bg-primary">
                                            <i class="fe fe-16 fe-user text-white mb-0"></i>
                                        </span>
                                    </div>
                                    <div class="col pr-0">
                                        <p class="mb-0">Jumlah Balita</p>
                                        <span class="h3 mb-0">{{ $balita }}</span>
                                        <span class="small text-success">+16.5%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- End Widgets --}}
            </div>
        </div>

        {{-- Chart --}}
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="card-title">
                            <strong>Grafik Jumlah Pemeriksaan Ibu Hamil</strong>
                        </div>
                        <div class="row">
                            <div class="col-md-12">

                            </div>
                        </div> <!-- .row -->
                    </div> <!-- .card-body -->
                </div> <!-- .card -->
            </div>

            <div class="col-md-6">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="card-title">
                            <strong>Grafik Jumlah Posyandu Anak</strong>
                        </div>
                        <div class="row">
                            <div class="col-md-12">

                            </div>
                        </div> <!-- .row -->
                    </div> <!-- .card-body -->
                </div> <!-- .card -->
            </div>



        </div>


    </div>
    </div>

@endsection
