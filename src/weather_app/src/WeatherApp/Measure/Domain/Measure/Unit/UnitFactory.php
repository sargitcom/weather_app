<?php

namespace App\WeatherApp\Measure\Domain\Measure;

use App\WeatherApp\Measure\Domain\Measure\Unit as MeasureUnit;
use App\WeatherApp\Measure\Domain\Measure\Unit\Celsius;
use App\WeatherApp\Measure\Domain\Measure\Unit\Farenheit;

/**
 * comment of an author - chain of responsibility could be in use here with autowiring required unit
 * for simplicity it's left as simple factory that return objects
 */

class UnitFactory
{
    public static function getByHandle(string $handle) : Unit
    {
        switch($handle)
        {
            case 'F':
                return new Farenheit;

            case 'C':
                return new Celsius;

            default:
                throw new UnknownTemperatureUnitException($handle);
        }
    }
}
