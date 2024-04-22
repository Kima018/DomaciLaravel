<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Forecast extends Model
{
    protected $table = 'forcast';
    protected $fillable = [
        "city",
        "currTemp",
    ];
}
