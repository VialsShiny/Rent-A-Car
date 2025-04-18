<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VehiculeType extends Model
{
    protected $table = 'vehicule_type';

    protected $fillable = ['id', 'name'];

    public function vehicules()
    {
        return $this->hasMany(Vehicule::class);
    }
}
