@extends('admin.layouts.app')

@section('title', 'Data Keluarga')

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/css/dataTables.bootstrap4.css') }}">
@endpush

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="row align-items-center">
                    <div class="col">
                        <h2 class="h3 mb-0 page-title">Data Keluarga</h2>
                    </div>
                    <div class="col-auto">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#defaultModal"><span
                                class="fe fe-plus fe-12 mr-2"></span>Tambah</button>
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
                                                        rowspan="1" colspan="1"
                                                        aria-label="No KK: activate to sort column ascending">No KK</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable-1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Nama: activate to sort column ascending">Nama</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable-1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Alamat: activate to sort column ascending">
                                                        Alamat</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable-1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Action: activate to sort column ascending">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data_keluarga as $keluarga)
                                                    <tr role="row" class="odd">
                                                        <td><strong>{{ $keluarga->no_kk }}</strong></td>
                                                        <td>{{ $keluarga->nama }}</td>
                                                        <td>{{ $keluarga->alamat }}</td>
                                                        <td><button class="btn btn-sm dropdown-toggle more-horizontal"
                                                                type="button" data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false">
                                                                <span class="text-muted sr-only">Action</span>
                                                            </button>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item"
                                                                    href="{{ route('keluarga.edit', $keluarga->id) }}">Edit</a>
                                                                <form
                                                                    action="{{ route('keluarga.destroy', $keluarga->id) }}"
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

                {{-- Modal --}}
                <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="defaultModalLabel">Tambah Data Keluarga</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ route('keluarga.store') }}" method="post">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group mb-3">
                                        <label for="no_kk">No KK</label>
                                        <input type="text" name="no_kk" class="form-control" maxlength="16"
                                            minlength="16" required>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="nama">Nama</label>
                                        <input type="text" name="nama" class="form-control" required>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="alamat">Alamat</label>
                                        <textarea class="form-control" name="alamat" rows="3" required></textarea>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" class="form-control" minlength="6"
                                            required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn mb-2 btn-secondary"
                                        data-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn mb-2 btn-primary">Tambah</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
                {{-- End Modal --}}
            </div>
        </div>
    </div>

@endsection
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
