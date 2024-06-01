<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WishController;

/**
 * API Routes
 * This is where we define the routes of our API.
 * We can see the list of routes by running the command: php artisan route:list.
 */
Route::resource('api/wishes', WishController::class);
