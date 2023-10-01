<?php

namespace App\WeatherApp\Application\GetWeather;

use App\WeatherApp\Measure\Domain\Measure\Location;

class GetWeatherRequest
{
    public function __construct(private string $location) {}

    public function getLocation() : Location
    {
        return Location::create($this->location);
    }
}
