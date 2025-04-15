<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    protected $table = 'equipment';

    protected $fillable = ['id', 'name'];

    public function vehicules()
    {
        return $this->belongsToMany(Vehicule::class, 'vehicule_equipment', 'equipment_id', 'vehicule_id');
    }
}
