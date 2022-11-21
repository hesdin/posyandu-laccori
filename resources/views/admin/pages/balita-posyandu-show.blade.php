@extends('admin.layouts.app')

@section('title', 'Detail Posyandu')

@push('css')
  <link rel="stylesheet" href="{{ asset('assets/css/select2.css') }}">
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
                <h5 class="card-title m-0">Data Posyandu {{ $balita->nama }}</h5>
              </div>
              <div class="col-auto">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#defaultModal"><span
                    class="fe fe-plus fe-12 mr-2"></span>Tambah</button>
              </div>
            </div>
          </div>

          <div class="card-body">

            <table class="table table-borderless table-sm mb-0">
              <tbody>
                <tr>
                  <td>Nama Balita</td>
                  <td> : </td>
                  <td><strong>{{ $balita->nama }}</strong></td>
                </tr>
                <tr>
                  <td style="width: 13%">Nama Orang Tua</td>
                  <td style="width: 2%"> : </td>
                  <td><strong>{{ $balita->user->nama }}</strong></td>
                </tr>
                <tr>
                  <td>Tanggal Lahir</td>
                  <td>:</td>
                  <td><strong>{{ \Carbon\Carbon::parse($balita->tgl_lahir)->isoFormat('D MMMM Y') }}</strong>
                  </td>
                </tr>
                <tr>
                  <td>Jenis Kelamin</td>
                  <td>:</td>
                  <td><strong>{{ ucfirst($balita->jenis_kelamin) }}</strong></td>
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
                    <table class="table table-sm datatables dataTable no-footer" id="dataTable-1" role="grid"
                      aria-describedby="dataTable-1_info">
                      <thead>
                        <tr role="row">
                          <th class="sorting" tabindex="0" aria-controls="dataTable-1" rowspan="1" colspan="1"
                            style="width: 68.8px;" aria-label="Tanggal Posyandu: activate to sort column ascending">
                            Tanggal Posyandu</th>
                          <th class="sorting" tabindex="0" aria-controls="dataTable-1" rowspan="1" colspan="1"
                            style="width: 52.05px;" aria-label="Berat Badan: activate to sort column ascending">Berat
                            Badan</th>
                          <th class="sorting" tabindex="0" aria-controls="dataTable-1" rowspan="1" colspan="1"
                            style="width: 52.05px;" aria-label="Tinggi Badan: activate to sort column ascending">Tinggi
                            Badan</th>
                          <th class="sorting" tabindex="0" aria-controls="dataTable-1" rowspan="1" colspan="1"
                            style="width: 93.9833px;" aria-label="Lingkar Kepala: activate to sort column ascending">
                            Lingkar Kepala</th>
                          <th class="sorting" tabindex="0" aria-controls="dataTable-1" rowspan="1" colspan="1"
                            style="width: 93.9833px;" aria-label="Imunisasi: activate to sort column ascending">
                            Imunisasi</th>
                          <th class="sorting" tabindex="0" aria-controls="dataTable-1" rowspan="1" colspan="1"
                            style="width: 39px;" aria-label="Action: activate to sort column ascending">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($balita_posyandu as $posyandu)
                          <tr role="row" class="odd">
                            <td>{{ \Carbon\Carbon::parse($posyandu->tgl_posyandu)->isoFormat('DD/MMM/Y') }}
                            </td>
                            <td>{{ $posyandu->berat_badan }} Kg</td>
                            <td>{{ $posyandu->tinggi_badan }} Cm</td>
                            <td>{{ $posyandu->lingkar_kepala }} Cm</td>
                            <td>{{ $posyandu->imunisasi->nama ?? '-' }}</td>

                            <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="text-muted sr-only">Action</span>
                              </button>
                              <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item"
                                  href="{{ route('admin.balita-posyandu.edit', $posyandu->id) }}">Edit</a>
                                <form id="form{{ $posyandu->id }}"
                                  action="{{ route('admin.balita-posyandu.destroy', $posyandu->id) }}" method="post">
                                  @csrf
                                  @method('DELETE')
                                  <button class="dropdown-item show_confirm" type="submit">Hapus</button>
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

  {{-- Modal --}}
  <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="defaultModalLabel">Tambah Data Posyandu</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('admin.balita-posyandu.store') }}" method="post">
          @csrf
          <div class="modal-body">
            <input type="hidden" name="balita_id" value="{{ Crypt::encryptString($balita->id) }}">
            <div class="form-group mb-3">
              <label for="tgl_posyandu">Tanggal Posyandu</label>
              <input class="form-control" id="tgl_posyandu" type="date" name="tgl_posyandu"
                value="{{ \Carbon\Carbon::today()->isoFormat('Y-m-d') }}" required>
            </div>

            <div class="form-group mb-3">
              <label for="berat_badan">Berat Badan (Kg)</label>
              <input type="number" name="berat_badan" class="form-control" step="0.1" required>
            </div>

            <div class="form-group mb-3">
              <label for="tinggi_badan">Tinggi Badan (Cm)</label>
              <input type="number" name="tinggi_badan" class="form-control" step="0.1" required>
            </div>

            <div class="form-group mb-3">
              <label for="lingkar_kepala">Lingkar Kepala (Cm)</label>
              <input type="number" name="lingkar_kepala" class="form-control" step="0.1" required>
            </div>

            <div class="form-group mb-3">
              <label for="imunisasi">Imunisasi - Pemberian Vaksin </label>
              <select class="form-control select2 select2-hidden-accessible" id="imunisasi" data-select2-id="imunisasi"
                tabindex="-1" aria-hidden="true" name="imunisasi">
                <option value="" selected>Tidak Vaksin</option>
                @foreach ($d_imunisasi as $imunisasi)
                  <option value="{{ $imunisasi->id }}">{{ $imunisasi->nama }}
                  </option>
                @endforeach
              </select>
              <p class="text-danger font-italic">*Pilih tidak vaksin jika tidak memberikan vaksin</p>
            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn mb-2 btn-primary">Tambah</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  {{-- End Modal --}}
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
