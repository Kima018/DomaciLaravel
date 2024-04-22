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
        $cityName = $this->command->getOutput()->ask('Unesite ime grada:');

        if ($cityName === null) {
            $this->command->getOutput()->error('Niste uneli ime grada');
        }

        if (City::where('name',$cityName)->exists()){
            $this->command->getOutput()->error('Grad je vec unet u tabelu');
        }

        $currTemp = $this->command->getOutput()->ask("Unesite trenutnu temperaturu za grad $cityName:");

        if ($currTemp === null){
            $this->command->getOutput()->error('Niste uneliu temperaturu');
        }

        City::create([
           'name' => $cityName,
            'curr_temp'=>$currTemp,
        ]);
        echo 'Uspesno ste uneli grad u tabelu';

    }
}
