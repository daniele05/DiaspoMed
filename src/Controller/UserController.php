<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;

class UserController extends AbstractController
{
    #[Route('/inscription.html')]
    public function register(Request $request, UserPasswordHasherInterface $hasher, EntityManagerInterface $manager)
    {
        #creation user vide
        # il sera rempli par la suite avec les donnees de notre visiteur
        $user = new User();

        # creation form
        # Process:
        # 1. creation obj vide
        # 2. passage au form
        # 3. affichage form
        # 4. sumission par mon user
        # 5.symfony le traite
        # 6. Je recois mon objet rempli avec les donnees saisies
        $form = $this->createForm(UserType::class, $user);

        # Passer la requête au formulaire pour traitement
        # Process :
        # 1. Mon utilisateur soumet son formulaire
        # 2. La requête contient les informations soumises via POST
        # 3. Je passe la requête à Symfony (handleRequest)
        # 4. Symfony me retourne mon objet rempli.
        $form->handleRequest($request);

        # Si mon formulaire a été soumis par l'utilisateur.
        if ($form->isSubmitted()) {

            # Encodage du mot passe
            $hashedPassword = $hasher->hashPassword($user, $user->getPassword());
            $user->setPassword($hashedPassword);

            # Sauvegarde dans la BDD
            $manager->persist($user);
            $manager->flush();

            #Notification
            $this->addFlash('success', 'Féliciations, vous pouvez vous connecter.');
            # stockage en session une fois affichée , elle est supprimé du navigateur une fois actualisée.

            # Redirection
            return $this->redirectToRoute('app_login');

        }

        # Passage du formulaire à la vue
        return $this->render('user/register.html.twig', [
            'form' => $form
        ]);
    }


    #[Route('/profile.html')]
    public function profile(){
        return $this->render('user/profile.html.twig');

    }

    #[Route('/user/modifyPassword.html')]
    public function modifyPassword(){
        return new Response();

    }

    #[Route('/user/modifyPicture.html')]
    public function modifyPicture(){
        return new Response();
    }
}