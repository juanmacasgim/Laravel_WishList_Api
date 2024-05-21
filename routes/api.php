<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WishController;

Route::resource('api/wishes', WishController::class);
