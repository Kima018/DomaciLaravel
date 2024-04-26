<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class DomaciCities extends Model
{
    protected $table = 'domaci_cities';
    protected $fillable = [
        'name',
    ];

    public function forecasts(): HasMany
    {
        return $this->hasMany(DomaciForecasts::class, 'city_id', 'id')
            ->orderBy('date');
    }

    public function todaysForecast(): HasOne
    {
        return $this->hasOne(DomaciForecasts::class, 'city_id', 'id')
            ->whereDate("date", Carbon::now());
    }
}
