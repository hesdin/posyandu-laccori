@extends('user.app')

@section('title', 'Pemeriksaan Ibu Hamil')

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/css/dataTables.bootstrap4.css') }}">
@endpush

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card shadow">
                    <div class="card-header">
                        <div class="row align-items-center ">
                            <div class="col">
                                <h5 class="card-title m-0">Data Pemeriksaan Ibu {{ auth()->user()->ibuHamil->nama }}</h5>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                        <table class="table table-borderless table-sm mb-0">
                            <tbody>
                                <tr>
                                    <td style="width: 13%">Keluarga</td>
                                    <td style="width: 2%"> : </td>
                                    <td><strong>{{ auth()->user()->ibuHamil->user->nama }}</strong></td>
                                </tr>
                                <tr>
                                    <td>Nama Ibu Hamil</td>
                                    <td> : </td>
                                    <td><strong>{{ auth()->user()->ibuHamil->nama }}</strong></td>
                                </tr>
                                <tr>
                                    <td>Tanggal Lahir</td>
                                    <td>:</td>
                                    <td><strong>{{ \Carbon\Carbon::parse(auth()->user()->ibuHamil->tgl_lahir)->isoFormat('D MMMM Y') }}</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Anak Ke</td>
                                    <td>:</td>
                                    <td><strong>{{ auth()->user()->ibuHamil->anak_ke }}</strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div> <!-- / .card -->



            </div>
        </div>

        <div class="row mb-4 mt-3">
            <div class="col-12 mb-4">
                <div class="accordion accordion-boxed" id="accordion2">
                    <div class="card shadow">
                        <div class="card-header" id="headingTwo">
                            <a role="button" href="#collapseTwo" data-toggle="collapse" data-target="#collapseTwo"
                                aria-expanded="true" aria-controls="collapseTwo">
                                <strong>Grafik Pertambahan Berat Badan</strong>
                            </a>
                        </div>
                        <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordion2"
                            style="">
                            <div class="card-body" style="position: relative;">
                                {!! $chart->container() !!}
                            </div>
                        </div>
                    </div>
                    <div class="card shadow">
                        <div class="card-header" id="headingOne">
                            <a role="button" href="#collapseOne" data-toggle="collapse" data-target="#collapseOne"
                                aria-expanded="false" aria-controls="collapseOne" class="collapsed">
                                <strong>Data Pemeriksaan</strong>
                            </a>
                        </div>
                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion2"
                            style="">
                            <div class="card-body">
                                <!-- table -->
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-sm datatables dataTable no-footer" id="dataTable-1"
                                            role="grid" aria-describedby="dataTable-1_info">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable-1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Tgl Pemeriksaan: activate to sort column ascending">Tgl
                                                        Pemeriksaan</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable-1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Tekanan Darah: activate to sort column ascending">
                                                        Tekanan Darah
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable-1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Berat Badan: activate to sort column ascending">
                                                        Berat Badan
                                                    </th>

                                                    <th class="sorting" tabindex="0" aria-controls="dataTable-1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Umur Kehamilan: activate to sort column ascending">
                                                        Umur Kehamilan
                                                    </th>

                                                    <th class="sorting" tabindex="0" aria-controls="dataTable-1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Tinggi Fundus: activate to sort column ascending">
                                                        Tinggi Fundus
                                                    </th>

                                                    <th class="sorting" tabindex="0" aria-controls="dataTable-1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Nama Pemeriksa: activate to sort column ascending">
                                                        Nama Pemeriksa
                                                    </th>

                                                    <th class="sorting" tabindex="0" aria-controls="dataTable-1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Tgl Kembali: activate to sort column ascending">
                                                        Tgl Kembali
                                                    </th>

                                                    <th class="sorting" tabindex="0" aria-controls="dataTable-1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Action: activate to sort column ascending">Action
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach (auth()->user()->pemeriksaanIbuHamil as $pemeriksaan)
                                                    <tr role="row" class="odd">
                                                        <td><strong>{{ \Carbon\Carbon::parse($pemeriksaan->tgl_pemeriksaan)->isoFormat('DD/MMM/Y') }}</strong>
                                                        </td>
                                                        <td>{{ $pemeriksaan->tekanan_darah }} mmHg</td>
                                                        <td>{{ $pemeriksaan->berat_badan }} Kg</td>
                                                        <td><strong>{{ $pemeriksaan->umur_kehamilan }} Minggu</strong></td>
                                                        <td>{{ $pemeriksaan->tinggi_fundus }}</td>
                                                        <td>{{ $pemeriksaan->nama_pemeriksa }}</td>
                                                        <td><strong>{{ \Carbon\Carbon::parse($pemeriksaan->tgl_kembali)->isoFormat('DD/MMM/Y') }}</strong>
                                                        </td>
                                                        <td>
                                                            <a class="btn btn-sm btn-primary"
                                                                href="{{ route('perkembangan.ibu.hamil.show', $pemeriksaan->id) }}">
                                                                <span class="fe fe-arrow-right fe-12 mr-1"></span>
                                                                Detail
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div> <!-- simple table -->
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <script src="{{ $chart->cdn() }}"></script>

            {{ $chart->script() }}
        </div>
    </div>
    @push('script')
        <script src='{{ asset('assets/js/jquery.dataTables.min.js') }}'></script>
        <script src='{{ asset('assets/js/dataTables.bootstrap4.min.js') }}'></script>
        <script>
            $('#dataTable-1').DataTable({
                autoWidth: true,
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ]
            });
        </script>
    @endpush
@endsection
