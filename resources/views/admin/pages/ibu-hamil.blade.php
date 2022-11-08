@extends('admin.layouts.app')

@section('title', 'Data Ibu Hamil')

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
                        <h2 class="h3 mb-0 page-title">Data Ibu Hamil</h2>
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
                                                        aria-label="Nama Ibu Hamil: activate to sort column ascending">Nama
                                                        Ibu Hamil</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable-1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Keluarga: activate to sort column ascending">Keluarga
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable-1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Tgl Lahir: activate to sort column ascending">
                                                        Tgl Lahir</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable-1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Anak Ke-: activate to sort column ascending">Anak Ke-
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable-1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Action: activate to sort column ascending">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data_ibu_hamil as $ibu_hamil)
                                                    <tr role="row" class="odd">
                                                        <td><strong>{{ $ibu_hamil->nama }}</strong></td>
                                                        <td>{{ $ibu_hamil->keluarga->nama }}</td>
                                                        <td>{{ \Carbon\Carbon::parse($ibu_hamil->tgl_lahir)->isoFormat('D-MMM-Y') }}
                                                        </td>
                                                        <td>{{ $ibu_hamil->anak_ke }}</td>
                                                        <td><button class="btn btn-sm dropdown-toggle more-horizontal"
                                                                type="button" data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false">
                                                                <span class="text-muted sr-only">Action</span>
                                                            </button>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item"
                                                                    href="{{ route('ibu-hamil.edit', $ibu_hamil->id) }}">Edit</a>
                                                                <form id="form{{ $ibu_hamil->id }}"
                                                                    action="{{ route('ibu-hamil.destroy', $ibu_hamil->id) }}"
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
                                <h5 class="modal-title" id="defaultModalLabel">Tambah Data Ibu Hamil</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ route('ibu-hamil.store') }}" method="post">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group mb-3">
                                        <label for="nama">Nama Ibu Hamil</label>
                                        <input type="text" name="nama" class="form-control" required>
                                    </div>
                                    <div class="form-group mb-3" data-select2-id="13">
                                        <label for="simple-select2">Keluarga</label>
                                        <select class="form-control select2 select2-hidden-accessible" id="simple-select2"
                                            data-select2-id="simple-select2" tabindex="-1" aria-hidden="true"
                                            name="keluarga_id">
                                            @foreach ($data_keluarga as $keluarga)
                                                <option value="{{ $keluarga->id }}">{{ $keluarga->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="anak_ke">Anak Ke- </label>
                                        <input type="number" name="anak_ke" class="form-control" required
                                            min="1">
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
        <script src='{{ asset('assets/js/select2.min.js') }}'></script>
        <script>
            $('.select2').select2({
                theme: 'bootstrap4',
            });
            $('.select2-multi').select2({
                multiple: true,
                theme: 'bootstrap4',
            });
        </script>
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
