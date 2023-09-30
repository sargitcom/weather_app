<?php

namespace App\WeatherApp\Domain;

use App\WeatherApp\Measure\Domain\ConcreteMeasure;
use App\WeatherApp\Measure\Domain\Location;
use App\WeatherApp\Measure\Domain\Measure\Temperature;
use App\WeatherApp\Measure\Domain\Measure\UnitFactory;
use App\WeatherApp\Measure\Infrastructure\Symfony\Measure\WeatherCache;
use App\WeatherApp\Measure\Infrastructure\Weather\WeatherClientsCollection;
use DateTime;
use MeasureInterface;

class GetWeatherService
{
    public function __construct(
        private WeatherClientsCollection $weatherClients,
        private WeatherCache $weatherCache,
    ) {}

    public function getWeatherByLocation(Location $location) : MeasureInterface
    {
        $measure = $this->weatherCache->getMeasure($location);

        if ($measure->isNullObject()) {
            $measure = $this->getNewWatherByLocation($location);
            $this->weatherCache->storeMeasure($measure);
            return $measure;
        }

        $measureTime = $measure->getTime();

        $startDatetime = new DateTime(); 
        $diff = $startDatetime->diff(new DateTime($measureTime)); 

        if ($diff->s >= 3600) { // this time should be controlled by yml config - for simplicity left hard coded time
            $measure = $this->getNewWatherByLocation($location);
            $this->weatherCache->storeMeasure($measure);
        }

        return $measure;
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
