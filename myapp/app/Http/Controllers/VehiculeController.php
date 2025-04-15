<?php

namespace App\Http\Controllers;

use App\Models\Vehicule;
use Illuminate\Http\Request;

class VehiculeController extends Controller
{
    public function index()
    {
      $vehicules = Vehicule::with('vehiculeType')->get();
  
      return view('vehicules', ['vehicules' => $vehicules, 'title' => 'Vehicules']);
    }

    public function reservation($id) {
      $vehicule = Vehicule::with('vehiculeType')->find($id);

      return view('reservation', ['vehicule' => $vehicule, 'title' => 'Reservation']);
    }
}
