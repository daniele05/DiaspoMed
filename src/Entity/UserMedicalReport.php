<?php

namespace App\Entity;

use App\Repository\UserMedicalReportRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserMedicalReportRepository::class)]
class UserMedicalReport
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $idUser = null;

    #[ORM\Column]
    private ?int $idMedicalReport = null;

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

    public function getIdMedicalReport(): ?int
    {
        return $this->idMedicalReport;
    }

    public function setIdMedicalReport(int $idMedicalReport): static
    {
        $this->idMedicalReport = $idMedicalReport;

        return $this;
    }
}
