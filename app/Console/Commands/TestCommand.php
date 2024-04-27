<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class TestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:test-command {city}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test Command to call api';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        $response = Http::get(env('WEATHER_API_URL'), [
            'key' => env('API_KEY'),
            'q' => $this->argument('city'),
            'days'=> 3
            ,
            'aqi' => 'no',
            'alerts'=> 'yes',
            'lang'=>'sr',
        ]);

        $jsonResponse = $response->json();

        if (isset($jsonResponse['error'])) {
            $this->output->error('Ovaj Grad ne postoji');
        }
        dd($jsonResponse);
    }
}
