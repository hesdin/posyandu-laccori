<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Laporan Pemeriksaan Ibu Hamil</title>
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
    <h1>Laporan Pemeriksaan Ibu Hamil Posyandu Desa Laccori</h1>
    <h1>Kecamatan Dua Boccoe</h1>
    <p>{{ $date }}</p>
  </section>

  <section id="table">
    <table>
      <thead>
        <tr>
          <th rowspan="2">No</th>
          <th rowspan="2">Nama Ibu Hamil</th>
          <th rowspan="2">Nama Suami</th>
          <th rowspan="2">Tgl Lahir</th>
          <th rowspan="2">Anak Ke - </th>
          <th rowspan="2">Usia Kehamilan </th>
          <th colspan="6">Hasil Pemeriksaan</th>
        </tr>

        <tr>
          <th>Tekanan Darah</th>
          <th>Berat Badan</th>
          <th>Tinggi Fundus</th>
          <th>Letak Janin</th>
          <th>Kaki Bengkak</th>
          <th>Tindakan</th>
        </tr>
      </thead>
      <tbody>

        @foreach ($d_pemeriksaan as $pemeriksaan)
          <tr style="text-align: center">
            <td>{{ $loop->iteration }}</td>
            <td>{{ $pemeriksaan->ibuHamil->nama }}</td>
            <td>{{ $pemeriksaan->ibuHamil->user->nama }}</td>
            <td>{{ $pemeriksaan->ibuHamil->tgl_lahir }}</td>
            <td>{{ $pemeriksaan->ibuHamil->anak_ke }}</td>
            <td>{{ $pemeriksaan->umur_kehamilan }} Minggu</td>
            <td>{{ $pemeriksaan->tekanan_darah }}</td>
            <td>{{ $pemeriksaan->berat_badan }} Kg</td>
            <td>{{ $pemeriksaan->tinggi_fundus }}</td>
            <td>{{ $pemeriksaan->letak_janin }}</td>
            <td>{{ $pemeriksaan->kaki_bengkak }}</td>
            <td>{{ $pemeriksaan->tindakan }}</td>
          </tr>
        @endforeach

      </tbody>
    </table>
  </section>

  <section id="ttd">
    <p>Laccorri, {{ \Carbon\Carbon::now()->isoFormat('D MMMM Y') }}</p>
    <p>Kepala Posyandu</p>
    <p class="nama">H. Sudirman, SKM</p>
    <p>NIP.19700404 199103 1 009</p>
  </section>

</body>

</html>
