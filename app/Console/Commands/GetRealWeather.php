<?php

namespace App\Console\Commands;

use App\Models\DomaciCities;
use App\Models\DomaciForecasts;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class GetRealWeather extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:get-real-weather {city}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $response = Http::get(env('WEATHER_API_URL'), [
            'key' => env('API_KEY'),
            'q' => $this->argument('city'),
            'days' => 3,
        ]);

        $jsonResponse = $response->json();

        if (isset($jsonResponse['error'])) {
            $this->output->error($jsonResponse['error']['message']);
            return $jsonResponse['error']['message'];
        }

        $cityName = $jsonResponse['location']['name'];

        $dbCity = DomaciCities::where(['name' => $cityName])->first();

        if ($dbCity == null) {
            $dbCity = DomaciCities::create([
                'name' => $cityName,
            ]);
        }

        if ($dbCity->todaysForecast !== null) {
            return $this->output->comment('Prognoza vec Postoji');
        }

        for ($i = 0; $i < 3; $i++) {
            $temperature = $jsonResponse['forecast']['forecastday'][$i]['day']['avgtemp_c'];

            $date = $jsonResponse['forecast']['forecastday'][$i]['date'];

            if ($jsonResponse['forecast']['forecastday'][$i]['day']['daily_will_it_rain']) {
                $weather_type = 'rainy';
            } elseif ($jsonResponse['forecast']['forecastday'][$i]['day']['daily_will_it_snow']) {
                $weather_type = 'snowy';
            } else {
                $weather_type = 'sunny';
            }

            $probability = $jsonResponse['forecast']['forecastday'][$i]['day']['daily_chance_of_rain'];
            $forecast = [
                'city_id' => $dbCity->id,
                'temperature' => $temperature,
                'date' => $date,
                'weather_type' => $weather_type,
                'probability' => $probability,
            ];

            DomaciForecasts::create($forecast);
        }




        return $this->output->comment('Prognoza je uspesno dodata');
    }
}
