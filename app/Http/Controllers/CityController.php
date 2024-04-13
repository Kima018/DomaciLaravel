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

    public function editCity(City $city)
    {
        return view('admin.editCity', compact('city'));
    }

    public function saveCity(Request $request)
    {
        $request->validate([
            "city_name" => "required|string",
            "curr_temp" => "required",
        ]);

        City::create([
            "name" => $request->get('city_name'),
            "curr_temp" => $request->get('curr_temp')
        ]);

        return redirect('/');

    }

    public function delete(Request $request , City $city)
    {
        $city->delete();
        return redirect('/');
    }
}
