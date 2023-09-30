<?php

namespace App\WeatherApp\Measure\Infrastructure\Symfony\Measure;

use App\WeatherApp\Measure\Domain\Location;
use App\WeatherApp\Measure\Domain\Measure;
use MeasureInterface;

interface WeatherCache
{
    public function storeMeasure(Measure $measure) : void;
    public function getMeasure(Location $location) : MeasureInterface;
}
