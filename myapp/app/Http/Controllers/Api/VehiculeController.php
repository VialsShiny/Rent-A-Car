<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Vehicule;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class VehiculeController extends Controller
{
    public function all(Request $request): JsonResponse
    {
        $res = Vehicule::all()->toArray();
        return response()->json(['data' => $res]);
    }
}