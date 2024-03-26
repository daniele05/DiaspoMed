<?php

namespace App\DataFixtures;

use App\Controller\AdminController;
use App\Entity\DoctorUser;
use App\Entity\PatientUser;
use App\Entity\User;
use App\Repository\DoctorUserRepository;
use DateTimeImmutable;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $u1= new User();
        $u1->setFirstName("Harold")
           ->setLastName("JEAN")
           ->setEmail("jharold2001@yahoo.br")
           ->setAddress("Teresina calle 23, 560099")
           ->setPassword("Cocodepapa")
           ->setFoneUser(+5145453540)
           ->setRoles(DoctorUser::class, PatientUser::class)
            -> setCreatedAt(DateTimeImmutable::createFromFormat('Y-m-d', 2010-05-19))
            -> setUpdatedAt(DateTimeImmutable::createFromFormat('Y-m-d', 2012-19-16))
        ;
        $manager->persist($u1);

        $u2= new User();
        $u2->setFirstName("Alex")
            ->setLastName("HAROLD")
            ->setEmail("alharold2000@yahoo.br")
            ->setAddress("Barcelona calle 30, 132456")
            ->setPassword("lebouboudemaman")
            ->setFoneUser(+5145453546)
            ->setRoles(DoctorUser::class,PatientUser::class,AdminController::class)
            -> setCreatedAt(DateTimeImmutable::createFromFormat('Y-m-d', 2010-05-19))
            -> setUpdatedAt(DateTimeImmutable::createFromFormat('Y-m-d', 2014-14-10))
        ;
        $manager->persist($u2);

        $u3= new User();
        $u3->setFirstName("Axel")
            ->setLastName("AUREL")
            ->setEmail("jharold2005@yahoo.es")
            ->setAddress("Sao Paolo calle 25, 560099")
            ->setPassword("lebebedemaman")
            ->setFoneUser(+5145453540)
            ->setRoles(DoctorUser::class,PatientUser::class,AdminController::class)
            -> setCreatedAt(DateTimeImmutable::createFromFormat('Y-m-d', 2010-05-19))
            -> setUpdatedAt(DateTimeImmutable::createFromFormat('Y-m-d', 2012-14-10))
        ;
        $manager->persist($u3);

        $u4= new User();
        $u4->setFirstName("Daniele")
            ->setLastName("KONDA")
            ->setEmail("kondaDaniele1978@yahoo.fr")
            ->setAddress("Wissous 23 Rue des écoles, 560099")
            ->setPassword("Cocodepapa")
            ->setFoneUser(+5145453540)
            ->setRoles(DoctorUser::class,PatientUser::class,AdminController::class)
            -> setCreatedAt(DateTimeImmutable::createFromFormat('Y-m-d', 2010-05-19))
            -> setUpdatedAt(DateTimeImmutable::createFromFormat('Y-m-d', 2020-14-10))
        ;
        $manager->persist($u4);
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
