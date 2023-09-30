<?php

namespace App\WeatherApp\Measure\Domain\Measure\Unit;

use App\WeatherApp\Measure\Domain\Measure\Unit;

class Celsius extends Unit
{
    public const MIN_TEMPERATURE = -150;
    public const MAX_TEMPERATURE = 100;

    public function getUnit() : string
    {
        return 'C';
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
