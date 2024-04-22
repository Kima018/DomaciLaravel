<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WeatherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $forecast = [
            'Backa_Palanka'=>24,
            'Sremska_Mitrovica'=>18,
        ];

        foreach ($forecast as $city => $currTemp){
            City::create([
               'name'=>$city,
               'curr_temp'=>$currTemp,
            ]);
        }
    }
}
