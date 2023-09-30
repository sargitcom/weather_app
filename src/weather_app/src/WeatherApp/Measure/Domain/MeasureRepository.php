<?php

namespace App\WeatherApp\Measure\Domain;

interface MeasureRepository
{
    public function getMeasureByLocation(Location $location) : Measure;
    public function storeMeasure(Measure $measure) : void;
}