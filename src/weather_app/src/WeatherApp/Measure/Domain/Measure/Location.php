<?php

namespace App\WeatherApp\Measure\Domain;

use App\WeatherApp\Measure\Domain\Measure\LocationEmptyException;
use App\WeatherApp\Measure\Domain\Measure\LocationTooLongException;

class Location
{
    public const MAX_LOCATION_LENGTH = 300;

    private string $location;

    private function __construct(string $location)
    {
        $this->assertIsNotEmptyLocation($location);
        $this->assertNotTooLongLocation($location);
        $this->setLocation($location);
    }

    public static function create(string $location) : self
    {
        return new self($location);
    }

    protected function assertIsNotEmptyLocation(string $location) : void
    {
        if ($location !== "") {
            return;
        }

        throw new LocationEmptyException();
    }

    protected function assertNotTooLongLocation(string $location) : void
    {
        if (mb_strlen($location) <= self::MAX_LOCATION_LENGTH) {
            return;
        }

        throw new LocationTooLongException($location);
    }

    protected function setLocation(string $location) : void
    {
        $this->location = $location;
    }

    public function getLocation() : string
    {
        return $this->location;
    }
}
