<?php

namespace App\Charts;

use App\Models\BalitaPosyandu;
use ArielMejiaDev\LarapexCharts\LarapexChart;


class BalitaChart
{
  protected $chart;

  public function __construct(LarapexChart $chart)
  {
    $this->chart = $chart;
  }

  public function build()
  {
    // $user = auth()->user()->id;
    // $balita = Balita::where('user_id', $user)->latest()->first();

    $balita_id = auth()->user()->balita->id;
    $balita_birth = auth()->user()->balita->tgl_lahir;

    $datas = BalitaPosyandu::where('balita_id', $balita_id)->get();

    if ($datas->isEmpty()) {
      return $this->chart->barChart()
        ->setTitle('Data Posyandu Belum Ada')
        ->addData('', [])
        ->setXAxis(['']);
    } else {
      foreach ($datas as $data) {
        $berat_badan[] = $data->berat_badan;
        $tinggi_badan[] = $data->tinggi_badan;
        $lingkar_kepala[] = $data->lingkar_kepala;
        $bulan[] = date('F', strtotime($data->tgl_posyandu));
        $diffs[] = date_diff(date_create($balita_birth), date_create($data->tgl_posyandu))->format('%r%y') * 12 + date_diff(date_create($balita_birth), date_create($data->tgl_posyandu))->format('%r%m');
      }

      $umur = [];

      foreach ($diffs as $diff) {
        $umur[] = 'umur' . ' ' . $diff . '(bln)';
      }

      return $this->chart->barChart()
        // ->setTitle(auth()->user()->nama)
        // ->setSubtitle()
        ->addData('Berat Badan(Kg)', $berat_badan)
        ->addData('Tinggi Badan(Cm)', $tinggi_badan)
        ->addData('Lingkar Kepala(Cm)', $lingkar_kepala)
        ->setXAxis($umur);
    }
  }
}
