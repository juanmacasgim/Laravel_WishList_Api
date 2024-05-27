<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WishController;

/**
 * Rutas de la API
 * Con eso hemos creado las rutas de la API basadas en el controlador WishController.
 * Podemos comprobarlas con el comando php artisan route:list.
 */

Route::resource('api/wishes', WishController::class);
