<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\RentMail;
use App\Models\Reservation;
use App\Models\Vehicule;
use Illuminate\Http\Request; // Ajout de l'importation de la classe Request
use Illuminate\Support\Facades\Mail; // Correction de l'importation de Mail

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

    public function sendRentMail(Request $request)
    {
        $request->validate([
            'email' => 'required|string|max:255',
        ]);

        $name = $request->input('name');

        $rentMail = new RentMail($name);

        Mail::to('vialsvialatou@gmail.com')->send($rentMail);

        return response()->json(['message' => 'E-mail envoyé avec succès !']);
    }
}