<?php

declare(strict_types=1);

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\IndexController;
use Hypervel\Support\Facades\Route;

Route::any('/', [IndexController::class, 'index']);

Route::group('/auth', function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
});