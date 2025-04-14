<?php

namespace App\Http\Controllers;

use App\Models\Vehicule;

class HomeController extends Controller
{
  public function index()
  {
    $vehicules = Vehicule::limit(6)->get();

    return view('welcome', ['vehicules' => $vehicules]);
  }
}