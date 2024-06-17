<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WishController;

/**
 * API Routes
 * This is where we define the routes of our API.
 * We can see the list of routes by running the command: php artisan route:list.
 */
Route::post('api/register', [LoginController::class, 'register']);
Route::post('api/login', [LoginController::class, 'login']);
Route::middleware('auth:sanctum')->get('api/logout', [LoginController::class, 'logout']);

Route::middleware('auth:sanctum')->resource('api/wishes', WishController::class);
//Route::resource('api/wishes', WishController::class);
Route::get('api/allusers', [LoginController::class, 'index']);
Route::get('api/allwishes', [WishController::class, 'index']);
