<?php

namespace App\Http;

class ForecastHelper
{
    public static function getColorByTemperature($temperature)
    {
        if ($temperature <= 0) return "blue-300";
        if ($temperature <= 15) return "blue-500";
        if ($temperature <= 25) return "green-500";
        return "red-700";
    }
}
