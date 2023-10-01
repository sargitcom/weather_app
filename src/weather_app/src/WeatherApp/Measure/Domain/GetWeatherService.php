<?php

namespace App\WeatherApp\Domain;

use App\WeatherApp\Measure\Domain\Measure\ConcreteMeasure;
use App\WeatherApp\Measure\Domain\Measure\Location;
use App\WeatherApp\Measure\Domain\Measure\Temperature;
use App\WeatherApp\Measure\Domain\Measure\UnitFactory;
use App\WeatherApp\Measure\Infrastructure\Weather\WeatherClientsCollection;
use DateTime;
use MeasureInterface;

class GetWeatherService
{
    public function __construct(
        private WeatherClientsCollection $weatherClients,
    ) {}

    public function getWeatherByLocation(Location $location) : MeasureInterface
    {
        return $this->getNewWatherByLocation($location);
    }

    protected function getNewWatherByLocation(Location $location) : ConcreteMeasure
    {
        $weatherClients = $this->weatherClients;
        $weatherClients->rewind();

        $newTemperature = 0;

        while ($weatherClients->valid()) {
            $client = $weatherClients->current();

            $measure = $client->getWeatherByLocation($location);

            $newTemperature += $measure->getTemperature();

            $weatherClients->next();
        }

        $newTemperature /= $weatherClients->getCount();

        $temperature = Temperature::create($newTemperature, UnitFactory::getByHandle('C'));

        return new ConcreteMeasure($temperature, $location, new DateTime());
    }
}
