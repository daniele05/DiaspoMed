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
            ->add('title', TextType::class, [
                'constraints' => [
                    new NotBlank(),
                    new Regex([
                        'pattern' => '/^[a-zA-Z0-9\s]+$/',
                        'message' => 'The title should only contain letters, numbers, and spaces.'
                    ]),
                ],
            ])
            ->add('content', TextType::class, [
                'constraints' => [
                    new NotBlank(),
                ],
            ])
            ->add('place', TextType::class, [
                'constraints' => [
                    new NotBlank(),
                ],
            ])
            ->add('scheduledDate', DateTimeType::class, [
                'widget' => 'single_text',
                'html5' => true,
                'attr' => ['class' => 'datetimepicker'],
                'constraints' => [
                    new NotNull(),
                    new Regex([
                        'pattern' => '/^\d{4}-\d{2}-\d{2}T\d{2}:\d{2}:\d{2}$/',
                        'message' => 'Le format de date n\'est pas valide. Utilisez le format jj/mm/aaaa hh:mm.'
                    ]),
            ],
            ])
            ->add('save', SubmitType::class, [
                'label' => 'Create Appointment',
                'attr' => ['class' => 'btn btn-primary'],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Appointment::class,
        ]);
    }

}
