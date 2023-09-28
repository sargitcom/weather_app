<?php

namespace App\WeatherApp\Measure\Domain;

class Location
{
    public const MAX_LOCATION_LENGTH = 300;

    private string $location;

    private function __construct(string $location)
    {
        $this->assertIsNotEmptyLocation($location);
        $this->assertNotTooLongLocation($location);
    }

    protected function assertIsNotEmptyLocation($location) : void
    {

    }

    protected function assertNotTooLongLocation($location) : void
    {

    }
}