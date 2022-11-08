@extends('admin.layouts.app')

@section('title', 'Balita Posyandu')

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/css/dataTables.bootstrap4.css') }}">
@endpush

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="row align-items-center">
                    <div class="col">
                        <h2 class="h3 mb-0 page-title">Balita Posyandu</h2>
                    </div>
                </div>
                <div class="row my-4">
                    <!-- Small table -->
                    <div class="col-md-12">

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
                                                        aria-label="Nama Balita: activate to sort column ascending">Nama
                                                        Balita</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable-1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Nama Orang Tua: activate to sort column ascending">Nama
                                                        Orang Tua</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable-1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Tgl Lahir: activate to sort column ascending">
                                                        Tgl Lahir</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable-1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Jenis Kelamin: activate to sort column ascending">Jenis
                                                        Kelamin</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable-1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Action: activate to sort column ascending">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data_balita as $balita)
                                                    <tr role="row" class="odd">
                                                        <td><strong>{{ $balita->nama }}</strong></td>
                                                        <td>{{ $balita->keluarga->nama }}</td>
                                                        <td>{{ \Carbon\Carbon::parse($balita->tgl_lahir)->isoFormat('D-MMM-Y') }}
                                                        <td>{{ $balita->jenis_kelamin }}</td>
                                                        <td>
                                                            <a href="{{ route('balita-posyandu.show', $balita->id) }}"
                                                                type="button" class="btn mb-2 btn-primary btn-sm"><span
                                                                    class="fe fe-arrow-right fe-12 mr-1"></span>Data
                                                                Posyandu</a>
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
