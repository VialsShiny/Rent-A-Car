<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicule extends Model
{
    protected $table = 'vehicule';

    protected $fillable = ['id', 'brand', 'model', 'vehicule_type_id', 'price_per_day', 'fuel_type', 'air_conditioning', 'transmission'];

        public function vehiculeImage()
        {
            return $this->hasMany(VehiculeImage::class);
        }

    public function vehiculeType()
    {
        return $this->belongsTo(VehiculeType::class);
    }

    public function equipments()
    {
        return $this->belongsToMany(Equipment::class, 'vehicule_equipment', 'vehicule_id', 'equipment_id');
    }
}
