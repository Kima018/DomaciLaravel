<?php

namespace App\Http\Controllers;

use App\Models\UserCities;
use Illuminate\Support\Facades\Auth;

class UserCitiesController extends Controller
{
    public function favourite($city)
    {
        if (Auth::user() === null) {
            return redirect()->back()->with('error', 'Morate biti ulogovani!');
        }

        UserCities::create([
            'user_id' => Auth::user()->id,
            'city_id' => $city,
        ]);
        return redirect()->back();
    }

    public function unFavorite($city)
    {
        if (Auth::user() === null) {
            return redirect()->back();
        }
        UserCities::where(['user_id' => Auth::user()->id])->where(['city_id' => $city])->delete();
        return redirect()->back();
    }
}
