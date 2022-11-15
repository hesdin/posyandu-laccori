@extends('admin.layouts.app')

@section('title', 'Imunisasi')

@section('content')
  <div class="col-md-12 col-lg-8">
    <div class="card shadow">
      <div class="card-header">
        <strong class="card-title">Data Vaksin</strong>
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
            <tr>
              <td>1</td>
              <th scope="col">Brown, Asher D.</th>
              <td>Ap #331-7123 Lobortis Avenue</td>
              <td>
                <form action="" method="post">
                  <button class="btn btn-link active show_confirm" type="submit">
                    <span class="fe fe-trash fe-14 text-danger"></span>
                  </button>
                </form>
              </td>
            </tr>

          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
