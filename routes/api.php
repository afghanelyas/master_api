<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Authentication\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'login']);

// Authentication routes
Route::post('/register', [RegisterController::class, 'store'])
    ->name('auth.register');
