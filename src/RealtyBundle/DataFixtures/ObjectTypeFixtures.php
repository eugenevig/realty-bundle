<?php

namespace App\RealtyBundle\DataFixtures;

use App\RealtyBundle\Entity\ObjectType;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ObjectTypeFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $objecttype = new ObjectType();
        $objecttype->setName("Apartment");
        $manager->persist($objecttype);

        $objecttype = new ObjectType();
        $objecttype->setName("House");
        $manager->persist($objecttype);

        $objecttype = new ObjectType();
        $objecttype->setName("Parking");
        $manager->persist($objecttype);

        $objecttype = new ObjectType();
        $objecttype->setName("Pantry");
        $manager->persist($objecttype);

        $objecttype = new ObjectType();
        $objecttype->setName("Commercial Plot");
        $manager->persist($objecttype);

        $manager->flush();
    }
}
