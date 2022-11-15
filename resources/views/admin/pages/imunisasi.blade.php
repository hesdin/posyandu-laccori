@extends('admin.layouts.app')

@section('title', 'Imunisasi')

@section('content')
  <div class="col-md-12 col-lg-9">
    @if (Session::has('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert" id="alertM">
        <strong>Sukses!</strong> {{ session('success') }}.<button type="button" class="close" data-dismiss="alert"
          aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
    @endif
    <div class="card shadow">
      <div class="card-header">
        <div class="row align-items-center">
          <div class="col">
            <h5 class="h5 mb-0 page-title">Data Vaksin Imunisasi</h5>
          </div>
          <div class="col-auto">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#defaultModal"><span
                class="fe fe-plus fe-12 mr-2"></span>Tambah</button>
          </div>
        </div>

      </div>
      <div class="card-body my-n2">
        <table class="table table-striped table-hover table-borderless">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Vaksin</th>
              <th>Umur Pemberian Vaksin</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>

            @forelse ($d_imunisasi as $imunisasi)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <th scope="col">{{ $imunisasi->nama }}</th>
                <td>{{ $imunisasi->umur_pemberian }}</td>
                <td>
                  <form action="{{ route('admin.imunisasi.destroy', $imunisasi->id) }}" method="POST"
                    id="form{{ $imunisasi->id }}">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-link show_confirm" type="submit" data-name="{{ $imunisasi->nama }}">
                      <span class="fe fe-trash fe-14 text-danger"></span>
                    </button>
                  </form>
                </td>
              </tr>
            @empty
            @endforelse


          </tbody>
        </table>
      </div>
    </div>
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
        <form action="{{ route('admin.imunisasi.store') }}" method="post">
          @csrf
          <div class="modal-body">
            <div class="form-group mb-3">
              <label for="nama">Nama Vaksin</label>
              <input type="text" name="nama" class="form-control" required>
            </div>
            <div class="form-group mb-3">
              <label for="umur_pemberian">Umur Pemberian Vaksin (Bulan)</label>
              <input type="text" name="umur_pemberian" class="form-control" required>
              <p class="font-italic">*Contoh : Usia 0-1 bulan</p>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script>
      $('.show_confirm').click(function(event) {

        let form = $(this).closest("form");
        let name = $(this).data("name");

        event.preventDefault();
        swal({
            title: `Apakah anda yakin hapus ${name} ?`,
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
  @endpush
@endsection
