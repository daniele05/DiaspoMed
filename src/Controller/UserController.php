<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\ModifyPasswordFormType;
use App\Form\UserDoctorProfileType;
use App\Form\UserProfileType;
use App\Form\UserType;
use App\Repository\UserRepository;
use Symfony\Component\Form\FormError;
use Symfony\Component\Form\FormInterface;
use Doctrine\ORM\EntityManagerInterface;
use mysql_xdevapi\Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Core\User\UserInterface;
use function PHPUnit\Framework\throwException;

class UserController extends AbstractController
{
    #
    private $entityManager;
    public function __construct(EntityManagerInterface $entityManager){
        $this->entityManager = $entityManager;
    }
       # retirer le champs image au moment de l inscription

    function removeFormField(FormInterface $form, string $fieldName): void
    {
        if ($form->has($fieldName)) {
            $form->remove($fieldName);
        }
    }
    private function prepareRegistrationForm(FormInterface $form): void
    {
        # Enlever le champ image du formulaire d'inscription

        $this->removeFormField($form, 'picture');
    }

    # methode inscription

    /*#[Route('/inscription.html')]
    public function register(Request $request, UserPasswordHasherInterface $hasher, EntityManagerInterface $manager): RedirectResponse|Response
    {
        #creation user vide
        # il sera rempli par la suite avec les donnees de notre visiteur
        $user = new User();

        $form = $this->createForm(UserType::class, $user);

        // Préparer le formulaire d'inscription
        $this->prepareRegistrationForm($form);

        $form->handleRequest($request);

        var_dump($request->request->all());


        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $hashedPassword = $hasher->hashPassword($user, $user->getPassword());
            $user->setPassword($hashedPassword);

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
            'form' => $form->createView(),

        ]);
    }*/

    #[Route('/inscription/doctor.html')]
    public function registerDoctor(Request $request, UserPasswordHasherInterface $hasher, EntityManagerInterface $manager): RedirectResponse|Response
    {
        #creation user vide
        # il sera rempli par la suite avec les donnees de notre visiteur
        $user = new User();
        $user->setRoles(['ROLE_DOCTOR']);


        $form = $this->createForm(UserDoctorProfileType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $hashedPassword = $hasher->hashPassword($user, $user->getPassword());
            $user->setPassword($hashedPassword);

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
            'form' => $form->createView(),

        ]);
    }

    #[Route('/inscription/patient.html')]
    public function registerPatient(Request $request, UserPasswordHasherInterface $hasher, EntityManagerInterface $manager): RedirectResponse|Response
    {
        #creation user vide
        # il sera rempli par la suite avec les donnees de notre visiteur
        $user = new User();
        $user->setRoles(['ROLE_PATIENT']);


        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);

        var_dump($request->request->all());

        if ($form->isSubmitted() && $form->isValid()) {

            $hashedPassword = $hasher->hashPassword($user, $user->getPassword());
            $user->setPassword($hashedPassword);

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
            'form' => $form->createView(),

        ]);
    }

    ##[Route('/inscription/doctor.html')]
   # public function registerDoctor(Request $request, UserPasswordHasherInterface $hasher, EntityManagerInterface $manager): RedirectResponse|Response
   # {
        #creation user vide
        # il sera rempli par la suite avec les donnees de notre visiteur
       # $user = new User();
       # $user->setRoles(['ROLE_DOCTOR']);

        #$form = $this->createForm(UserDoctorProfileType::class, $user);
       # $form->handleRequest($request);

        #var_dump($request->request->all());

        #if ($form->isSubmitted() && $form->isValid()) {

            #$hashedPassword = $hasher->hashPassword($user, $user->getPassword());
            #$user->setPassword($hashedPassword);

         #   $pictureFile = $form->get('image')->getData();
          #  if($pictureFile) {
                // Generer un nom de fichier unique
               # $newFilename = uniqid().'.'.$pictureFile->guessExtension();
                // Déplacer le fichier dans le repertoire ou les iamges sont stockées
               # $pictureFile->move(
                 #   $this->getParameter('kernel.project_dir').'/public/assets/images',
                #    $newFilename
                #);#}
           # $manager->persist($user);
            #$manager->flush();
            #Notification
            #$this->('success', 'Féliciations, vous pouvez vous connecter.');
            # stockage en session une fois affichée , elle est supprimé du navigateur une fois actualisée.

            # Redirection
            #return $this->redirectToRoute('app_login');
       # }
        # Passage du formulaire à la vue
       # return $this->render('user/register.html.twig', [
        #    'form' => $form->createView(),
       # ]);
   # }



    // verification email

    /**
     * @throws \Exception
     */


    //#[Route('user/modifyPassword.html' , name: 'user_modify_password')]
   // public function modifyPassword(Request $request, UserPasswordEncoderInterface  $passwordEncoder , EntityManagerInterface $manager): Response
    //{

       // $user = $this->getUser();
       // $form = $this->createForm(ModifyPasswordFormType::class, $user);
       // $form->handleRequest($request);

       // if ($form->isSubmitted() && $form->isValid()) {
            // Récupérer le nouveau mot de passe à partir du formulaire
        //    $newPassword = $form->get('newPassword')->getData();

            // Hasher le nouveau mot de passe
         //   $hashedPassword = $passwordEncoder->encodePassword($user, $newPassword);

            // Définir le nouveau mot de passe haché sur l'utilisateur
           // $user->setPassword($hashedPassword);

            // Enregistrer l'utilisateur mis à jour dans la base de données


          //  $manager->persist($user);
          //  $manager->flush();
            // Rediriger ou afficher un message de succès
          //  return $this->redirectToRoute('app_profile_show'); // Rediriger vers la page de profil de l'utilisateur
       // }

     //   return  $this->render('user/modifyPassword.html.twig', [
       //     'form' => $form->createView(),
       // ]);


   // }

   // #[Route('/user/modifyPicture.html')]
   // public function modifyPicture(): Response
   // {
    //    return new Response();
   // }


}