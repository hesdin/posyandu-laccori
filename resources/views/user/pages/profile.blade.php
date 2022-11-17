@extends('user.app')

@section('title', 'Profile')

@section('content')
  @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong></strong> {{ session()->get('success') }} <button type="button" class="close" data-dismiss="alert"
        aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
    </div>
  @endif

  @if (session()->has('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong></strong> {{ session()->get('error') }} <button type="button" class="close" data-dismiss="alert"
        aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
    </div>
  @endif
  <div class="row">

    <div class="col-md-6">

      <div class="card shadow mb-4">
        <form action="{{ route('profile.update', auth()->user()->id) }}" method="post">
          @csrf
          @method('PATCH')
          <div class="card-body">

            <p class="mb-3"><strong>Profile</strong></p>

            <div class="form-group mb-3">
              <label for="simpleinput">Nomor Kartu Keluarga</label>
              <input type="text" id="simpleinput" class="form-control" value="{{ auth()->user()->no_kk }}" readonly>
            </div>

            <div class="form-group mb-3">
              <label for="simpleinput">Kepala Keluarga</label>
              <input type="text" id="simpleinput" class="form-control" value="{{ auth()->user()->nama }}" readonly>
            </div>

            @if (auth()->user()->ibuHamil()->exists())
              <div class="form-group mb-3">
                <label for="simpleinput">Nama Istri</label>
                <input type="text" id="simpleinput" class="form-control" value="{{ auth()->user()->ibuHamil->nama }}"
                  readonly>
              </div>
            @endif

            @if (auth()->user()->balita()->exists())
              <div class="form-group mb-3">
                <label for="simpleinput">Balita</label>
                <input type="text" id="simpleinput" class="form-control" value="{{ auth()->user()->balita->nama }}"
                  readonly>
              </div>
            @endif
            <div class="form-group mb-3">
              <label for="example-textarea">Alamat</label>
              <textarea class="form-control" id="example-textarea" rows="2" readonly>{{ auth()->user()->alamat }}
                      </textarea>
            </div>
          </div>
        </form>
      </div>

    </div>

    <div class="col-md-6">
      <div class="card shadow mb-4">
        <form action="{{ route('profile.update', auth()->user()->id) }}" method="post">
          @csrf
          @method('PATCH')
          <div class="card-body">
            <p class="mb-3"><strong>Ganti Password</strong></p>

            <div class="form-group mb-3">
              <label for="pass">Password Lama</label>
              <input type="password" id="pass" name="pass" class="form-control">
            </div>

            <div class="form-group mb-3">
              <label for="new_pass">Password Baru</label>
              <input type="password" id="new_pass" name="new_pass" class="form-control">
              <p class="text-danger font-italic">*Kosongkan jika tidak merubah password</p>
            </div>

          </div>

          <div class="modal-footer">
            <button type="submit" class="btn mb-2 btn-primary">Ubah Password</button>
          </div>
        </form>
      </div>

    </div>
  </div>
@endsection
