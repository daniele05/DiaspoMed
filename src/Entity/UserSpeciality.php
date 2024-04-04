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
    private ?int $idSpeciality = null;

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

    public function getIdSpeciality(): ?int
    {
        return $this->idSpeciality;
    }

    public function setIdSpeciality(int $idSpeciality): static
    {
        $this->idSpeciality = $idSpeciality;

        return $this;
    }
}
