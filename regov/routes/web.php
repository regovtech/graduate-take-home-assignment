<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/{any}', function () {
    return view('layout');
})->where("any",".*");

Route::post('/users/create', [AuthController::class, 'register']);

Route::post('/users/login', [AuthController::class, 'loginPost']);

Route::post('/users/update', [AuthController::class, 'update']);

Route::post('/users/logout', [AuthController::class, 'logout']);



Route::middleware('auth:sanctum')->get('/user', [AuthController::class, 'user']);



