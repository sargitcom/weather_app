<?php

namespace App\WeatherApp\Measure\Infrastructure\Weather\AnotherWeather;

use App\WeatherApp\Measure\Domain\ConcreteMeasure;
use App\WeatherApp\Measure\Domain\Location;
use App\WeatherApp\Measure\Domain\Measure\Temperature;
use App\WeatherApp\Measure\Domain\NoMeasure;
use App\WeatherApp\Measure\Domain\WeatherInterface;
use DateTime;
use GuzzleHttp\Psr7\Request;
use MeasureInterface;


class AnotherWeatherRepository implements WeatherInterface
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

        echo '<pre>';
        var_dump($request->getBody());
        echo '</pre>';
        die('test');
    
        //$temperature = Temperature::create();
        //$time = new DateTime;
        
        //return new ConcreteMeasure($temperature, $location, $time);
    }
}
