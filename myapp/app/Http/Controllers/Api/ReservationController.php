<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Models\Vehicule;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function getByID(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:vehicule,id',
        ]);

        $reservations = Reservation::where('vehicule_id', $request->input('id'))->get();

        $vehicule = Vehicule::where('id', $request->input('id'))->first();

        if (!$vehicule) {
            return response()->json(['error' => 'Véhicule non trouvé'], 404);
        }

        return response()->json([
            'reservations' => $reservations,
            'vehicule' => $vehicule
        ]);
    }
}
