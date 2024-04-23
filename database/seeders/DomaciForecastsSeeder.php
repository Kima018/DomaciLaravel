<?php

namespace Database\Seeders;

use App\Models\DomaciCities;
use App\Models\DomaciForecasts;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DomaciForecastsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = DomaciCities::all();
        foreach ($cities as $city) {

            for ($i = 0; $i < 5; $i++) {
                $weatherType = DomaciForecasts::WEATHERS[rand(0, 2)];
                $probability = null;
                if ($weatherType == "rainy" || $weatherType == "snowy") $probability = rand(1, 100);
                DomaciForecasts::create([
                    'city_id' => $city->id,
                    'temperature' => rand(15, 30),
                    'date' => Carbon::now()->addDays(rand(1, 30)),
                    'weather_type' => $weatherType,
                    'probability' => $probability,
                ]);
            }

        }

    }

}

//$faker = Factory::create();
//$cities = DomaciCities::all();
//$this->command->getOutput()->progressStart();
//
//foreach ($cities as $city) {
//
//    for ($i = 0; $i < 5; $i++) {
//        DomaciForecasts::create([
//            'city_id' => $city->id,
//            'temperature' => $faker->numberBetween(5, 28),
//            'date' => $faker->dateTimeBetween('now', '+1 week')->format('Y-m-d'),
//        ]);
//        $this->command->getOutput()->progressAdvance();
//    }
//
//}
//
//$this->command->getOutput()->progressFinish();
