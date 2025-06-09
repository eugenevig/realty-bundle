<?php

namespace App\RealtyBundle\DataFixtures;

use App\RealtyBundle\Entity\RenovationType;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class RenovationTypeFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $renovationtype = new RenovationType();
        $renovationtype->setName("Unrenovated");
        $manager->persist($renovationtype);

        $renovationtype = new RenovationType();
        $renovationtype->setName("Partially Renovated");
        $manager->persist($renovationtype);

        $renovationtype = new RenovationType();
        $renovationtype->setName("Fully Renovated");
        $manager->persist($renovationtype);

        $renovationtype = new RenovationType();
        $renovationtype->setName("Designer Renovated");
        $manager->persist($renovationtype);

        $manager->flush();
    }
}
