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
        $vehicule_type = $request->input('vehicule_type');
        $fuel_type = $request->input('fuel_type');
        $transmission = $request->input('transmission');

        $query = Vehicule::query();

        if ($vehicule_type !== 'all') {
            $query->where('vehicule_type_id', $vehicule_type);
        }

        if ($fuel_type !== 'all') {
            $query->where('fuel_type', $fuel_type);
        }

        if ($transmission !== 'all') {
            $query->where('transmission', $transmission);
        }

        $data = $query->get();

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