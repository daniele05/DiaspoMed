<?php

namespace App\DataFixtures;

use App\Entity\Speciality;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SpecialityFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $sp1 = new Speciality();
        $sp1->setSpecialityName("Orthopédie")
            ->setDescriptionSpeciality("L'orthopédie est la spécialité chirurgicale qui a pour objet la prévention et la correction des affections de l'appareil locomoteur, qui recouvrent les déformations et les malformations des os, des articulations, des muscles, des tendons et des nerfs. Le traitement chirurgical porte sur les membres supérieurs (épaule, coude et main), les membres inférieurs (hanche, genou et pied) et le rachis.

               Cette discipline est pratiquée par un chirurgien orthopédiste. Elle a fait de considérables progrès au xxe siècle avec notamment la prothèse totale de hanche de Charnley dans les années 1960, la prothèse de genou de Marmor et Insall et l'arthroscopie développée par H. Dorfmann en France dans les années 1980.");
        $manager->persist($sp1);

        $sp2 = new Speciality();
        $sp2->setSpecialityName("Orthodontie")
            ->setDescriptionSpeciality("L'orthopédie est la spécialité chirurgicale qui a pour objet la prévention et la correction des affections de l'appareil locomoteur, qui recouvrent les déformations et les malformations des os, des articulations, des muscles, des tendons et des nerfs. Le traitement chirurgical porte sur les membres supérieurs (épaule, coude et main), les membres inférieurs (hanche, genou et pied) et le rachis.

               Cette discipline est pratiquée par un chirurgien orthopédiste. Elle a fait de considérables progrès au xxe siècle avec notamment la prothèse totale de hanche de Charnley dans les années 1960, la prothèse de genou de Marmor et Insall et l'arthroscopie développée par H. Dorfmann en France dans les années 1980.");
        $manager->persist($sp2);

        $sp3 = new Speciality();
        $sp3->setSpecialityName("Pédiatrie")
            ->setDescriptionSpeciality("L'orthopédie est la spécialité chirurgicale qui a pour objet la prévention et la correction des affections de l'appareil locomoteur, qui recouvrent les déformations et les malformations des os, des articulations, des muscles, des tendons et des nerfs. Le traitement chirurgical porte sur les membres supérieurs (épaule, coude et main), les membres inférieurs (hanche, genou et pied) et le rachis.

               Cette discipline est pratiquée par un chirurgien orthopédiste. Elle a fait de considérables progrès au xxe siècle avec notamment la prothèse totale de hanche de Charnley dans les années 1960, la prothèse de genou de Marmor et Insall et l'arthroscopie développée par H. Dorfmann en France dans les années 1980.");
        $manager->persist($sp3);
        $sp1 = new Speciality();
        $sp1->setSpecialityName("Orthopédie")
            ->setDescriptionSpeciality("L'orthopédie est la spécialité chirurgicale qui a pour objet la prévention et la correction des affections de l'appareil locomoteur, qui recouvrent les déformations et les malformations des os, des articulations, des muscles, des tendons et des nerfs. Le traitement chirurgical porte sur les membres supérieurs (épaule, coude et main), les membres inférieurs (hanche, genou et pied) et le rachis.

               Cette discipline est pratiquée par un chirurgien orthopédiste. Elle a fait de considérables progrès au xxe siècle avec notamment la prothèse totale de hanche de Charnley dans les années 1960, la prothèse de genou de Marmor et Insall et l'arthroscopie développée par H. Dorfmann en France dans les années 1980.");
        $manager->persist($sp3);

        $sp4 = new Speciality();
        $sp4->setSpecialityName("Cardiologie")
            ->setDescriptionSpeciality("L'orthopédie est la spécialité chirurgicale qui a pour objet la prévention et la correction des affections de l'appareil locomoteur, qui recouvrent les déformations et les malformations des os, des articulations, des muscles, des tendons et des nerfs. Le traitement chirurgical porte sur les membres supérieurs (épaule, coude et main), les membres inférieurs (hanche, genou et pied) et le rachis.

               Cette discipline est pratiquée par un chirurgien orthopédiste. Elle a fait de considérables progrès au xxe siècle avec notamment la prothèse totale de hanche de Charnley dans les années 1960, la prothèse de genou de Marmor et Insall et l'arthroscopie développée par H. Dorfmann en France dans les années 1980.");
        $manager->persist($sp4);
        // $product = new Product();
        // $manager->persist($product);



        $manager->flush();
    }
}
