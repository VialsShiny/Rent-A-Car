<?php

namespace App\Http\Controllers;

use App\Models\Vehicule;
use App\Models\VehiculeType;

class HomeController extends Controller
{
  public function index()
  {
    $vehicules = Vehicule::with('vehiculeType')->take(6)->get();
    $vehicule_type = VehiculeType::all();
    $fuel_type = Vehicule::select('fuel_type')->groupBy('fuel_type')->get();
    $transmission = Vehicule::select('transmission')->groupBy('transmission')->get();

    return view('welcome', ['vehicules' => $vehicules, 'title' => 'Home', 'vehicule_type' => $vehicule_type, 'fuel_type' => $fuel_type, 'transmission' => $transmission]);
  }
}