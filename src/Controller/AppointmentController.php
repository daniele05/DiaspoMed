<?php

namespace App\Controller;

use App\Entity\Appointment;
use App\Entity\User;
use App\Form\AppointmentType;
use App\Repository\AppointmentRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/appointment')]
class AppointmentController extends AbstractController
{
    private Security $security;
    private EntityManagerInterface $entityManager;


    public function __construct(Security $security, EntityManagerInterface $entityManager)
    {
        $this->security = $security;
        $this->entityManager = $entityManager;
    }

    #[Route('/', name: 'app_appointment_show', methods: ['GET'])]
    public function show(AppointmentRepository $appointmentRepository): Response
    {
        // Récupérer l'utilisateur connecté ou un utilisateur spécifique (patient ou médecin)
        $user = $this->getUser();
        if(!$user){
            return $this->redirectToRoute('app_login');
        }
        /*// Vérifier si $user contient les informations attendues
        if(!$user->getFirstName() || !$user->getLastName()){

            // Peut-être rediriger vers une page de profil pour que l'utilisateur mette à jour ses informations
            return $this->redirectToRoute('app_profile_show');
        }
        // Récupérer les rendez-vous pour cet utilisateur
        $appointments = $appointmentRepository->findAll();*/

        // Récupérer les rendez-vous de l'utilisateur connecté
        $appointments = $appointmentRepository->findBy(['user' => $user]);


        // Passer l'utilisateur et les rendez-vous au template Twig
        return $this->render('appointment/show.html.twig', [
            'user' => $user,
            'appointments' => $appointments,
        ]);
    }

  // nouveau rdv
    #[Route('/appointments/new', name: 'app_appointment_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
       // Récup utlistauer connecté
        $user = $this->getUser();

        // Créer une nouvelle instance de rdv
        $appointment = new Appointment();

        // Associer l utilisateur à ce rdv
        $appointment->setUser($user);

        // Creer le formulaire pour ajouter un nouveau rdv
        $form = $this->createForm(AppointmentType::class, $appointment);
        $form->handleRequest($request);

        // verif si le form a été soumis et validé
        if ($form->isSubmitted() && $form->isValid()) {

            // enregistrement du rdv dans la b2d

             $this->entityManager->persist($appointment);
            $this->entityManager->flush();

            // Redirection vers page de rdv
            return $this->redirectToRoute('app_appointment_show');
        }
        // passer le form au template Twig pour affichage
        return $this->render('appointment/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/edit/{id}', name: 'app_appointment_edit', methods: ['GET', 'POST'])]

    public function edit(Request $request, EntityManagerInterface $entityManager, AppointmentRepository $appointmentRepository, $id): Response
    {
        // Récupérer l'objet Appointment à éditer à partir de l'ID (par exemple)
        $appointment = $appointmentRepository->find($id); // Assurez-vous de remplacer $id par l'ID réel de l'Appointment à éditer

        // verification si l objet appointment est bien defini
        if(!$appointment){
            throw $this->createNotFoundException('No appointment found for id '.$id);
        }
        // Alors , Créer le formulaire en utilisant l'objet Appointment récupéré
        $form = $this->createForm(AppointmentType::class, $appointment);
        $form->handleRequest($request);
        dump($id);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();
            return $this->redirectToRoute('app_appointment_show');
        }

        return $this->render('appointment/edit.html.twig', [
            'form' => $form->createView(),
            'appointment' => $appointment, // Passer l'objet Appointment au template
        ]);
    }



    #[Route('/delete/{id}', name: 'app_appointment_delete', methods: ['DELETE'])]
    public function delete(EntityManagerInterface $entityManager, Appointment $appointment, AppointmentRepository $appointmentRepository, $id): Response
    {


        // Récupérer l'objet Appointment à éditer à partir de l'ID
        $appointment = $appointmentRepository->find($id); // Assurez-vous de remplacer $id par l'ID réel de l'Appointment à éditer

        // verification si l objet appointment est bien defini
        if(!$appointment){
            throw $this->createNotFoundException('No appointment found for id '.$id);
        }

        // Suppression de l objet appointment
        $entityManager->remove($appointment);
        $entityManager->flush();

      // Redirection vers la liste des rdv après suppression
        return $this->redirectToRoute('app_appointment_show');
    }
}
