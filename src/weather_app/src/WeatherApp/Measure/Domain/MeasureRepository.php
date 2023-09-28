<?php

namespace App\WeatherApp\Measure\Domain;

interface MeasureRepository
{
    public function storeMeasure(Measure $measure) : void;
}