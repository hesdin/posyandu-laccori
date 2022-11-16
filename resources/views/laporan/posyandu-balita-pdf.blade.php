<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Laporan Posyandu Balita</title>
  <style>
    * {
      font-family: Arial, Helvetica, sans-serif;
      font-size: 12px;
      margin: 0px;
    }

    #kop {
      margin-top: 40px;
      text-align: center;
    }

    h1 {
      font-size: 14px;

    }

    #table {
      margin-top: 20px;
      margin-left: 40px;
      margin-right: 40px;

    }

    #ttd {
      margin-top: 40px;
      margin-left: 40px;
      margin-right: 40px;

      float: right;
    }

    .nama {
      margin-top: 45px;
      text-decoration: underline;
      font-weight: bold;
    }

    table {
      width: 100%;
    }

    table,
    th,
    td {
      border: 1px solid black;
      border-collapse: collapse;
    }
  </style>
</head>

<body>
  <section id="kop">
    <h1>Laporan Balita Posyandu Desa Laccorri</h1>
    <h1>Kecamatan Dua Boccoe</h1>
    <p>Januari 2022</p>
  </section>

  <section id="table">
    <table>
      <thead>
        <tr>
          <th rowspan="2">No</th>
          <th rowspan="2">Nama Balita</th>
          <th rowspan="2">Jenis Kelamin</th>
          <th rowspan="2">Tgl Lahir</th>
          <th rowspan="2">Nama Ayah/Ibu</th>
          <th rowspan="2">Alamat</th>
          <th colspan="3">Hasil Posyandu</th>
        </tr>

        <tr>
          <th>Berat Badan</th>
          <th>Tinggi Badan</th>
          <th>Lingkar Kepala</th>
        </tr>
      </thead>
      <tbody>

        @foreach ($d_posyandu as $posyandu)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $posyandu->balita->nama }}</td>
            <td>{{ Str::ucfirst($posyandu->balita->jenis_kelamin) }}</td>
            <td>{{ $posyandu->balita->tgl_lahir }}</td>
            <td>{{ $posyandu->balita->user->nama }}</td>
            <td>{{ $posyandu->balita->user->alamat }}</td>
            <td>{{ $posyandu->berat_badan }} Kg</td>
            <td>{{ $posyandu->tinggi_badan }} Cm</td>
            <td>{{ $posyandu->lingkar_kepala }} Cm</td>
          </tr>
        @endforeach

      </tbody>
    </table>
  </section>

  <section id="ttd">
    <p>Laccorri, {{ \Carbon\Carbon::now()->isoFormat('D MMMM Y') }}</p>
    <p>Kepala Posyandu</p>
    <p class="nama">Kepala Posyandu</p>
    <p>NIP.1231231231231</p>
  </section>

</body>

</html>
