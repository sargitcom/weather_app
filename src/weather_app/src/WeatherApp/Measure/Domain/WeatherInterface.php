<?php

namespace App\WeatherApp\Measure\Domain;

interface WeatherInterface
{
    public function getWeatherByLocation(Location $location) : Measure;
}
