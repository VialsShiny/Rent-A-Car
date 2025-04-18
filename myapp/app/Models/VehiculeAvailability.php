<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VehiculeAvailability extends Model
{
    public $timestamps = false; 
    protected $table = 'vehicule_availability';
    protected $fillable = ['vehicule_id', 'start_date', 'end_date', 'is_available'];
}
