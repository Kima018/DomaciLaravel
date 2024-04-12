<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function addCity()
    {
        return view('admin.addCity');
    }

    public function saveCity(Request $request)
    {
        $request->validate([
            "city_name"=>"required|string",
        ]);

        City::create([
            "city" => $request->get('city_name'),
        ]);

        return redirect('/');

    }
}
