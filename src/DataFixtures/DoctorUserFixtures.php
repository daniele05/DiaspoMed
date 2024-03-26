<?php

namespace App\DataFixtures;

use App\Entity\DoctorUser;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class DoctorUserFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $du1= new DoctorUser();
        $du1 ->setRPPSNumber(8101123456789)
             ->setCvDoctorUser( 'public/assets/images/CV medical.png')
             ->setPictureDoctorUser( 'public/assets/images/Doct. Harold.jpg')
            ;
        $manager->persist($du1);

        $du2= new DoctorUser();
        $du2 ->setRPPSNumber(8101123459090)
            ->setCvDoctorUser( 'public/assets/images/CV medical.png')
            ->setPictureDoctorUser( 'public/assets/images/Doct. Alex.jpg')
        ;
        $manager->persist($du1);

        $du3= new DoctorUser();
        $du3 ->setRPPSNumber(810112345908)
            ->setCvDoctorUser( 'public/assets/images/CV medical.png')
            ->setPictureDoctorUser( 'public/assets/images/Doct. Axel.jpg')
        ;
        $manager->persist($du1);

        $du4= new DoctorUser();
        $du4 ->setRPPSNumber(8101123456789)
            ->setCvDoctorUser( 'public/assets/images/CV medical.png')
            ->setPictureDoctorUser( 'public/assets/images/Doct. Coco.jpg')
        ;
        $manager->persist($du1);


        $manager->flush();
    }
}
