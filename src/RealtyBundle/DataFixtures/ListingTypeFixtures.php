<?php

namespace App\RealtyBundle\DataFixtures;

use App\RealtyBundle\Entity\ListingType;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ListingTypeFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $listingtype = new ListingType();
        $listingtype->setName("Sale");
        $manager->persist($listingtype);

        $listingtype = new ListingType();
        $listingtype->setName("Rent");
        $manager->persist($listingtype);

        $listingtype = new ListingType();
        $listingtype->setName("Lease");
        $manager->persist($listingtype);

        $listingtype = new ListingType();
        $listingtype->setName("Auction");
        $manager->persist($listingtype);

        $manager->flush();
    }
}
