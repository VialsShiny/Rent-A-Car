<?php

namespace App\Http\Controllers;

use App\Models\Vehicule;
use Illuminate\Http\Request;

class VehiculeController extends Controller
{
    public function index()
    {
      $vehicules = Vehicule::with('vehiculeType')->take(6)->get();
  
      return view('vehicules', ['vehicules' => $vehicules, 'title' => 'Vehicules']);
    }
}
