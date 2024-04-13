<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Forecast;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index()
    {
        $cities = City::all();
        return view('homePage', compact('cities'));
    }
}
