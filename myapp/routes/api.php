<?php

use App\Http\Controllers\Api\VehiculeController;
use Illuminate\Support\Facades\Route;

Route::post('/vehicules', [VehiculeController::class, 'all']);
