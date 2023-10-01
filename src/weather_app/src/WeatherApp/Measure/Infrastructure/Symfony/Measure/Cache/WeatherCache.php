<?php

namespace App\WeatherApp\Measure\Infrastructure\Symfony\Measure;

use App\WeatherApp\Measure\Domain\Measure\ConcreteMeasure;
use App\WeatherApp\Measure\Domain\Measure\Location;
use MeasureInterface;

interface WeatherCache
{
    public function storeMeasure(ConcreteMeasure $measure) : void;
    public function getMeasure(Location $location) : MeasureInterface;
}
