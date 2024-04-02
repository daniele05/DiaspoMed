<?php

namespace App\Entity;

use App\Repository\SpecialityRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use MongoDB\BSON\Type;

#[ORM\Entity(repositoryClass: SpecialityRepository::class)]
class Speciality
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $image = null;

    #[ORM\Column(length: 150)]
    private ?string $specialityName = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $specialityContent = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): static
    {
        $this->image = $image;

        return $this;
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

    public function getSpecialityContent(): ?string
    {
        return $this->specialityContent;
    }

    public function setSpecialityContent(string $specialityContent): static
    {
        $this->specialityContent = $specialityContent;

        return $this;
    }
}
