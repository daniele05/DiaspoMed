<?php

namespace App\Entity;

use App\Repository\PrescriptionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PrescriptionRepository::class)]
class Prescription
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $prescriptionContent = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\OneToMany(targetEntity: MedicalReport::class, mappedBy: 'prescription')]
    private Collection $medicalReports;

    public function __construct()
    {
        $this->medicalReports = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrescriptionContent(): ?string
    {
        return $this->prescriptionContent;
    }

    public function setPrescriptionContent(string $prescriptionContent): static
    {
        $this->prescriptionContent = $prescriptionContent;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeImmutable $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @return Collection<int, MedicalReport>
     */
    public function getMedicalReports(): Collection
    {
        return $this->medicalReports;
    }

    public function addMedicalReport(MedicalReport $medicalReport): static
    {
        if (!$this->medicalReports->contains($medicalReport)) {
            $this->medicalReports->add($medicalReport);
            $medicalReport->setPrescription($this);
        }

        return $this;
    }

    public function removeMedicalReport(MedicalReport $medicalReport): static
    {
        if ($this->medicalReports->removeElement($medicalReport)) {
            // set the owning side to null (unless already changed)
            if ($medicalReport->getPrescription() === $this) {
                $medicalReport->setPrescription(null);
            }
        }

        return $this;
    }
}
