<?php

namespace App\WeatherApp\Measure\Domain;

use App\WeatherApp\Measure\Domain\Measure\Location;
use MeasureInterface;

interface WeatherInterface
{
    public function getWeatherByLocation(Location $location) : MeasureInterface;
}
