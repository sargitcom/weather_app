<?php

use App\WeatherApp\Measure\Domain\Location;
use App\WeatherApp\Measure\Domain\Measure;
use App\WeatherApp\Measure\Domain\MeasureRepository;
use App\WeatherApp\Measure\Infrastructure\Symfony\Measure\Cache;

class DoctrineMeasureRepository implements MeasureRepository
{
    public function getMeasureByLocation(Location $location) : Measure
    {
    }

    public function storeMeasure(Measure $measure) : void
    {

    }
}