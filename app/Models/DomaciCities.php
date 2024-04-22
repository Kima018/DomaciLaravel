<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DomaciCities extends Model
{
    protected $table = 'domaci_cities';
    protected $fillable = [
        'name',
    ];
}
