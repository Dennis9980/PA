<?php

use App\Models\Laundry;
use App\Http\Middleware\Penghuni;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KelolaBooking;
use App\Http\Controllers\KosController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LaundryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KamarKosController;
use App\Http\Controllers\PenghuniController;
use App\Http\Controllers\KebersihanController;
use App\Http\Controllers\PenghuniViewController;
use App\Http\Controllers\TransactionController;

// Route untuk halaman landing
Route::get('/', function () {
    return view('layouts.guest.home-page');
})->name('homePage');

// Route untuk halaman booking
// Route::get('/booking', function () {
//     return view('layouts.guest.booking');
// });

Route::get('/booking', [BookingController::class, 'index'])->name('bookingGuest');
Route::post('/checkout', [TransactionController::class, 'store'])->name('chechoutBooking');
Route::delete('/booking/delete/{id}', [TransactionController::class, 'deleteBooking'])->name('deleteBooking');
Route::get('/invoice/{id}', [TransactionController::class, 'invoice'])->name('invoice');


// Middleware untuk pengguna yang telah terautentikasi
Route::middleware('auth')->group(function () {
    // Route untuk halaman edit profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Include file auth.php untuk rute otentikasi
require __DIR__ . '/auth.php';

// Middleware untuk pengguna gabungan
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('data-penghuni', [PenghuniController::class, 'index'])->name('dataPenghuni');
    Route::post('data-penghuni/{id}/', [PenghuniController::class, 'edit'])->name('editPenghuni');
    Route::post('data-penghuni/addDetail', [PenghuniController::class, 'createDataDetail'])->name('makeDetail');
    Route::delete('data-penghuni/{id}/delete', [PenghuniController::class, 'destroy'])->name('deletePenghuni');
    Route::post('data-penghuni/{id}/reset-dana', [PenghuniController::class, 'resetDana'])->name('resetDanaKebersihan');


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
    Route::get('data-booking', [TransactionController::class, 'index'])->name('dataBooking');
    Route::get('data-transaksi', [TransactionController::class, 'indexOther'])->name('dataTransaksi');

    Route::delete('data-transaksi/delete/{id}', [TransactionController::class, 'destroy'])->name('deleteTransaksi');
});

// Middleware untuk penghuni
Route::middleware(['auth', 'penghuni'])->group(function () {
    Route::get('/penghuni-home', [PenghuniViewController::class, 'index'])->name('penghuniDash');
    Route::post('/transaksi', [TransactionController::class, 'store'])->name('transaksiPembayaran');
    Route::get('/pembayaran/invoice/{id}', [TransactionController::class, 'invoicePenghuni'])->name('invoice.penghuni');
});

// Route untuk halaman booking dan proses checkout


// Route untuk notification dari Midtrans
// Route::post('/midtrans-callback', [BookingController::class, 'notificationHandler']);
