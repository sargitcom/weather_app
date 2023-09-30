<?php

namespace App\WeatherApp\Domain;

use App\WeatherApp\Measure\Infrastructure\Symfony\Measure\WeatherCache;
use App\WeatherApp\Measure\Infrastructure\Weather\AnotherWeather\AnotherWeatherRepository;
use App\WeatherApp\Measure\Infrastructure\Weather\OpenWeather\OpenWeatherRepository;
use App\WeatherApp\Measure\Infrastructure\Weather\WeatherClientsCollection;

class GetWeatherServiceFactory
{
    public static function createWeatherService(
        WeatherCache $weatherCache,
        OpenWeatherRepository $openWeatherRepository,
        AnotherWeatherRepository $anotherWeatherRepostiry,
    ) : GetWeatherService {
        $weatherClients = new WeatherClientsCollection();
        $weatherClients->append($openWeatherRepository);
        $weatherClients->append($anotherWeatherRepostiry);

        return new GetWeatherService($weatherClients, $weatherCache);
    }
}
