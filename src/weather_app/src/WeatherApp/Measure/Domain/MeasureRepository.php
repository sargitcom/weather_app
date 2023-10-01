<?php

namespace App\WeatherApp\Measure\Domain;

use App\WeatherApp\Measure\Domain\Measure\ConcreteMeasure;

interface MeasureRepository
{
    public function storeMeasure(ConcreteMeasure $measure) : void;
}
