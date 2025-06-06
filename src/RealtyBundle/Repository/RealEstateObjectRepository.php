<?php

namespace App\RealtyBundle\Repository;

use App\RealtyBundle\Entity\RealEstateObject;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class RealEstateObjectRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RealEstateObject::class);
    }
}
