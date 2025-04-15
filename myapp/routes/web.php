<?php

use App\Http\Controllers\VehiculeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/vehicules', [VehiculeController::class, 'index']);
Route::get('/vehicule/{id}/reservation', [VehiculeController::class, 'reservation']);
  