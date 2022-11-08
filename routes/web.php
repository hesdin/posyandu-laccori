<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BalitaController;
use App\Http\Controllers\BalitaPosyanduController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IbuHamilController;
use App\Http\Controllers\KeluargaController;
use App\Http\Controllers\PemeriksaanIbuHamilController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'loginPageAdmin'])->name('login');
Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');
Route::resource('keluarga', KeluargaController::class);
Route::resource('balita', BalitaController::class);
Route::resource('balita-posyandu', BalitaPosyanduController::class);
Route::resource('ibu-hamil', IbuHamilController::class);

Route::get('pemeriksaan-ibu-hamil/create/{id}', [
  PemeriksaanIbuHamilController::class, 'create',
])->name('pemeriksaan-ibu-hamil.create');

Route::resource('pemeriksaan-ibu-hamil', PemeriksaanIbuHamilController::class, ['except' => 'create']);
