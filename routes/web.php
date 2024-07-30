<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SepatuSendalController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::get('sepatu-sendal', [SepatuSendalController::class, 'index'])->name('sepatuSendal.index');
    Route::get('sepatu-sendal/create', [SepatuSendalController::class, 'create'])->name('sepatuSendal.create');
    Route::post('sepatu-sendal', [SepatuSendalController::class, 'store'])->name('sepatuSendal.store');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
