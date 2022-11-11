@extends('user.app')

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
                        <strong>Grafik Perkembangan Balita - {{ auth()->user()->balita->nama }}</strong>
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

                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="{{ $chart->cdn() }}"></script>

    {{ $chart->script() }}
@endsection
