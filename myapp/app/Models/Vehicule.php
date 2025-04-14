<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicule extends Model
{
    protected $table = 'vehicule';

    protected $fillable = ['id', 'brand', 'vehicule_type_id', 'price_per_day', 'fuel_type', 'air_conditionning', 'transmission'];

    public function vehiculeType()
    {
        return $this->belongsTo(VehiculeType::class);
    }
}
