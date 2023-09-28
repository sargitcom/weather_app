<?php

use App\WeatherApp\Measure\Domain\MeasureRepository;

class DoctrineMeasureRepository implements MeasureRepository
{
    

    public function getMeasureByLocation(Location $location) : Measure
    {
        
    }
}