<?php

namespace App\WeatherApp\Measure\Infrastructure\Weather\OpenWeather;

use App\WeatherApp\Measure\Domain\ConcreteMeasure;
use App\WeatherApp\Measure\Domain\Location;
use App\WeatherApp\Measure\Domain\Measure\Temperature;
use App\WeatherApp\Measure\Domain\Measure\UnitFactory;
use App\WeatherApp\Measure\Domain\NoMeasure;
use App\WeatherApp\Measure\Domain\WeatherInterface;
use DateTime;
use GuzzleHttp\Client;
use MeasureInterface;


class OpenWeatherRepository implements WeatherInterface
{
    public function __construct(private string $apiKey) {}

    public function getWeatherByLocation(Location $location) : MeasureInterface
    {
        $url = 'https://api.openweathermap.org/data/2.5/weather?q=' . $location->getLocation() . '&units=metric&appid=' .  $this->apiKey;

        $client = new Client();
        
        $response = $client->request('GET', $url);
        
        $body = $response->getBody();
        $data = json_decode($body);

        $temperature = $data->main->temp;

        return new ConcreteMeasure(
            Temperature::create($temperature, UnitFactory::getByHandle('C')),
            $location,
            new DateTime()
        );
    }

}
