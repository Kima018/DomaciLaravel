<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('domaci_weather', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('city_id');
            $table->float('curr_temp');
            $table->timestamps();

            $table->foreign('city_id')->references('id')->on('domaci_cities');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('weather');
    }
};
