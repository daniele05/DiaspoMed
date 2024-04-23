<?php

namespace App\Controller;

use App\Entity\Speciality;
use App\Repository\DoctorRepository;
use App\Repository\DoctorUserRepository;
use App\Repository\SpecialityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;


class DefaultController extends AbstractController
{


    #[Route('/', 'home', methods: ['GET'])]
    public function home(): Response
    {
        return $this->render('default/home.html.twig');
    }

    #[Route('/page/mentions-legales', methods: ['GET'])]
    public function mentionslegales(): Response
    {
        return $this->render('default/mentionslegales.html.twig');
    }

    #[Route('/page/presentation', methods: ['GET'])]
    public function presentation(): Response
    {
        return $this->render('default/presentation.html.twig');
    }

    #[Route('/page/cardSpeciality.html.twig', methods: ['GET'])]
    public function cardSpeciality(SpecialityRepository $specialityRepository): Response
    {
        // recuperartion de ttes mes specialites
        $specialities = $specialityRepository->findAll();
        // Passer les données à un template Twig pour affichage
        return $this->render('default/cardSpeciality.html.twig', [
            'specialities' => $specialities
        ]);
    }

    #[Route('/page/showSpeciality.html.twig/{id}', methods: ['GET'])]
    public function showSpeciality(int $id, SpecialityRepository $specialityRepository): Response
    {
        // recherche la specialite
        $speciality = $specialityRepository->find($id);

        // renvoi si celle -ci n existe pas
        if (!$speciality) {
            throw $this->createNotFoundException('La spécialité n\'existe pas');
        }

        return $this->render('default/showSpeciality.html.twig', [
            'speciality' => $speciality
        ]);
    }

    #[Route('/page/consultation-en-ligne', methods: ['GET'])]
    public function doctors(DoctorRepository $doctorRepository): Response
    {

        # TODO Récupération des medecins de la BDD
        $doctors = $doctorRepository->findAll();

        #recuperartion de ma liste de medecins avec le getDoctrine de ma b2d
        return $this->render('default/doctors.html.twig', [
            'doctors' => $doctors
        ]);
    }

    #[Route('/page/consultation.html.twig', methods: ['GET'])]
    #Ex. http://127.0.0.1:8000/nosservices/consultation
    public function consultation(): Response
    {
        return $this->render('default/consultation.html.twig');
    }

    #[Route('/page/posologie.html.twig', methods: ['GET'])]
    #Ex. http://127.0.0.1:8000/nosservices/posologie
    public function posologie(): Response
    {
        return $this->render('default/posologie.html.twig');
    }
}