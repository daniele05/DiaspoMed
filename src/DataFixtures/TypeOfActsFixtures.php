<?php

namespace App\DataFixtures;

use App\Entity\TypeOfActs;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TypeOfActsFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $taf1= new TypeOfActs();
        $taf1 -> setActName('Check up')
               ->setPrice(0)
        ;
        $manager->persist($taf1);

        $taf2= new TypeOfActs();
        $taf2 -> setActName('Consultation préopératoire orthopédique')
            ->setPrice(0)
        ;
        $manager->persist($taf2);

        $taf3= new TypeOfActs();
        $taf3 -> setActName('Détartrage')
            ->setPrice(0)
        ;
        $manager->persist($taf3);

        $taf4= new TypeOfActs();
        $taf4 -> setActName('Consultation rééducation du poignée')
            ->setPrice(0)
        ;
        $manager->persist($taf4);


        $manager->flush();
    }
}
