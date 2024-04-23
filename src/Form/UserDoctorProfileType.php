<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File as AssertFile;
use Symfony\Component\Validator\Constraints\Regex;
use Vich\UploaderBundle\Form\Type\VichFileType;

class UserDoctorProfileType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
           # ->add('picture' , VichFileType::class, [
             #   'label' => 'Picture',
               # 'required' => false,// le champs n'etant pas obligatoire
                #'constraints' => [
                  #  new AssertFile([
                      #  'maxSize' => '5M', // Limite de la taille 5 mo
                       # 'mimeTypes' =>['image/jpeg', 'image/png'], // Type de fichiers autorisés
                        #'mimeTypesMessage' => 'Téléchargez je vous prie un fichier JPEG ou PNG ',
                    #]),
              #  ],
        #])
          /*  ->add('picture', FileType::class, ['required'=> false])*/
            ->add('firstName', TextType::class, [
                'label' => 'Prénom',
                'constraints' => [
                    new Regex([
                        'pattern' => '/^[A-Za-z]+$/',
                        'message' => 'Le prénom ne doit contenir que des lettres.',
                    ]),
                ],
            ])
            ->add('lastName' , TextType::class, [
                'label' => 'Nom',
                'constraints' => [
                    new Regex([
                        'pattern' => '/^[A-Za-z]+$/',
                        'message' => 'Le nom ne doit contenir que des lettres.',
                    ]),
                ],
            ])
            ->add('birthDate' , TextType::class, [
                'label' => 'Date de naissance',
                'constraints' => [
                    new Regex([
                        'pattern' => "/^\d{4}-\d{2}-\d{2}$/",
                        'message' =>  "La date de naissance doit être au format YYYY-MM-DD."
                    ])
                ]
            ])
            ->add('email' , EmailType::class, [
                'constraints' => [
                    new Regex([
                        'pattern' => '/^[\w\W\.-]+@[a-zA-Z\d\.-]+\.[a-zA-Z]{2,}$/', // acceptation des caractères speciaux , un ou plusieurs caractères alphanumériques
                        'message' => 'Veuillez entrer une adresse e-mail valide.',
                    ])
                ]
            ])
           ->add('password' , PasswordType::class, [ // PasswordType le champs va se retrouver masqué
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
//            ->add('roles')
            ->add('RPPSNumber', NumberType::class,[
                'constraints' => [
                    new Regex([
                        'pattern' => '/^\d{15,}$/',
                        'message' => 'La chaîne doit contenir au moins 15 chiffres.'
                    ])
                ]
            ])
            ->add('CvUser', TextType::class, [
                'constraints' => [
                    new Regex([
                        'pattern' => '/\b(?:pdf|docx?|txt)\b/',
                        'message' => 'Le CV doit être un fichier PDF, DOC ou TXT.'
                    ])
                ]
            ])
            ->add('phoneNumber' , TextType::class, [
                'constraints' => [
                    new Regex([
                        'pattern' => '/^[0-9]{10}$/',
                        'message' => 'le numéro de téléphone doit comporter 10 chiffres.',
                    ]),
                ],
            ])
            ->add('address' , TextType::class, [
                'constraints' => [
                    new Regex([
                        'pattern' => '/^[a-zA-Z0-9\s]+$/',
                        'message'=> 'L\'addresse ne doit contenir que des lettres, des chiffres et des espaces.',
                    ])
                ]
            ])
//
        ->add('submit' ,SubmitType::class ,  [ 'label' => 'Créer mon compte'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
