<?php

namespace App\Tests;



use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use App\Controller\UserController;
use App\Form\UserType;
use Symfony\Component\Validator\Validation;







class UserFormTest extends KernelTestCase
{

    public function testEmailExistsValidation()
    {
        self::bootKernel();
        $container = self::$kernel->getContainer();

        // Récupérer le mock du UserController
        $userControllerMock = $this->getMockBuilder(UserController::class)
            ->disableOriginalConstructor()
            ->getMock();

        // Créer un objet UserType avec le UserController mocké
        $userType = new UserType($userControllerMock);

        // Créer le formulaire avec les données (uniquement l'e-mail dans ce cas)
        $formData = ['email' => 'emilikonda@yahoo.fr'];
        $form = $container->get('form.factory')->create($userType::class, null, $formData);

        // Valider le formulaire pour déclencher les contraintes de validation
        $form->submit($formData);

        // Utiliser le validateur pour valider le formulaire
        $validator = Validation::createValidatorBuilder()
            ->enableAttributeMapping()
            ->getValidator();

        $errors = $validator->validate($form);

        // Assert sur les erreurs
        $this->assertCount(0, $errors);
    }
}