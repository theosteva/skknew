<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Filament\Pages\Dashboard;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/kontak', function () {
    return view('kontak');
})->name('kontak');

Route::post('/kontak', [ContactController::class, 'store'])->name('contact.store');

Route::get('/dashboard', Dashboard::class)->name('dashboard');
