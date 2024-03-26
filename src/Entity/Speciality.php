<?php

namespace App\Entity;

use App\Repository\SpecialityRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SpecialityRepository::class)]
class Speciality
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $specialityName = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $descriptionSpeciality = null;

    #[ORM\ManyToOne(inversedBy: 'speciality')]
    private ?DoctorUser $Id_Speciality = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSpecialityName(): ?string
    {
        return $this->specialityName;
    }

    public function setSpecialityName(string $specialityName): static
    {
        $this->specialityName = $specialityName;

        return $this;
    }

    public function getDescriptionSpeciality(): ?string
    {
        return $this->descriptionSpeciality;
    }

    public function setDescriptionSpeciality(string $descriptionSpeciality): static
    {
        $this->descriptionSpeciality = $descriptionSpeciality;

        return $this;
    }

    public function getIdSpeciality(): ?DoctorUser
    {
        return $this->Id_Speciality;
    }

    public function setIdSpeciality(?DoctorUser $Id_Speciality): static
    {
        $this->Id_Speciality = $Id_Speciality;

        return $this;
    }
}
