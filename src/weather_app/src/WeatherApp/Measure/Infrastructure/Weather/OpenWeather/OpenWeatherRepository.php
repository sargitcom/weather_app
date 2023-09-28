<?php

namespace App\WeatherApp\Measure\Infrastructure\Weather\AnotherWeather;

use App\WeatherApp\Measure\Domain\Location;
use App\WeatherApp\Measure\Domain\Measure;
use App\WeatherApp\Measure\Domain\WeatherInterface;

class OpenWeatherRepostiry implements WeatherInterface
{
    public function getWeatherByLocation(Location $location) : Measure
    {
        return new Measure;
    }
}
