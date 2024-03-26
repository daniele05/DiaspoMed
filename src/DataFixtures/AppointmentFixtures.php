<?php

namespace App\DataFixtures;

use App\Entity\Appointment;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppointmentFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $ap1 = new Appointment();
        $ap1 -> setScheduledDate(2023-01-02)
             ->setPlace('5 Rue de lapointe 75014 Paris')
            ;
        $manager->persist($ap1);

        $ap2 = new Appointment();
        $ap2 -> setScheduledDate(2024-06-02)
            ->setPlace('5 Rue de mas 75019 Paris')
        ;
        $manager->persist($ap2);

        $ap3 = new Appointment();
        $ap3 -> setScheduledDate(2020-10-02)
            ->setPlace('5 Rue de Archide 75010 Paris')
        ;
        $manager->persist($ap3);

        $ap4 = new Appointment();
        $ap4 -> setScheduledDate(2024-07-02)
            ->setPlace('5 Rue de Paz 75011 Paris')
        ;
        $manager->persist($ap4);
        

        $manager->flush();
    }
}
