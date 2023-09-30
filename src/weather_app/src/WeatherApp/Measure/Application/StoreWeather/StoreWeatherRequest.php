<?php

namespace App\WeatherApp\Application\StoreWeather;

use App\WeatherApp\Measure\Domain\ConcreteMeasure;
use App\WeatherApp\Measure\Domain\Location;
use App\WeatherApp\Measure\Domain\Measure\Temperature;
use App\WeatherApp\Measure\Domain\Measure\UnitFactory;
use DateTime;

class StoreWeatherRequset
{
    private function __construct(
        private string $location,
        private float $temperature,
        private string $temperatureUnit
    ) {}

    public function getConcreteWeather() : ConcreteMeasure
    {
        $concreteTemperature = new Temperature($this->temperature, UnitFactory::getByHandle($this->temperatureUnit));
        $concreteLocation = Location::create($this->location);

        return new ConcreteMeasure($concreteTemperature, $concreteLocation, new DateTime());
    }
}