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
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'vehicule_name' => 'required|string|max:255',
                'start_date' => 'required|date|after_or_equal:today',
                'end_date' => 'required|date|after:start_date',
                'total_price' => 'required|integer|min:0|max:99999',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['errors' => $e->validator->errors()]);
        }

        $name = $request->input('name');
        $email = $request->input('email');
        $vehicule_name = $request->input('vehicule_name');
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $total_price = $request->input('total_price');

        $rentMail = new RentMail($name, $vehicule_name, $start_date, $end_date, $total_price);

        try {
            Mail::to($email)->send($rentMail);
            return response()->json(['message' => 'E-mail envoyé avec succès !'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erreur lors de l\'envoi de l\'e-mail : ' . $e->getMessage()], 500);
        }
    }
}