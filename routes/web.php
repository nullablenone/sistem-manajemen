<?php

use App\Http\Middleware\CheckRole;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TasController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ModelTasController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ModelProdukController;
use App\Http\Controllers\SepatuSendalController;
use App\Http\Controllers\UkuranProdukController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware(['auth'])->group(function () {
    // dashboard
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('dashboard/register', [DashboardController::class, 'createAkun'])->middleware(CheckRole::class)->name('createAkun');
    Route::post('dashboard/', [DashboardController::class, 'storeAkun'])->name('storeAkun');

    // produk 
    // route sepatu dan sendal
    Route::get('sepatu-sendal', [SepatuSendalController::class, 'index'])->name('sepatuSendal.index');
    Route::get('sepatu-sendal/create', [SepatuSendalController::class, 'create'])->name('sepatuSendal.create');
    Route::post('sepatu-sendal', [SepatuSendalController::class, 'store'])->name('sepatuSendal.store');
    Route::get('sepatu-sendal/{id}/edit', [SepatuSendalController::class, 'edit'])->name('sepatuSendal.edit');
    Route::put('sepatu-sendal/{id}', [SepatuSendalController::class, 'update'])->name('sepatuSendal.update');
    Route::delete('sepatu-sendal/{id}', [SepatuSendalController::class, 'destroy'])->name('sepatuSendal.destroy');

    // route tas
    Route::get('tas', [TasController::class, 'index'])->name('tas.index');
    Route::get('tas/create', [TasController::class, 'create'])->name('tas.create');
    Route::post('tas', [TasController::class, 'store'])->name('tas.store');
    Route::get('tas/{id}/edit', [TasController::class, 'manage'])->name('tas.manage');
    Route::put('tas/{id}', [TasController::class, 'updateManage'])->name('tas.updateManage');
    Route::delete('tas/{id}', [TasController::class, 'destroy'])->name('tas.destroy');


    // model produk
    // route sepatu dan sendal
    Route::get('model-produk', [ModelProdukController::class, 'index'])->name('modelProduk.index');
    Route::get('model-produk/create', [ModelProdukController::class, 'create'])->name('modelProduk.create');
    Route::post('model-produk', [ModelProdukController::class, 'store'])->name('modelProduk.store');
    Route::get('model-produk/{id}/edit', [ModelProdukController::class, 'edit'])->name('modelProduk.edit');
    Route::put('model-produk/{id}', [ModelProdukController::class, 'update'])->name('modelProduk.update');
    Route::delete('model-produk/{id}', [ModelProdukController::class, 'destroy'])->name('modelProduk.destroy');

    // route tas
    Route::get('model-tas', [ModelTasController::class, 'index'])->name('modelTas.index');
    Route::get('model-tas/create', [ModelTasController::class, 'create'])->name('modelTas.create');
    Route::post('model-tas', [ModelTasController::class, 'store'])->name('modelTas.store');
    Route::get('model-tas/{id}/edit', [ModelTasController::class, 'edit'])->name('modelTas.edit');
    Route::put('model-tas/{id}', [ModelTasController::class, 'update'])->name('modelTas.update');
    Route::delete('model-tas/{id}', [ModelTasController::class, 'destroy'])->name('modelTas.destroy');




    // ukuran produk
    Route::get('ukuran-produk', [UkuranProdukController::class, 'index'])->name('ukuranProduk.index');
    Route::get('ukuran-produk/create', [UkuranProdukController::class, 'create'])->name('ukuranProduk.create');
    Route::post('ukuran-produk', [UkuranProdukController::class, 'store'])->name('ukuranProduk.store');
    Route::get('ukuran-produk/{id}/edit', [UkuranProdukController::class, 'edit'])->name('ukuranProduk.edit');
    Route::put('ukuran-produk/{id}', [UkuranProdukController::class, 'update'])->name('ukuranProduk.update');
    Route::delete('ukuran-produk/{id}', [UkuranProdukController::class, 'destroy'])->name('ukuranProduk.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
