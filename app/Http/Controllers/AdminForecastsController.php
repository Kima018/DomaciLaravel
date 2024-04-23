<?php

namespace App\Http\Controllers;

use App\Models\DomaciForecasts;
use Illuminate\Http\Request;

class AdminForecastsController extends Controller
{
    public function addForecast(Request $request)
    {
        $request->validate([
            'citi_id' => 'required|int',
            'temperature' => 'required|int',
            'weather_type' => 'required|string',
            'probability' => 'nullable|required_if:weather_type,rainy,snowy|int|max:100|min:1',
            'date'=>'required|date_format:Y-m-d',
        ]);

        DomaciForecasts::create([
            'city_id' => $request->get('citi_id'),
            'temperature' => $request->get('temperature'),
            'date' =>$request->get('date'),
            'weather_type' => $request->get('weather_type'),
            'probability' => $request->get('probability'),
        ]);

        return redirect()->back();
    }
}
