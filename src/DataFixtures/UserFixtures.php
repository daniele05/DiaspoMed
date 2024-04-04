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
use phpDocumentor\Reflection\Types\Nullable;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $u1= new User();
        $u1 ->setPicture("Doct. Harold.jpg")
            ->setFirstName("Harold")
            ->setLastName("JEAN")
            ->setBirthDate("2014/06/04")
            ->setEmail("jharold2001@yahoo.br")
             ->setPassword("Cocodepapa")
             ->setRoles(['ROLE_ADMIN'])
            ->setRPPSNumber(1565676790)
            ->setCvUser("CV medical.jpg")
            ->setPhoneNumber('0695172436')
             ->setAddress("Teresina calle 23, 560099")
            -> setCreatedAt(DateTimeImmutable::createFromFormat('Y-m-d', 2010-05-19))
            -> setUpdatedAt(DateTimeImmutable::createFromFormat('Y-m-d', 2012-19-16))
        ;
        $manager->persist($u1);

        $u2= new User();
        $u2->setFirstName("Alex")
            ->setLastName("HAROLD")
            ->setBirthDate("2014/06/12")
            ->setEmail("alharold2000@yahoo.br")
            ->setPassword("lebouboudemaman")
            ->setRoles(['ROLE_DOCTOR'])
            ->setRPPSNumber(1565676790)
            ->setCvUser("CV medical.jpg")
            ->setPhoneNumber('0695172678')
            ->setAddress("Teresina calle 23, 560099")
            -> setCreatedAt(DateTimeImmutable::createFromFormat('Y-m-d', 2010-05-19))
            -> setUpdatedAt(DateTimeImmutable::createFromFormat('Y-m-d', 2014-14-10))
        ;
        $manager->persist($u2);

        $u3= new User();
        $u3->setFirstName("Axel")
            ->setLastName("AUREL")
            ->setEmail("jharold2005@yahoo.es")
            ->setPassword("lebebedemaman")
            ->setRoles(['ROLE_DOCTOR'])
            ->setRPPSNumber(1565676790)
            ->setCvUser("CV medical.jpg")
            ->setPhoneNumber("0695172436")
            ->setAddress("Sao Paolo calle 25, 560099")
            -> setCreatedAt(DateTimeImmutable::createFromFormat('Y-m-d', 2010-05-19))
            -> setUpdatedAt(DateTimeImmutable::createFromFormat('Y-m-d', 2012-14-10))
        ;
        $manager->persist($u3);

        $u4= new User();
        $u4->setFirstName("Daniele")
            ->setLastName("KONDA")
            ->setEmail("kondaDaniele1978@yahoo.fr")
            ->setPassword("Cocodepapa")
            ->setRoles(['ROLE_PATIENT'])
            ->setRPPSNumber((int)null)
            ->setCvUser(null)
            ->setPhoneNumber("0695172436")
            ->setAddress("Wissous 23 Rue des écoles, 560099")
            -> setCreatedAt(DateTimeImmutable::createFromFormat('Y-m-d', 2010-05-19))
            -> setUpdatedAt(DateTimeImmutable::createFromFormat('Y-m-d', 2020-14-10))
        ;
        $manager->persist($u4);
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
