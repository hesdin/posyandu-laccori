@extends('admin.layouts.app')

@section('title', 'Profile')

@section('content')
  <div class="row">

    <div class="col-md-6">

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

      <div class="card shadow mb-4">
        <form action="{{ route('admin.profile.update', auth()->user()->id) }}" method="post">
          @csrf
          @method('PATCH')
          <div class="card-body">

            <p class="mb-3"><strong>Profile</strong></p>

            <div class="form-group mb-3">
              <label for="username">Username</label>
              <input type="text" id="username" name="username" class="form-control"
                value="{{ auth()->user()->username }}">
            </div>

            <div class="form-group mb-3">
              <label for="nama">Nama Lengkap</label>
              <input type="text" id="nama" name="nama" class="form-control" value="{{ auth()->user()->nama }}">
            </div>

            <p class="mb-2"><strong>Ganti Password</strong></p>

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
            <button type="submit" class="btn mb-2 btn-primary">Ubah Data</button>
          </div>
        </form>
      </div>

    </div>

  </div>
@endsection
