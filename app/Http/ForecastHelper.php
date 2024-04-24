<?php

namespace App\Http;

class ForecastHelper
{
    const WEATHER_ICONS = [
        'rainy' => "fa-solid fa-cloud-rain",
        'snowy' => "fa-regular fa-snowflake",
        'sunny' => "fa-solid fa-sun",
        'cloudy'=>"fa-solid fa-cloud"
    ];

    public static function getColorByTemperature($temperature)
    {
        if ($temperature <= 0) return "text-blue-300";
        if ($temperature <= 15) return "text-blue-500";
        if ($temperature <= 25) return "text-green-500";
        return "text-red-700";
    }

    public static function getIconByWeatherType($type)
    {
        return self::WEATHER_ICONS[$type];
    }

}
