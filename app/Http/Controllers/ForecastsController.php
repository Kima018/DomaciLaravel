<?php

namespace App\Http\Controllers;

use App\Models\DomaciCities;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ForecastsController extends Controller
{
    public function search(Request $request)
    {
        $cityName = $request->get('city');
        $cities = DomaciCities::with('todaysForecast')
            ->where("name", "LIKE", "%$cityName%")->get();

        $userFavourites = [];
        if (Auth::check()) {
            $userFavourites = Auth::user()->cityFavourites;
            $userFavourites = $userFavourites->pluck('city_id')->toArray();
        }

        return view('search_results', compact('cities','userFavourites'));
    }

    public function citiesForecast(DomaciCities $city): View
    {
        return view('cities-forecast', compact('city'));
    }
}
