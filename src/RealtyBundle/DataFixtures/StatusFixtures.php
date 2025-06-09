<?php

namespace App\RealtyBundle\DataFixtures;

use App\RealtyBundle\Entity\Status;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class StatusFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $status = new Status();
        $status->setName("Available");
        $manager->persist($status);

        $status = new Status();
        $status->setName("Reserved");
        $manager->persist($status);

        $status = new Status();
        $status->setName("Sold");
        $manager->persist($status);

        $manager->flush();
    }
}
