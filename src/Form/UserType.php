<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    /*
     *  permet de construire le form en s aidant du builder dans symfony chaq champ corresponda a tous les types
     **/


    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email',EmailType::class,[ 'label' => 'E-mail'])
            ->add('password',PasswordType::class, [ 'label' => 'Mot de passe'])
            ->add('first_Name',TextType::class, [ 'label' => 'Prénom'])
            ->add('last_Name', TextType::class , [ 'label' => 'Nom'])
            ->add('submit', SubmitType::class, [ 'label' => 'Envoyer'])
        ;
    }
    /**
     *
     * */

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
