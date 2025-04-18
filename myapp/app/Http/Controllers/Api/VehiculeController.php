<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Vehicule;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class VehiculeController extends Controller
{
    public function all(Request $request): JsonResponse
    {
        $request->validate([
            'vehicule_type' => 'nullable|string',
            'fuel_type' => 'nullable|string',
            'transmission' => 'nullable|string',
        ]);

        $vehicule_type = $request->input('vehicule_type');
        $fuel_type = $request->input('fuel_type');
        $transmission = $request->input('transmission');

        $query = Vehicule::with('vehiculeImage');

        if ($vehicule_type && $vehicule_type !== 'all') {
            $query->where('vehicule_type_id', $vehicule_type);
        }

        if ($fuel_type && $fuel_type !== 'all') {
            $query->where('fuel_type', $fuel_type);
        }

        if ($transmission && $transmission !== 'all') {
            $query->where('transmission', $transmission);
        }

        $data = $query->get();

        if ($data->isEmpty()) {
            return response()->json(['message' => 'Aucun véhicule trouvé.'], 404);
        }

        return response()->json($data);
    }

    public function getBrand(): JsonResponse
    {
        $brands = Vehicule::select('brand')->distinct()->pluck('brand');

        return response()->json([
            'message' => 'Toutes les marques ont été récupérées.',
            'brands' => $brands
        ]);
    }
}