<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class DomaciCities extends Model
{
    protected $table = 'domaci_cities';
    protected $fillable = [
        'name',
    ];

    public function forecasts()
    {
        return $this->hasMany(DomaciForecasts::class, 'city_id', 'id')
            ->orderBy('date');
    }

    public function todaysForecast()
    {
        return $this->hasOne(DomaciForecasts::class, 'city_id', 'id')
            ->whereDate("date", Carbon::now());
    }
}
