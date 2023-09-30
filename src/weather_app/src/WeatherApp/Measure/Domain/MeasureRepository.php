<?php

namespace App\WeatherApp\Measure\Domain;

use MeasureInterface;

interface MeasureRepository
{
    public function storeMeasure(ConcreteMeasure $measure) : void;
}
