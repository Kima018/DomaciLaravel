<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class City extends Model
{
    protected $table = 'cities';
    protected $fillable = [
        "name",
        "curr_temp",
    ];
}