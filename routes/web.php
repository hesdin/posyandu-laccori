<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BalitaController;
use App\Http\Controllers\BalitaPosyanduController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IbuHamilController;
use App\Http\Controllers\ImunisasiController;
use App\Http\Controllers\KeluargaController;
use App\Http\Controllers\PemeriksaanIbuHamilController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// User Route
Route::middleware(['guest'])->group(function () {
  Route::get('/', [AuthController::class, 'loginPage'])->name('login');
  Route::post('/', [AuthController::class, 'loginCheck'])->name('login.check');
});

Route::middleware(['auth', 'PreventBackHistory'])->group(function () {
  Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
  Route::get('/perkembangan-balita', [UserController::class, 'perkembanganBalita'])->name('perkembangan.balita');
  Route::get('/perkembangan-ibu-hamil', [UserController::class, 'perkembanganIbuHamil'])->name('perkembangan.ibu.hamil');
  Route::get('/perkembangan-ibu-hamil/{id}', [UserController::class, 'perkembanganIbuHamilShow'])->name('perkembangan.ibu.hamil.show');
  Route::get('profile', [UserController::class, 'profile'])->name('profile');
  Route::patch('profile/{id}', [UserController::class, 'profileUpdate'])->name('profile.update');
  Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

// Admin Route
Route::prefix('admin')
  ->name('admin.')
  ->group(function () {
    Route::middleware(['guest:admin'])->group(function () {
      Route::get('/', [AuthController::class, 'loginPageAdmin'])->name('login');
      Route::post('/', [AuthController::class, 'loginCheckAdmin'])->name('login.check');
    });

    Route::middleware(['auth:admin'])->group(function () {
      Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
      Route::resource('keluarga', KeluargaController::class);
      Route::resource('balita', BalitaController::class);
      Route::resource('balita-posyandu', BalitaPosyanduController::class);
      Route::resource('ibu-hamil', IbuHamilController::class);

      Route::resource('imunisasi', ImunisasiController::class);

      Route::get('pemeriksaan-ibu-hamil/create/{id}', [PemeriksaanIbuHamilController::class, 'create'])->name('pemeriksaan-ibu-hamil.create');

      Route::resource('pemeriksaan-ibu-hamil', PemeriksaanIbuHamilController::class, ['except' => 'create']);

      Route::get('/logout', [AuthController::class, 'logoutAdmin'])->name('logout');
    });
  });
