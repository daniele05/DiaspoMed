<?php

namespace App\Form;

use App\Entity\User;
use App\Service\UserManager;
use PHPUnit\Framework\Constraint\Callback;
use Symfony\Component\Form\AbstractType;
#use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Context\ExecutionContextInterface;
use Vich\UploaderBundle\Entity\File;
use Vich\UploaderBundle\Form\Type\VichFileType;
use Symfony\Component\Validator\Constraints\File as AssertFile; // Alias pour la classe File de Symfony


class UserType extends AbstractType
{

    private $userManager;
    public function __construct(UserManager $userManager){

        $this->userManager = $userManager;
    }
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
           # ->add('picture', VichFileType::class, [
            #    'label' => 'Picture',
            #    'required' => false,// le champs n'etant pas obligatoire
             #   'constraints' => [
             #       new AssertFile([
               #         'maxSize' => '5M', // Limite de la taille
                #        'mimeTypes' =>['image/jpeg', 'image/png'], // Type de fichiers autorisés
                #        'mimeTypesMessage' => 'Please upload a JPEG or PNG file',
                 #   ]),
               # ],
           # ])
               # a ameliorer plus tard

         #  ->add('userType', ChoiceType::class, [
          #     'label' => 'Type d\'utilisateur',
           #    'choices' => [
             #      'Patient' => 'ROLE_PATIENT',
               #    'Médecin' => 'ROLE_DOCTOR',
               #],
               #'expanded' => true, // affiche les options sous forme de boutons radio
               #'multiple' => false, // permet de sélectionner une seule option
               #'mapped' => false, // Ne pas mapper ce champ à une propriété de l'entité User
           #])
            ->add('firstName', TextType::class, [
                'constraints' => [
                    new Regex([
                        'pattern' => '/^[A-Za-z]+$/',
                        'message' => 'le prénom ne doit contenir que des lettres.',
                    ]),
                ],
            ])
            ->add('lastName', TextType::class, [
                'constraints' => [
                    new Regex([
                        'pattern' => '/^[A-Za-z]+$/',
                        'message' => 'le nom ne doit contenir que des lettres.',
                    ]),
                ],
            ])
            ->add('birthDate', TextType::class, [
                'label' => 'Date de naissance',
                'constraints' => [
                    new Regex([
                        'pattern' => "/^\d{4}-\d{2}-\d{2}$/",
                        'message' =>  "La date de naissance doit être au format YYYY-MM-DD."
                    ])
                ]
            ])
            ->add('email', EmailType::class, [
                'constraints' => [
                    new Regex([
                        'pattern' => '/^[\w\W\.-]+@[a-zA-Z\d\.-]+\.[a-zA-Z]{2,}$/', // acceptation des caractères speciaux , un ou plusieurs caractères alphanumériques
                        #'message' => 'E-mail déjà utilisé.',
                    ]),
                   #
                   # new Callback([$this, 'validateEmailExists']),
                ]
            ])
            ->add('password', PasswordType::class, [ // PasswordType le champs va se retrouver masqué
                'constraints' => [
                    new Regex([
                        'pattern' => '/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[^\w\s]).{12,}$/',
                        'message' => 'Le mot de passe doit contenir au moins une lettre majuscule, une lettre minuscule, un chiffre, un caractère spécial et être d\'au moins 8 caractères de longueur.',
                    ]),
                ],
                'attr' => [
                    'placeholder' => 'Mot de passe', // donne un indice de voisibilité sur le champ à l utilisateur
                ]
            ])
            ->add('phoneNumber', TextType::class, [
                'constraints' => [
                    new Regex([
                        'pattern' => '/^[0-9]{10}$/',
                        'message' => 'le numéro de téléphone doit comporter 10 chiffres.',
                    ]),
                ],
            ])
            ->add('address', TextType::class, [
                'constraints' => [
                    new Regex([
                        'pattern' => '/^[a-zA-Z0-9\s]+$/',
                        'message'=> 'L\'addresse ne doit contenir que des lettres, des chiffres et des espaces.',
                    ])
                ]
            ])
            ->add('submit', SubmitType::class, [ 'label' => 'Envoyer']);

    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }


}
