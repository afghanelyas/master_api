<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Authentication\RegisterController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

// Authentication routes
Route::post('/register', [RegisterController::class, 'store'])
    ->name('auth.register');
