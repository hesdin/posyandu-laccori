<?php

namespace App\Charts;

use App\Models\PemeriksaanIbuHamil;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class IbuHamilChart
{
  protected $chart;

  public function __construct(LarapexChart $chart)
  {
    $this->chart = $chart;
  }

  public function build(): \ArielMejiaDev\LarapexCharts\LineChart
  {
    $datas = PemeriksaanIbuHamil::where('ibu_hamil_id', auth()->user()->ibuHamil->id)->get();
    // $pemeriksaans = $data->pluck('berat_badan');

    foreach ($datas as $data) {
      $berat_badan[] = $data->berat_badan;
      $umur_kehamilan[] = $data->umur_kehamilan . ' ' . 'Bulan';
    }

    if ($datas->isEmpty()) {
      return $this->chart->lineChart()
        ->setTitle('Data belum ada.')
        // ->setSubtitle('Berdasarkan Usia Kehamilan.')
        ->addData('Berat Badan (Kg)', [])
        ->setXAxis([]);
    } else {
      return $this->chart->lineChart()
        ->setTitle('Pertambahan Berat Badan (Kg).')
        ->setSubtitle('Berdasarkan Usia Kehamilan.')
        ->addData('Berat Badan (Kg)', $berat_badan)
        ->setXAxis($umur_kehamilan);
    }
  }
}
