@extends('admin.layouts.app')

@section('title', 'Pemeriksaan Ibu Hamil')

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/css/select2.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/dataTables.bootstrap4.css') }}">
@endpush

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="row align-items-center">
                    <div class="col">
                        <h4 class="h4 mb-0 page-title">Data Pemeriksaan Ibu Hamil</h4>
                    </div>
                </div>
                <div class="row my-4">
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
                                        <table class="table datatables dataTable no-footer" id="dataTable-1" role="grid"
                                            aria-describedby="dataTable-1_info">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable-1"
                                                        rowspan="1" colspan="1" style="width: 68.8px;"
                                                        aria-label="Nama Ibu Hamil: activate to sort column ascending">Nama
                                                        Ibu Hamil</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable-1"
                                                        rowspan="1" colspan="1" style="width: 52.05px;"
                                                        aria-label="Keluarga: activate to sort column ascending">Keluarga
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable-1"
                                                        rowspan="1" colspan="1" style="width: 52.05px;"
                                                        aria-label="Anak Ke-: activate to sort column ascending">Anak Ke-
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable-1"
                                                        rowspan="1" colspan="1" style="width: 39px;"
                                                        aria-label="Action: activate to sort column ascending">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data_ibu_hamil as $ibu_hamil)
                                                    <tr role="row" class="odd">
                                                        <td><strong>{{ $ibu_hamil->nama }}</strong></td>
                                                        <td><strong>{{ $ibu_hamil->keluarga->nama }}</strong></td>
                                                        <td>{{ $ibu_hamil->anak_ke }}</td>
                                                        <td>
                                                            <a href="{{ route('pemeriksaan-ibu-hamil.show', $ibu_hamil->id) }}"
                                                                type="button" class="btn mb-2 btn-primary btn-sm"><span
                                                                    class="fe fe-arrow-right fe-12 mr-1"></span>
                                                                Pemeriksaan</a>
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
