<?php

use App\Http\Controllers\VehiculeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index']);
Route::match(['get', 'post'], '/vehicules', [VehiculeController::class, 'index'])->name('vehicules.index');
Route::get('/vehicule/{id}/reservation', [VehiculeController::class, 'reservation']);
Route::get('/vehicule/{id}', [VehiculeController::class, 'details']);