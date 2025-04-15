<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use App\Models\Vehicule;
use Illuminate\Http\Request;

class VehiculeController extends Controller
{
  public function index()
  {
    $vehicules = Vehicule::with('vehiculeType')->get();

    return view('vehicules', ['vehicules' => $vehicules, 'title' => 'Vehicules']);
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

    return view('reservation', ['vehicule' => $vehicule, 'title' => 'Reservation']);
  }
}
