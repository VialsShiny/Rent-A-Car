<?php

use App\Http\Controllers\Api\ReservationController;
use App\Http\Controllers\Api\VehiculeController;
use Illuminate\Support\Facades\Route;

Route::post('/vehicules', [VehiculeController::class, 'all']);
Route::post('/get/allReservation', [ReservationController::class, 'getByID']);
Route::post('/vehicule-mail', [ReservationController::class, 'sendRentMail']);