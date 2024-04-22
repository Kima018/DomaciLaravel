<?php

namespace Database\Seeders;

use App\Models\DomaciCities;
use App\Models\DomaciForecasts;
use Faker\Factory;
use Illuminate\Database\Seeder;

class DomaciForecastsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();
        $cities = DomaciCities::all();
        $this->command->getOutput()->progressStart();

        foreach ($cities as $city) {

            for ($i = 0; $i < 5; $i++) {
                DomaciForecasts::create([
                    'city_id' => $city->id,
                    'temperature' => $faker->numberBetween(5, 28),
                    'date' => $faker->dateTimeBetween('now', '+1 week')->format('Y-m-d'),
                ]);
                $this->command->getOutput()->progressAdvance();
            }

        }

        $this->command->getOutput()->progressFinish();

    }

}
