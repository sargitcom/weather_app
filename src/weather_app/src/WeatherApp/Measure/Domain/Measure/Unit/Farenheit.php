<?php

namespace App\WeatherApp\Measure\Domain\Measure\Unit;

use App\WeatherApp\Measure\Domain\Measure\Unit;

class Farenheit extends Unit
{
    public const MIN_TEMPERATURE = -250;
    public const MAX_TEMPERATURE = 0;

    public function getUnit() : string
    {
        return '°F';
    }

    public function getMinTemperature() : float
    {
        return self::MIN_TEMPERATURE;
    }

    public function getMaxTemperature() : float
    {
        return self::MAX_TEMPERATURE;
    }
}
