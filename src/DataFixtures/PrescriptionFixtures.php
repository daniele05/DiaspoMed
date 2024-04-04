<?php

namespace App\DataFixtures;

use App\Entity\Prescription;
use DateTimeImmutable;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PrescriptionFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $p1 = new Prescription();
        $p1 -> setPrescriptionContent('public/assets/images/prescription.png')
            -> setCreatedAt(DateTimeImmutable::createFromFormat('Y-m-d', '2023-05-18'))
            -> setUpdatedAt(DateTimeImmutable::createFromFormat('Y-m-d', '2023-07-10'))
            ;
        $manager->persist($p1);


        $p2 = new Prescription();
        $p2 -> setPrescriptionContent('public/assets/images/prescription.png')
            -> setCreatedAt(DateTimeImmutable::createFromFormat('Y-m-d', '2023-05-19'))
            -> setUpdatedAt(DateTimeImmutable::createFromFormat('Y-m-d', '2023-12-10'))

        ;
        $manager->persist($p2);


        $p3 = new Prescription();
        $p3 -> setPrescriptionContent('public/assets/images/prescription.png')
            -> setCreatedAt(DateTimeImmutable::createFromFormat('Y-m-d', '2023-06-18'))
            -> setUpdatedAt(DateTimeImmutable::createFromFormat('Y-m-d', '2023-11-10'))

        ;
        $manager->persist($p3);


        $p4 = new Prescription();
        $p4 -> setPrescriptionContent('public/assets/images/prescription.png')
            -> setCreatedAt(DateTimeImmutable::createFromFormat('Y-m-d', '2013-05-10'))
            -> setUpdatedAt(DateTimeImmutable::createFromFormat('Y-m-d', '2013-07-12'))
        ;
        $manager->persist($p1);
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
