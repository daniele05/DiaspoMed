<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\User1Type;
use App\Form\UserProfileType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/profile')]
class ProfileController extends AbstractController
{
    private $security;

    public function __construct(Security $security)
    {
          $this->security = $security;
    }

    #[Route('/', name: 'app_profile_show', methods: ['GET'])]
    public function show(): Response
    {
        // Recup user connecté
        $user= $this->getUser();
        // verif si user est admin
        $isAdmin = $this->security->isGranted('ROLE_ADMIN');
        // verif si user est medecin
        $isDoctor = $this->security->isGranted('ROLE_DOCTOR');
        // verif si user est patient
        $isPatient= $this->security->isGranted('ROLE_PATIENT');
        return $this->render('profile/show.html.twig', [
            'user' => $user,
            'admin' => $isAdmin,
            'isDoctor' => $isDoctor,
            'isPatient' => $isPatient,
        ]);
    }

    #[Route('/edit', name: 'app_profile_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, EntityManagerInterface $entityManager): Response
    {
        $user = $this->getUser();
       // dd($user);
        if ($user->getRoles()[0])
        $form = $this->createForm(UserProfileType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_profile_show', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('profile/edit.html.twig', [
            'user' => $user,
            'form' => $form,
        ]);
    }

}
