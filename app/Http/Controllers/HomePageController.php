<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\DomaciWeather;

class HomePageController extends Controller
{
    public function index()
    {
        $forecast = DomaciWeather::all();
        return view('admin.homePage', compact('forecast'));
    }
}
