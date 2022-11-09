<?php

namespace App\Charts;

use App\Models\Balita;
use App\Models\BalitaPosyandu;
use Illuminate\Support\Carbon;
use ArielMejiaDev\LarapexCharts\LarapexChart;


class BalitaChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $user = auth()->user()->id;
        $balitas = Balita::where('user_id', $user)->get();

        $posyandu = [];

        foreach ($balitas as $balita) {
            $posyandu[] = $balita->id;
        }
        $datas = BalitaPosyandu::where('balita_id', $posyandu)->get();

        dd($datas);
        foreach ($datas as $data) {
            $berat_badan[] = $data->berat_badan;
            $tinggi_badan[] = $data->tinggi_badan;
            $lingkar_kepala[] = $data->lingkar_kepala;
            $bulan[] = date('F', strtotime($data->tgl_posyandu));
        }




       return $this->chart->barChart()
            ->setTitle(auth()->user()->nama)
            // ->setSubtitle()
            ->addData('Berat Badan(Kg)', $berat_badan)
            ->addData('Tinggi Badan(Cm)', $tinggi_badan)
            ->addData('Lingkar Kepala(Cm)', $lingkar_kepala)



            ->setXAxis($bulan);

    }
}
