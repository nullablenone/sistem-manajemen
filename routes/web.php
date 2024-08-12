<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ModelProdukController;
use App\Http\Controllers\SepatuSendalController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    // dashboard
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    // produk
    Route::get('sepatu-sendal', [SepatuSendalController::class, 'index'])->name('sepatuSendal.index');
    Route::get('sepatu-sendal/create', [SepatuSendalController::class, 'create'])->name('sepatuSendal.create');
    Route::post('sepatu-sendal', [SepatuSendalController::class, 'store'])->name('sepatuSendal.store');
    Route::get('sepatu-sendal/{id}/edit', [SepatuSendalController::class, 'edit'])->name('sepatuSendal.edit');
    Route::put('sepatu-sendal/{id}', [SepatuSendalController::class, 'update'])->name('sepatuSendal.update');

    // model produk
    Route::get('model-produk', [ModelProdukController::class, 'index'])->name('modelProduk.index');
    Route::get('model-produk/create', [ModelProdukController::class, 'create'])->name('modelProduk.create');
    Route::post('model-produk', [ModelProdukController::class, 'store'])->name('modelProduk.store');
    Route::get('model-produk/{id}/edit', [ModelProdukController::class, 'edit'])->name('modelProduk.edit');
    Route::put('model-produk/{id}', [ModelProdukController::class, 'update'])->name('modelProduk.update');
    Route::delete('model-produk/{id}', [ModelProdukController::class, 'destroy'])->name('modelProduk.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
