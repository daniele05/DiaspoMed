<?php

namespace App\Form;

use App\Entity\Appointment;
use App\Entity\MedicalReport;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Regex;


class AppointmentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
//            ->add('title', TextType::class, [
//                'constraints' => [
//                    new NotBlank(),
//                    new Regex([
//                        'pattern' => '/^[a-zA-Z0-9\s]+$/',
//                        'message' => 'The title should only contain letters, numbers, and spaces.'
//                    ]),
//                ],
//            ])
            ->add('content', TextType::class, [
                'label' => 'Motif de la consultation',
                'constraints' => [
                    new NotBlank(),
                ],
            ])
//            ->add('place', TextType::class, [
//                'constraints' => [
//                    new NotBlank(),
//                ],
//            ])
            ->add('scheduledDate', DateTimeType::class, [
                'label' => 'Date de consultation souhaitée',
            ])
            ->add('save', SubmitType::class, [
                'label' => 'Soumettre ma demande de réservation',
                'attr' => ['class' => 'btn w-100 btn-primary'],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Appointment::class,
        ]);
    }

}
