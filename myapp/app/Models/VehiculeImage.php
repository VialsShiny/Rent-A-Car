<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VehiculeImage extends Model
{
    protected $table = 'vehicule_photo';

    protected $fillable = ['id', 'vehicule_id', 'image_url', 'display_order', 'created_at', 'updated_at'];

    public function vehicule()
    {
        return $this->belongsTo(Vehicule::class);
    }
}
