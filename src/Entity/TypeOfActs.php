<?php

namespace App\Entity;

use App\Repository\TypeOfActsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TypeOfActsRepository::class)]
class TypeOfActs
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 150)]
    private ?string $actName = null;

    #[ORM\Column]
    private ?int $price = null;

    #[ORM\ManyToOne(inversedBy: 'typeOfActs')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Appointment $appointment = null;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getActName(): ?string
    {
        return $this->actName;
    }

    public function setActName(string $actName): static
    {
        $this->actName = $actName;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getAppointment(): ?Appointment
    {
        return $this->appointment;
    }

    public function setAppointment(?Appointment $appointment): static
    {
        $this->appointment = $appointment;

        return $this;
    }

}
