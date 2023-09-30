<?php

namespace App\WeatherApp\Measure\Domain;

use MeasureInterface;

class NoMeasure implements MeasureInterface
{
    public static function create() : self
    {
        return new self();
    }

    public function isNullObject(): bool
    {
        return true;
    }

    public function getTemperature() : float
    {
        throw new NoMeasureException();
    }

    public function getTemperatureUnit() : string
    {
        throw new NoMeasureException();
    }

    public function getLocation() : string
    {
        throw new NoMeasureException();
    }

    public function getTime() : string
    {
        throw new NoMeasureException();
    }
}