<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('auth/google', [App\Http\Controllers\Auth\LoginController::class, 'redirectToGoogle'])->name('google.auth');
Route::get('auth/google/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleGoogleCallback']);
