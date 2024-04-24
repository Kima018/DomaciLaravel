<?php

namespace Database\Seeders;

use App\Models\DomaciCities;
use App\Models\DomaciForecasts;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DomaciForecastsSeeder extends Seeder
{
    /**
     * const WEATHERS = ["rainy","sunny","snowy","cloudy"];
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = DomaciCities::all();
        foreach ($cities as $city) {

            $previousTemperature = null;

            for ($i = 0; $i < 5; $i++) {
                $weatherType = DomaciForecasts::WEATHERS[rand(0, 3)];

                if ($previousTemperature) {
                    $temperature = rand($previousTemperature - 5, $previousTemperature + 5);
                } else {
                    $temperature = rand(-30, 30);

                    if ($weatherType == "snowy") {
                        $temperature = $previousTemperature !== null ? rand($previousTemperature - 5, $previousTemperature + 5) : rand(-30, 1);
                    } elseif ($weatherType == "cloudy") {
                        $temperature = $previousTemperature !== null ? rand($previousTemperature - 5, $previousTemperature + 5) : rand(-30, 15);
                    }
                }

                $probability = null;
                if ($weatherType == "rainy" || $weatherType == "snowy") $probability = rand(1, 100);

                DomaciForecasts::create([
                    'city_id' => $city->id,
                    'temperature' => $temperature,
                    'date' => Carbon::now()->addDays(+$i),
                    'weather_type' => $weatherType,
                    'probability' => $probability,
                ]);
                $previousTemperature = $temperature;
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
