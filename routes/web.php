<?php

use App\Http\Controllers\KamarKosController;
use App\Http\Controllers\KebersihanController;
use App\Http\Controllers\KosController;
use App\Http\Controllers\LaundryController;
use App\Http\Controllers\PenghuniController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\KelolaBooking;
use App\Http\Middleware\Penghuni;
use App\Models\Laundry;
use Illuminate\Support\Facades\Route;



// Route untuk halaman landing
Route::get('/', function () {
    return view('layouts.guest.landingPage');
})->name('landingPage');

// Route untuk halaman booking
// Route::get('/booking', function () {
//     return view('layouts.guest.booking');
// });

Route::get('/dashboard', [KamarKosController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

// Middleware untuk pengguna yang telah terautentikasi
Route::middleware('auth')->group(function () {
    // Route untuk halaman edit profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Include file auth.php untuk rute otentikasi
require __DIR__.'/auth.php';

// Middleware untuk pengguna gabungan
Route::middleware(['auth', 'gabungan'])->group(function () {
    // Route untuk data penghuni
    Route::get('data-penghuni', [PenghuniController::class, 'index'])->name('dataPenghuni');
    Route::post('data-penghuni/{id}/', [PenghuniController::class, 'edit'])->name('editPenghuni');
    Route::post('data-penghuni/addDetail', [PenghuniController::class, 'createDataDetail'])->name('makeDetail');
    Route::delete('data-penghuni/{id}/delete', [PenghuniController::class, 'destroy'])->name('deletePenghuni');

    // Route untuk data laundry
    Route::get('data-laundry', [LaundryController::class, 'index'])->name('dataLaundry');
    Route::post('data-laundry/add', [LaundryController::class, 'store'])->name('tambahLaundry');
    Route::put('data-Laundry/{id}/edit', [LaundryController::class, 'edit'])->name('updateLaundry');
    Route::delete('data-laundry/{id}/delete', [LaundryController::class, 'destroy'])->name('deleteLaundry');

    // Route untuk data kebersihan
    Route::get('data-kebersihan', [KebersihanController::class, 'index'])->name('dataKebersihan');
    Route::post('data-kebersihan/add', [KebersihanController::class, 'store'])->name('tambahDana');
    Route::put('data-kebersihan/{id}/edit', [KebersihanController::class, 'update'])->name('updateDana');
    Route::delete('data-kebersihan/{id}/delete', [KebersihanController::class, 'destroy'])->name('deleteDana');

    // Route untuk data booking
    Route::get('data-booking', [KelolaBooking::class, 'index'])->name('dataBooking');
    Route::get('data-booking/delete', [KelolaBooking::class, 'destoy'])->name('deleteBooking');
});

// Middleware untuk pemilik
Route::middleware(['auth', 'pemilik'])->group(function () {
    Route::get('pemilik-home', function(){
        return view('pemilik.home');
    })->name('pemilikDash');
    Route::get('data-keuangan', function(){
        return view('layouts.dataKeuangan');
    })->name('dataKeuangan');
});

// Middleware untuk pengurus
Route::middleware(['auth', 'pengurus'])->group(function () {
    Route::get('/pengurus-home', function(){
        return view('pengurus.home');
    })->name('pengurusDash');
});

// Middleware untuk penghuni
Route::middleware(['auth', 'penghuni'])->group(function () {
    Route::get('/penghuni-home', function(){
        return view('penghuni.home');
    })->name('penghuniDash');
});

// Route untuk halaman booking dan proses checkout
Route::get('/booking', [BookingController::class, 'index'])->name('bookingGuest');
Route::get('/dataCheckout/{orderId}', [BookingController::class, 'checkoutView'])->name('dataCheck');
Route::post('/checkout', [BookingController::class, 'checkout']);

Route::get('/invoice/{id}', [BookingController::class, 'invoice'])->name('invoice');
// Route untuk notification dari Midtrans
// Route::post('/midtrans-callback', [BookingController::class, 'notificationHandler']);

