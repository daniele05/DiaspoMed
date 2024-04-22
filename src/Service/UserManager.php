<?php

namespace App\Service;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;

class UserManager
{
    private $entityManager; // Déclaration de l'entityManager
    private UserRepository $userRepository;

    public function __construct(EntityManagerInterface $entityManager, UserRepository $userRepository)
    {
        $this->entityManager = $entityManager; // Injection de l'entityManager
        $this->userRepository = $userRepository;
    }

    public function emailExists($email): bool
    {
        // Utilisation de l'entityManager pour accéder à la base de données
        $existingUser = $this->userRepository->findOneBy(['email'=> $email]);

        return $existingUser !== null;
    }
}