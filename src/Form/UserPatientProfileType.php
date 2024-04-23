<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Regex;
use Vich\UploaderBundle\Form\Type\VichFileType;

class UserPatientProfileType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
         #   ->add('picture')
        /* ->add('picture', FileType::class, ['required'=> false])*/
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
                        'message' => 'Le mot de passe doit contenir au moins une lettre majuscule, une lettre minuscule, un chiffre, un caractère spécial et être d\'au moins 12 caractères de longueur.',
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
            ->add('submit', SubmitType::class, [ 'label' => 'Send']);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
