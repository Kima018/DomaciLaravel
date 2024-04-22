<?php

namespace Database\Seeders;

use App\Models\DomaciCities;
use App\Models\DomaciWeather;
use Illuminate\Database\Seeder;

class DomaciWeatherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $cities = DomaciCities::all();
        foreach ($cities as $city) {
            DomaciWeather::create([
                'city_id' => $city->id,
                'curr_temp' => rand(5, 27),
            ]);
        }
    }
}
