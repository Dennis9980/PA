<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth', 'gabungan'])->group(function () {
    Route::get('data-penghuni', function(){
        return view('layouts.datapenghuni');
    })->name('dataPenghuni');
    Route::get('data-laundry', function(){
        return view('layouts.dataLaundry');
    })->name('dataLaundry');
    Route::get('data-kebersihan', function(){
        return view('layouts.dataKebersihan');
    })->name('dataKebersihan');
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