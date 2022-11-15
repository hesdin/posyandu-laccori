@extends('user.app')

@section('title', 'Perkembangan Balita')

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/css/dataTables.bootstrap4.css') }}">
@endpush

@section('content')
    <div class="col-12 mb-4">
        <div class="card shadow">
            <div class="card-header">
                <div class="row align-items-center ">
                    <div class="col">
                        <h5 class="card-title m-0">Data Balita</h5>
                    </div>
                </div>
            </div>

            <div class="card-body">

                <table class="table table-borderless table-sm mb-0">
                    <tbody>
                        <tr>
                            <td style="width: 13%">Nama Orang Tua</td>
                            <td style="width: 2%"> : </td>
                            <td><strong>{{ auth()->user()->nama }}</strong></td>
                        </tr>
                        <tr>
                            <td style="width: 13%">Kartu Keluarga</td>
                            <td style="width: 2%"> : </td>
                            <td><strong>{{ auth()->user()->no_kk }}</strong></td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <hr class="m-0 p-0">
                            </td>
                        </tr>
                        <tr>
                            <td>Nama Balita</td>
                            <td> : </td>
                            <td><strong>{{ auth()->user()->balita->nama }}</strong></td>
                        </tr>
                        <tr>
                            <td>Tanggal Lahir</td>
                            <td>:</td>
                            <td><strong>{{ \Carbon\Carbon::parse(auth()->user()->balita->tgl_lahir)->isoFormat('D MMMM Y') }}</strong>
                            </td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td>:</td>
                            <td><strong>{{ ucfirst(auth()->user()->balita->jenis_kelamin) }}</strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div> <!-- / .card -->
    </div>

    <div class="col-12 mb-4">
        <div class="accordion accordion-boxed" id="accordion2">
            <div class="card shadow">
                <div class="card-header" id="headingTwo">
                    <a role="button" href="#collapseTwo" data-toggle="collapse" data-target="#collapseTwo"
                        aria-expanded="true" aria-controls="collapseTwo">
                        <strong>Grafik Perkembangan Balita</strong>
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
                        <strong>Data Posyandu</strong>
                    </a>
                </div>
                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion2"
                    style="">
                    <div class="card-body">
                        <!-- table -->
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-sm datatables dataTable no-footer" id="dataTable-1" role="grid"
                                    aria-describedby="dataTable-1_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting" tabindex="0" aria-controls="dataTable-1" rowspan="1"
                                                colspan="1" style="width: 68.8px;"
                                                aria-label="Tanggal Posyandu: activate to sort column ascending">
                                                Tanggal Posyandu</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable-1" rowspan="1"
                                                colspan="1" style="width: 52.05px;"
                                                aria-label="Berat Badan: activate to sort column ascending">Berat
                                                Badan</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable-1" rowspan="1"
                                                colspan="1" style="width: 52.05px;"
                                                aria-label="Tinggi Badan: activate to sort column ascending">Tinggi
                                                Badan</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable-1" rowspan="1"
                                                colspan="1" style="width: 93.9833px;"
                                                aria-label="Lingkar Kepala: activate to sort column ascending">
                                                Lingkar Kepala</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach (auth()->user()->balitaPosyandu as $posyandu)
                                            <tr role="row" class="odd">
                                                <td>{{ \Carbon\Carbon::parse($posyandu->tgl_posyandu)->isoFormat('DD/MMM/Y') }}
                                                </td>
                                                <td>{{ $posyandu->berat_badan }} Kg</td>
                                                <td>{{ $posyandu->tinggi_badan }} Cm</td>
                                                <td>{{ $posyandu->lingkar_kepala }} Cm</td>
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
