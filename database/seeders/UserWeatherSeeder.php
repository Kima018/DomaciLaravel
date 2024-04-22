<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserWeatherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $city = $this->command->getOutput()->ask('Unesite grad:');
        if ($city === null) {
            $this->command->getOutput()->error('Niste uneli grad!');
        }
        $temperature = $this->command->getOutput()->ask('Unesite Temperaturu:', 'Temperatura nije uneta');
        if ($temperature === null) {
            $this->command->getOutput()->error('Niste uneli temperaturu!');
        }

        City::create([
            'name' => $city,
            'curr_temp' => $temperature,
        ]);
        echo 'Grad je unet';
    }
}
