<?php

namespace App\RealtyBundle\DataFixtures;

use App\RealtyBundle\Entity\Country;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CountryFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $country = new Country();
        $country->setName("United States");
        $country->setCode("US");
        $country->setPhoneCode("+1");
        $manager->persist($country);

        $country = new Country();
        $country->setName("Germany");
        $country->setCode("DE");
        $country->setPhoneCode("+49");
        $manager->persist($country);

        $country = new Country();
        $country->setName("France");
        $country->setCode("FR");
        $country->setPhoneCode("+33");
        $manager->persist($country);

        $country = new Country();
        $country->setName("Italy");
        $country->setCode("IT");
        $country->setPhoneCode("+39");
        $manager->persist($country);

        $country = new Country();
        $country->setName("Spain");
        $country->setCode("ES");
        $country->setPhoneCode("+34");
        $manager->persist($country);

        $country = new Country();
        $country->setName("United Kingdom");
        $country->setCode("GB");
        $country->setPhoneCode("+44");
        $manager->persist($country);

        $country = new Country();
        $country->setName("Canada");
        $country->setCode("CA");
        $country->setPhoneCode("+1");
        $manager->persist($country);

        $country = new Country();
        $country->setName("Australia");
        $country->setCode("AU");
        $country->setPhoneCode("+61");
        $manager->persist($country);

        $country = new Country();
        $country->setName("India");
        $country->setCode("IN");
        $country->setPhoneCode("+91");
        $manager->persist($country);

        $country = new Country();
        $country->setName("Brazil");
        $country->setCode("BR");
        $country->setPhoneCode("+55");
        $manager->persist($country);

        $manager->flush();
    }
}
