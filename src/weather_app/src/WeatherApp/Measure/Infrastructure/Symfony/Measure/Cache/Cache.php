<?php

use App\WeatherApp\Measure\Domain\Measure;

interface Cache
{
    public function storeMeasure() : void;
    public function getMeasure() : Measure;
}
