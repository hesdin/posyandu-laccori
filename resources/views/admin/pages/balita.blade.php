@extends('admin.layouts.app')

@section('title', 'Data Balita')

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/css/dataTables.bootstrap4.css') }}">
@endpush

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="row align-items-center">
                    <div class="col">
                        <h2 class="h3 mb-0 page-title">Data Balita</h2>
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
                                                        aria-label="Nama Balita: activate to sort column ascending">Nama
                                                        Balita</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable-1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Tgl Lahir: activate to sort column ascending">
                                                        Tgl Lahir</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable-1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Nama Orang Tua: activate to sort column ascending">Nama
                                                        Orang Tua</th>
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
                                                        <td>{{ \Carbon\Carbon::parse($balita->tgl_lahir)->isoFormat('D-MMM-Y') }}
                                                        <td>{{ $balita->keluarga->nama }}</td>
                                                        <td>{{ $balita->jenis_kelamin }}</td>
                                                        </td>
                                                        <td><button class="btn btn-sm dropdown-toggle more-horizontal"
                                                                type="button" data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false">
                                                                <span class="text-muted sr-only">Action</span>
                                                            </button>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item"
                                                                    href="{{ route('balita.edit', $balita->id) }}">Edit</a>
                                                                <form id="form{{ $balita->id }}"
                                                                    action="{{ route('balita.destroy', $balita->id) }}"
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
                                <h5 class="modal-title" id="defaultModalLabel">Tambah Data Balita</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ route('balita.store') }}" method="post">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group mb-3">
                                        <label for="nama">Nama Balita</label>
                                        <input type="text" name="nama" class="form-control" required>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="nama_orang_tua">Nama Orang Tua</label>
                                        <select class="form-control" id="nama_orang_tua" name="nama_orang_tua">
                                            @foreach ($data_keluarga as $keluarga)
                                                <option value="{{ $keluarga->id }}">{{ $keluarga->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="jenis_kelamin">Jenis Kelamin</label>
                                        <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                                            <option value="laki-laki">Laki-laki</option>
                                            <option value="perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="tgl_lahir">Tanggal Lahir</label>
                                        <input class="form-control" id="tgl_lahir" type="date" name="tgl_lahir"
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

            $("#alertM").show().delay(2000).fadeOut(); <
            />

            <
            script src = '{{ asset('assets/js/jquery.dataTables.min.js') }}' >
        </script>
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
