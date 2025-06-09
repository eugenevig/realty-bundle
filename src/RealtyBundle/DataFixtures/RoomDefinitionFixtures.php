<?php

namespace App\RealtyBundle\DataFixtures;

use App\RealtyBundle\Entity\RoomDefinition;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class RoomDefinitionFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $roomdefinition = new RoomDefinition();
        $roomdefinition->setName("Living Room");
        $manager->persist($roomdefinition);

        $roomdefinition = new RoomDefinition();
        $roomdefinition->setName("Kitchen");
        $manager->persist($roomdefinition);

        $roomdefinition = new RoomDefinition();
        $roomdefinition->setName("Bathroom");
        $manager->persist($roomdefinition);

        $roomdefinition = new RoomDefinition();
        $roomdefinition->setName("Bedroom");
        $manager->persist($roomdefinition);

        $roomdefinition = new RoomDefinition();
        $roomdefinition->setName("Hallway");
        $manager->persist($roomdefinition);

        $manager->flush();
    }
}
