<?php

namespace App\WeatherApp\Application\StoreWeather;

use App\WeatherApp\Measure\Domain\Measure;
use App\WeatherApp\Measure\Domain\MeasureRepository;
use App\WeatherApp\Measure\Domain\WeatherInterface;

class StoreWeather
{
    private WeatherInterface $weather;
    private MeasureRepository $measure;

    private function __construct(WeatherInterface $weather, MeasureRepository $measure)
    {
        $this->weather = $weather;
        $this->measure = $measure;
    }

    public function storeWeather(Measure $measure) : 
    {

    }
}