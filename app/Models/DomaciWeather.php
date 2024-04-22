<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DomaciWeather extends Model
{
    protected $table = 'domaci_weather';
    protected $fillable = [
        'city_id',
        'curr_temp'
    ];


    public function city()
    {
        return $this->hasOne(DomaciCities::class,'id','city_id');
    }
}
