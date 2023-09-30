<?php

namespace App\WeatherApp\Measure\Infrastructure\Symfony\Measure\Doctrine;

use App\WeatherApp\Measure\Domain\ConcreteMeasure;
use App\WeatherApp\Measure\Domain\Measure;
use App\WeatherApp\Measure\Domain\MeasureRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class DoctrineMeasureRepository extends ServiceEntityRepository implements MeasureRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Measure::class);
    }

    public function storeMeasure(ConcreteMeasure $measure) : void
    {
        $this->_em->persist($measure);
        $this->_em->flush();
    }
}
