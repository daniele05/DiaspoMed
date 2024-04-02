<?php

namespace App\DataFixtures;

use App\Entity\MedicalReport;
use DateTimeImmutable;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MedicalReportFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $mr1 = new MedicalReport();
        $mr1 ->setMedicalContent('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. ')
             ->setAttachements('public/assets/images/prescription')
             -> setCreatedAt(DateTimeImmutable::createFromFormat('Y-m-d', 2010-05-19))
             -> setUpdatedAt(DateTimeImmutable::createFromFormat('Y-m-d', 2024-14-10))
            ;
        $manager->persist($mr1);

        $mr2 = new MedicalReport();
        $mr2 ->setMedicalContent('"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. ')
            ->setAttachements('public/assets/images/prescription')
            -> setCreatedAt(DateTimeImmutable::createFromFormat('Y-m-d', 2009-05-18))
            -> setUpdatedAt(DateTimeImmutable::createFromFormat('Y-m-d', 2013-11-10))
        ;
        $manager->persist($mr2);

        $mr3 = new MedicalReport();
        $mr3 ->setMedicalContent('"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. ')
            ->setAttachements('public/assets/images/prescription')
            -> setCreatedAt(DateTimeImmutable::createFromFormat('Y-m-d', 2011-05-19))
            -> setUpdatedAt(DateTimeImmutable::createFromFormat('Y-m-d', 2012-12-10))
        ;
        $manager->persist($mr3);

        $mr4 = new MedicalReport();
        $mr4 ->setMedicalContent('"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. ')
            ->setAttachements('public/assets/images/prescription')
            -> setCreatedAt(DateTimeImmutable::createFromFormat('Y-m-d', 2020-05-19))
            -> setUpdatedAt(DateTimeImmutable::createFromFormat('Y-m-d', 2020-12-10))
        ;
        $manager->persist($mr4);


        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
