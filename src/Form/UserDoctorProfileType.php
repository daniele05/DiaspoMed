<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserDoctorProfileType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('picture')
            ->add('firstName')
            ->add('lastName')
            ->add('birthDate')
            ->add('email')
           ->add('password')
//            ->add('roles')
            ->add('RPPSNumber')
            ->add('CvUser')
            ->add('phoneNumber')
            ->add('address')
//            ->add('createdAt', null, [
//                'widget' => 'single_text',
//            ])
//            ->add('updatedAt', null, [
//                'widget' => 'single_text',
//            ])
        ->add('submit' ,SubmitType::class ,  [ 'label' => 'Envoyer'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
