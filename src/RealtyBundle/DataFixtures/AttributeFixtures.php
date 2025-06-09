<?php

namespace App\RealtyBundle\DataFixtures;

use App\RealtyBundle\Entity\Attribute;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AttributeFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $attr = new Attribute();
        $attr->setName("Balcony");
        $attr->setInputType("checkbox");
        $attr->setIsFilterable(true);
        $attr->setSortOrder(1);
        $manager->persist($attr);

        $attr = new Attribute();
        $attr->setName("Fireplace");
        $attr->setInputType("checkbox");
        $attr->setIsFilterable(true);
        $attr->setSortOrder(2);
        $manager->persist($attr);

        $manager->flush();
    }
}
