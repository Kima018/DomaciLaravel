<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DomaciCities extends Model
{
    protected $table = 'domaci_cities';
    protected $fillable = [
        'name',
    ];

    public function forecasts()
    {
        return $this->hasMany(DomaciForecasts::class,'city_id','id')
            ->orderBy('date');
    }
}
