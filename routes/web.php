<?php

use App\Http\Controllers\KebersihanController;
use App\Http\Controllers\KosController;
use App\Http\Controllers\LaundryController;
use App\Http\Controllers\PenghuniController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\Penghuni;
use App\Models\Laundry;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [KosController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth', 'gabungan'])->group(function () {
    // Data Penghuni
    Route::get('data-penghuni', [PenghuniController::class, 'index'])->name('dataPenghuni');
    Route::put('data-penghuni/{id}/edit', [PenghuniController::class, 'edit'])->name('editPenghuni');
    Route::delete('data-penghuni/{id}/delete', [PenghuniController::class, 'destroy'])->name('deletePenghuni');

    // Data Laundry
    Route::get('data-laundry', [LaundryController::class, 'index'])->name('dataLaundry');
    Route::post('data-laundry/add', [LaundryController::class, 'store'])->name('tambahLaundry');
    Route::put('data-Laundry/{id}/edit', [LaundryController::class, 'edit'])->name('updateLaundry');
    Route::delete('data-laundry/{id}/delete', [LaundryController::class, 'destroy'])->name('deleteLaundry');

    // Data Kebersihan
    Route::get('data-kebersihan', [KebersihanController::class, 'index'])->name('dataKebersihan');
    Route::post('data-kebersihan/add', [KebersihanController::class, 'store'])->name('tambahDana');
    Route::put('data-kebersihan/{id}/edit', [KebersihanController::class, 'update'])->name('updateDana');
    Route::delete('data-kebersihan/{id}/delete', [KebersihanController::class, 'destroy'])->name('deleteDana');

    // Data Booking
    Route::get('data-booking', function(){
        return view('layouts.dataBooking');
    })->name('dataBooking');
});

// Pemilik
Route::middleware(['auth', 'pemilik'])->group(function () {
    Route::get('pemilik-home', function(){
        return view('pemilik.home');
    })->name('pemilikDash');
    Route::get('data-keuangan', function(){
        return view('layouts.dataKeuangan');
    })->name('dataKeuangan');
});

// Pengurus
Route::middleware(['auth', 'pengurus'])->group(function () {
    Route::get('/pengurus-home', function(){
        return view('pengurus.home');
    })->name('pengurusDash');
});


// Penghuni
Route::middleware(['auth', 'penghuni'])->group(function () {
    Route::get('/penghuni-home', function(){
        return view('penghuni.home');
    })->name('penghuniDash');
});