<?php

namespace Database\Seeders;

use App\Models\DomaciCities;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DomaciCitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();
        $amount = 100;

        for ($i = 0; $i < $amount; $i++) {
            DomaciCities::create([
                'name' => $faker->city,
            ]);

        }

    }
}
