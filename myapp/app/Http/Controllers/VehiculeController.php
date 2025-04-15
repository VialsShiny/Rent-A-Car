<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use App\Models\Vehicule;
use App\Models\VehiculeType;
use Illuminate\Http\Request;
use DB;

class VehiculeController extends Controller
{
  public function index()
  {
    $vehicules = Vehicule::with('vehiculeType')->get();
    $vehicule_type = VehiculeType::all();
    $fuel_type = Vehicule::select(DB::raw('fuel_type as name'))->groupBy('fuel_type')->get();
    $transmission = Vehicule::select(DB::raw('transmission as name'))->groupBy('transmission')->get();

    return view('vehicules', ['vehicules' => $vehicules, 'title' => 'Vehicules', 'vehicule_type' => $vehicule_type, 'fuel_type' => $fuel_type, 'transmission' => $transmission]);
  }

  public function details($id)
  {
    $vehicule = Vehicule::with('vehiculeType', 'equipments')->find($id);
    $equipments = Equipment::all();

    $image = strtolower(str_replace(' ', '_', $vehicule->brand)) . '_' . strtolower(str_replace(' ', '_', $vehicule->model)) . '.png';
    $vehicule->air_conditioning = $vehicule->air_conditioning === false ? 'No' : 'Yes';

    if (strlen($vehicule->vehiculeType->name) <= 3) {
      $vehicule->vehiculeType->name = strtoupper($vehicule->vehiculeType->name);
    }

    return view('details', ['vehicule' => $vehicule, 'title' => "$vehicule->brand $vehicule->model", 'equipments' => $equipments, 'car_image' => $image]);
  }

  public function reservation($id)
  {
    $vehicule = Vehicule::with('vehiculeType')->find($id);

    $image = strtolower(str_replace(' ', '_', $vehicule->brand)) . '_' . strtolower(str_replace(' ', '_', $vehicule->model)) . '.png';

    return view('reservation', ['vehicule' => $vehicule, 'title' => 'Reservation', 'car_image' => $image]);
  }
}
