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
    protected $signature = 'app:test-command';

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
        $key = env('API_KEY');
        $response = Http::get("http://api.weatherapi.com/v1/current.json?key=$key&q=London&aqi=no");
        $jsonResponse = $response->json();
        dd($jsonResponse['current']['temp_c']);
    }
}
