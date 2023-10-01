<?php

namespace App\WeatherApp\Application\StoreWeather;

use App\WeatherApp\Measure\Domain\MeasureRepository;
use Throwable;

class StoreWeather
{
    public function __construct(
        private MeasureRepository $measure
    ) {}

    public function storeWeather(StoreWeatherRequest $weather) : bool
    {
        try {
            $this->measure->storeMeasure($weather->getConcreteWeather());
            return true;
        } catch (Throwable) {
            return false;
        }
    }
}
