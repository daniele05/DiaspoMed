<?php

namespace App\Controller;

use App\Entity\User;
#use App\Form\User1Type;
use App\Form\ModifyPasswordFormType;
use App\Form\UserProfileType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/profile')]
class ProfileController extends AbstractController
{
    private  $security;

    public function __construct(Security $security)
    {
          $this->security = $security;
    }

    #[Route('/', name: 'app_profile_show', methods: ['GET'])]
    public function show(): Response
    {
        if (!$this->getUser()) {
            // Rediriger vers la page de connexion ou afficher un message d'erreur
            // Par exemple, vous pouvez rediriger vers la page de connexion avec:
            // return $this->redirectToRoute('app_login');
            // Ou afficher un message d'erreur et ne pas continuer le traitement
            throw $this->createAccessDeniedException('Vous devez être connecté pour accéder à cette page.');
        }

        // Récupérer l'utilisateur connecté
        $user = $this->getUser();

        // verif si user est admin
        $isAdmin = $this->security->isGranted('ROLE_ADMIN');
        // verif si user est medecin
        $isDoctor = $this->security->isGranted('ROLE_DOCTOR');
        // verif si user est patient
        $isPatient= $this->security->isGranted('ROLE_PATIENT');

        // rendre le template avec les données de l utilisateur
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
 // filtre

    #[Route('/modifyPassword', name: 'app_modify_password', methods: ['GET', 'POST'])]
    public function modifyPassword(Request $request, UserPasswordHasherInterface $passwordEncoder , EntityManagerInterface $manager): Response
    {
        // je m assure que l utilisateur esr authentifié
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        $user = $this->getUser();
        $form = $this->createForm(ModifyPasswordFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            //Récupérer le nouveau mot de passe à partir du formulaire
            $newPassword = $form->get('newPassword')->getData();

            // Hasher le nouveau mot de passe
            $hashedPassword = $passwordEncoder->hashPassword($user, $newPassword);

            // Définir le nouveau mot de passe haché sur l'utilisateur
            $user->setPassword($hashedPassword);

            //Enregistrer l'utilisateur mis à jour dans la base de données
            $manager->persist($user);
            $manager->flush();
            //Rediriger ou afficher un message de succès
            return $this->redirectToRoute('app_profile_show'); // Rediriger vers la page de profil de l'utilisateur
        }

        // verification de l utilisateur défini
        if($user !== null){
            return $this->render('profile/modifyPassword.html.twig', [
                'form' => $form->createView(),
                'user' => $user, // Passez l'utilisateur au twig
            ]);
        }else{
            // redirection page login
            $this->addFlash('notice', 'Veuillez vous connecter.');
            return $this->redirectToRoute('app_login');


        }

    }

}
