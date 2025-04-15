<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VehiculeEquipment extends Model
{
    protected $table = 'vehicule_equipment';

    protected $fillable = ['vehicule_id', 'equipment_id'];

    public function vehicule()
    {
        return $this->belongsTo(Vehicule::class);
    }

    public function equipment()
    {
        return $this->belongsTo(Equipment::class);
    }
}