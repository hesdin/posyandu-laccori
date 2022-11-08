@extends('admin.layouts.app')

@section('title', 'Detail Pemeriksaan Ibu Hamil')

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
                                <h5 class="card-title m-0">Data Pemeriksaan Ibu {{ $ibu_hamil->nama }}</h5>
                            </div>
                            <div class="col-auto">
                                <a href="{{ route('pemeriksaan-ibu-hamil.create', $ibu_hamil->id) }}"
                                    class="btn btn-primary"><span class="fe fe-plus fe-12 mr-2"></span>Tambah
                                    Pemeriksaan</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                        <table class="table table-borderless table-sm mb-0">
                            <tbody>
                                <tr>
                                    <td>Nama Ibu Hamil</td>
                                    <td> : </td>
                                    <td><strong>{{ $ibu_hamil->nama }}</strong></td>
                                </tr>
                                <tr>
                                    <td>Tanggal Lahir</td>
                                    <td>:</td>
                                    <td><strong>{{ \Carbon\Carbon::parse($ibu_hamil->tgl_lahir)->isoFormat('D MMMM Y') }}</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 13%">Keluarga</td>
                                    <td style="width: 2%"> : </td>
                                    <td><strong>{{ $ibu_hamil->keluarga->nama }}</strong></td>
                                </tr>
                                <tr>
                                    <td>Anak Ke</td>
                                    <td>:</td>
                                    <td><strong>{{ $ibu_hamil->anak_ke }}</strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div> <!-- / .card -->

                <div class="row mb-4 mt-3">
                    <!-- Small table -->
                    <div class="col-md-12">
                        @if (Session::has('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert" id="alertM">
                                <strong>Sukses!</strong> {{ session('success') }}.<button type="button" class="close"
                                    data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                        @endif
                        <div class="card shadow">
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
                                                        aria-label="Action: activate to sort column ascending">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data_pemeriksaan as $pemeriksaan)
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

                                                        <td><button class="btn btn-sm dropdown-toggle more-horizontal"
                                                                type="button" data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false">
                                                                <span class="text-muted sr-only">Action</span>
                                                            </button>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item"
                                                                    href="{{ route('pemeriksaan-ibu-hamil.edit', $pemeriksaan->id) }}">Detail
                                                                    / Edit</a>
                                                                <form id="form{{ $pemeriksaan->id }}"
                                                                    action="{{ route('pemeriksaan-ibu-hamil.destroy', $pemeriksaan->id) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button class="dropdown-item show_confirm"
                                                                        type="submit">Hapus</button>
                                                                </form>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div> <!-- simple table -->
                            </div>
                            <!-- table -->
                        </div> <!-- .col-12 -->
                    </div> <!-- .row -->
                </div>

            </div>
        </div>
    </div>
    @push('script')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
        <script>
            $('.show_confirm').click(function(event) {

                let form = $(this).closest("form");
                let name = $(this).data("name");
                event.preventDefault();
                swal({
                        title: `Apakah anda yakin?`,
                        text: "Data yang dihapus tidak dapat dikembalikan!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            form.submit();
                        }
                    });
            });

            $("#alertM").show().delay(2000).fadeOut();
        </script>

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
