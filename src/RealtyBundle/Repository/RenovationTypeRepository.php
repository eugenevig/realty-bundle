<?php

namespace App\RealtyBundle\Repository;

use App\RealtyBundle\Entity\RenovationType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class RenovationTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RenovationType::class);
    }
}
