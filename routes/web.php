<?php

use App\Events\MessageSent;
use App\Http\Controllers\Admin\Dashboard;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\PromoController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingController::class, 'index']);
Route::get('/dashboard', [Dashboard::class, 'index']);
Route::get('/send-message', function () {
    broadcast(new MessageSent('Hello, this is a test message!'));
    return 'Message sent!';
});

Route::get('/chat', function () {
    return view('chat'); // Akan membuka resources/views/chat.blade.php
});

Route::get('/broadcast-promo', function () {
    return view('broadcast-promo');
});
Route::post('/broadcast-promo', [PromoController::class, 'broadcast']);
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
