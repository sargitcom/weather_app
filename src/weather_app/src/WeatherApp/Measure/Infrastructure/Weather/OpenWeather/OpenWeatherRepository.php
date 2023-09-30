<?php

namespace App\WeatherApp\Measure\Infrastructure\Weather\OpenWeather;

use App\WeatherApp\Measure\Domain\ConcreteMeasure;
use App\WeatherApp\Measure\Domain\Location;
use App\WeatherApp\Measure\Domain\Measure\Temperature;
use App\WeatherApp\Measure\Domain\NoMeasure;
use App\WeatherApp\Measure\Domain\WeatherInterface;
use DateTime;
use GuzzleHttp\Psr7\Request;
use MeasureInterface;


class OpenWeatherRepository implements WeatherInterface
{
    public function __construct(private string $apiKey) {}

    public function getWeatherByLocation(Location $location) : MeasureInterface
    {
        $request = new Request(
            'GET', 
            'https://api.openweathermap.org/data/2.5/weather?q=' .
            $location->getLocation() .
            '&appid=' . 
            $this->apiKey,
            []
        );
    }

}
