<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DomaciWeather extends Model
{
    protected $table = 'domaci_weather';
    protected $fillable = [
        'city_id',
        'curr_temp'
    ];
}
