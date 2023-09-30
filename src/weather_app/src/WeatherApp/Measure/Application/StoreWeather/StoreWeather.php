<?php

namespace App\WeatherApp\Application\StoreWeather;

use App\WeatherApp\Application\StoreWeather\Exception\ErrorDuringSaveException;
use App\WeatherApp\Measure\Domain\MeasureRepository;
use Exception;

class StoreWeather
{
    public function __construct(
        private MeasureRepository $measure
    ) {}

    public function storeWeather(StoreWeatherRequset $weather) : StoreWeatherResponse
    {
        try {
            $this->measure->storeMeasure($weather->getConcreteWeather());
            return StoreWeatherResponse::getBuilder()
                ->build();
        } catch (Exception) {
            return StoreWeatherResponse::getBuilder()
                ->setIsError(true)
                ->setException(new ErrorDuringSaveException())
                ->build();
        }
    }
}
