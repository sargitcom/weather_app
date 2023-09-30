<?php

namespace App\WeatherApp\Application\GetWeather;

use App\WeatherApp\Domain\GetWeatherService;
use App\WeatherApp\Measure\Domain\Measure\UnitFactory;
use Exception;

class GetWeather
{
    public function __construct(private GetWeatherService $weatherService) {}

    public function getWeather(GetWeatherRequest $request) {
        try {
            $weather = $this->weatherService->getWeatherByLocation($request->getLocation());

            return new GetWeatherResponse(
                GetWeatherResponse::IS_NO_ERROR, 
                UnitFactory::getByHandle('C'), 
                $weather->getTemperature()
            );
        } catch (Exception $ex) {

            var_dump($ex->getMessage());
            die;

            return new GetWeatherResponse(GetWeatherResponse::IS_ERROR);
        }
    }
}
