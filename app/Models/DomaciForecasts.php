<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DomaciForecasts extends Model
{
    protected $table = 'domaci_forecasts';
    protected $fillable = [
        'city_id',
        'temperature',
        'date',
        'weather_type',
        'probability',
    ];

    const WEATHERS = ["rainy","sunny","snowy","cloudy"];
}
