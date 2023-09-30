<?php

use App\WeatherApp\Measure\Domain\Location;
use App\WeatherApp\Measure\Domain\Measure;
use App\WeatherApp\Measure\Domain\Measure\CantSaveItemInCacheException;
use App\WeatherApp\Measure\Domain\Measure\Temperature;
use App\WeatherApp\Measure\Domain\Measure\UnitFactory;
use App\WeatherApp\Measure\Domain\NoMeasure;
use App\WeatherApp\Measure\Infrastructure\Symfony\Measure\WeatherCache;
use Psr\Cache\CacheItemPoolInterface;

class RedisWeatherCache implements WeatherCache
{
    public function __construct(private CacheItemPoolInterface $weatherRedisCache)
    {
        
    }

    public function storeMeasure(Measure $measure) : void
    {
        $weather = $this->weatherRedisCache->getItem($measure->getLocation());

        $data = json_encode([
            'temperatureUnit' => $measure->getTemperatureUnit(),
            'temperature' => $measure->getTemperature(),
            'datetime' => $measure->getTime(),
        ]);

        $weather->set($data);

        if ($this->weatherRedisCache->save($weather) === false) {
            throw new CantSaveItemInCacheException();
        }
    }

    public function getMeasure(Location $location) : MeasureInterface
    {
        $item = $this->weatherRedisCache->getItem($location->getLocation())->get();
    
        if ($item->get() === null) {
            NoMeasure::create();
        }

        $data = json_decode($item->get());

        $temperatureUnit = UnitFactory::getByHandle($data['temperatureUnit']);
        $temperature = Temperature::create($data['temperature'], $temperatureUnit);
        $time = DateTime::createFromFormat('Y-m-d H:i:s', $data['datetime']);

        return new Measure($temperature, $location, $time);
    }
}
