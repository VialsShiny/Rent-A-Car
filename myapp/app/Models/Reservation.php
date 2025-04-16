<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $table = 'reservation';

    protected $fillable = ['email', 'vehicule_id', 'start_date', 'end_date', 'create_at', 'updated_at', 'status', 'total_price'];
}
