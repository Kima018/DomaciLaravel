<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DomaciForecasts extends Model
{
    protected $table = 'domaci_forecasts';
    protected $fillable = [
        'citi_id',
        'temperature',
        'date',
    ];
}
