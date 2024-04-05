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


Route::get('/pemilik-home', function(){
    return view('pemilik.home');
})->middleware(['auth', 'pemilik']);
Route::get('/pengurus-home', function(){
    return view('pengurus.home');
})->middleware(['auth', 'pengurus']);
Route::get('/penghuni-home', function(){
    return view('penghuni.home');
})->middleware(['auth', 'penghuni']);