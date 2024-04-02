<?php

namespace App\Controller;

use App\Entity\Speciality;
use App\Repository\DoctorUserRepository;
use App\Repository\SpecialityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;


class DefaultController extends AbstractController
{


   #[Route('/','home',methods: ['GET'])]
#Ex. http://127.0.0.1:8000/
        # en param -> la liste des specialites demandée dans le homepage.
    public function home()  {

        /*
         * tableau associatif  */

        return $this->render('default/home.html.twig'
        );


    }

    #[Route('/page/presentation.html.', methods: ['GET'])]
    #Ex. http://127.0.0.1:8000/presentation
    public function presentation()
    {
        return $this->render('default/presentation.html.twig');

    }

    #[Route('/page/specialites.html.twig', methods: ['GET'])]
    #Ex. http:://127.0.0.1/nosservices/specialites
    public function specialites():Response
       {



        // Passer les données à un template Twig pour affichage
        return $this->render('default/specialites.html.twig');



    }

    #[Route('/page/medecins.html.twig', methods: ['GET'])]
    #Ex. http://127.0.0.1:8000/nosservices/medecins
    public function medecins(): Response
    {
        #recuperartion de ma liste de medecins avec le getDoctrine de ma b2d



        return $this->render('default/medecins.html.twig');

    }

    #[Route('/videoconsultation.html', methods: ['GET'])]
    #Ex. http://127.0.0.1:8000/nosservices/videosonsulattion
    public function videoconsultation(): Response
    {
        return $this->render('default/videoconsultation.html.twig');

    }

    #[Route('/page/nosservices/posologie.html', methods: ['GET'])]
    #Ex. http://127.0.0.1:8000/nosservices/posologie
    public function posologie(): Response
    {
        return $this->render('default/posologie.html.twig');

    }

    private function getDoctrine()
    {
    }

}