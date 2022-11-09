<?php

namespace App\Http\Controllers;

use App\Charts\BalitaChart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function dashboard()
    {
        return view('user.pages.dashboard');
    }

    public function perkembanganBalita(BalitaChart $chart)
    {
        return view('user.pages.perkembangan-balita', ['chart' => $chart->build()]);
    }

}
