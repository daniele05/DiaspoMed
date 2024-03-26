<?php

namespace App\DataFixtures;

use App\Entity\PatientUser;
use DateTimeImmutable;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PatientUserFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $pu1= new PatientUser();
        $pu1 -> setPicturePatientUser('public/assets/image/doct1.jpg')
             ->setBirthDatePatientUser(DateTimeImmutable::createFromFormat("Y-m-d",2002-06-12))
            ;
        $manager->persist($pu1);

        $pu2= new PatientUser();
        $pu2 -> setPicturePatientUser('public/assets/image/doct1.jpg')
             ->setBirthDatePatientUser(DateTimeImmutable::createFromFormat("Y-m-d",2012-06-10))
        ;
        $manager->persist($pu2);

        $pu3= new PatientUser();
        $pu3 -> setPicturePatientUser('public/assets/image/doct1.jpg')
             ->setBirthDatePatientUser(DateTimeImmutable::createFromFormat("Y-m-d",2010-05-11))
        ;
        $manager->persist($pu3);

        $pu4= new PatientUser();
        $pu4 -> setPicturePatientUser('public/assets/image/doct1.jpg')
             ->setBirthDatePatientUser(DateTimeImmutable::createFromFormat("Y-m-d",2000-12-07))
        ;
        $manager->persist($pu4);
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
