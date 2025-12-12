<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;
// routes/api.php
use Illuminate\Http\Request;

// Handle preflight OPTIONS requests for all API routes
Route::options('/{any}', function () {
    return response()->noContent();
})->where('any', '.*');

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware(['auth.token'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user', [AuthController::class, 'user']);

    Route::apiResource('categories', CategoryController::class);
    Route::apiResource('transactions', TransactionController::class);
});
