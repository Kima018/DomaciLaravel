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
        Schema::create('domaci_forecasts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('city_id');
            $table->float('temperature');
            $table->date('date')->format('d-m-Y');
            $table->timestamps();

            $table->foreign('city_id')->references('id')->on('domaci_cities')->onDelete('CASCADE');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('domaci_forecasts');
    }
};
