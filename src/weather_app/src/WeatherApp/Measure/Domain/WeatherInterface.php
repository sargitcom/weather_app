<?php

namespace App\WeatherApp\Measure\Domain;

use MeasureInterface;

interface WeatherInterface
{
    public function getWeatherByLocation(Location $location) : MeasureInterface;
}
