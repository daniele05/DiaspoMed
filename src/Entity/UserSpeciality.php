<?php

namespace App\Entity;

use App\Repository\UserSpecialityRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserSpecialityRepository::class)]
class UserSpeciality
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $idUser = null;

    #[ORM\Column]
    private ?int $idspeciality = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdUser(): ?int
    {
        return $this->idUser;
    }

    public function setIdUser(int $idUser): static
    {
        $this->idUser = $idUser;

        return $this;
    }

    public function getIdspeciality(): ?int
    {
        return $this->idspeciality;
    }

    public function setIdspeciality(int $idspeciality): static
    {
        $this->idspeciality = $idspeciality;

        return $this;
    }
}
