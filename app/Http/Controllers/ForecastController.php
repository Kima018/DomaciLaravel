<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Forecast;
use Illuminate\Http\Request;

class ForecastController extends Controller
{

    public function addForecast()
    {
        return view('admin.addForecast');
    }

    public function saveForecast(Request $request )
    {


        $request->validate([
           "city_id"=>"required",
            "curr_temp" => "required|int",
        ]);

        Forecast::create([
            "city"=>$request->get("city_id"),
            "currTemp"=>$request->get("curr_temp"),

        ]);

        return redirect("/");
    }
}
