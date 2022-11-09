<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BalitaController;
use App\Http\Controllers\BalitaPosyanduController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IbuHamilController;
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
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

// Admin Route
Route::prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::middleware(['guest'])->group(function () {
            Route::get('/login', [AuthController::class, 'loginPageAdmin'])->name('login');
        });

        Route::middleware(['auth'])->group(function () {
            Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');
            Route::resource('keluarga', KeluargaController::class);
            Route::resource('balita', BalitaController::class);
            Route::resource('balita-posyandu', BalitaPosyanduController::class);
            Route::resource('ibu-hamil', IbuHamilController::class);

            Route::get('pemeriksaan-ibu-hamil/create/{id}', [PemeriksaanIbuHamilController::class, 'create'])->name('pemeriksaan-ibu-hamil.create');

            Route::resource('pemeriksaan-ibu-hamil', PemeriksaanIbuHamilController::class, ['except' => 'create']);
        });
    });
