<?php

namespace App\Entity;

use App\Repository\MedicalReportRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MedicalReportRepository::class)]
class MedicalReport
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $medicalContent = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $attachements = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\ManyToMany(targetEntity: DoctorUser::class, mappedBy: 'medicalReport')]
    private Collection $doctorUsers;

    #[ORM\ManyToOne(inversedBy: 'medicalReports')]
    private ?Prescription $prescription = null;

    #[ORM\OneToMany(targetEntity: Appointment::class, mappedBy: 'medicalReport')]
    private Collection $appointment;

    public function __construct()
    {
        $this->doctorUsers = new ArrayCollection();
        $this->appointment = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMedicalContent(): ?string
    {
        return $this->medicalContent;
    }

    public function setMedicalContent(string $medicalContent): static
    {
        $this->medicalContent = $medicalContent;

        return $this;
    }

    public function getAttachements(): ?string
    {
        return $this->attachements;
    }

    public function setAttachements(string $attachements): static
    {
        $this->attachements = $attachements;

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
     * @return Collection<int, DoctorUser>
     */
    public function getDoctorUsers(): Collection
    {
        return $this->doctorUsers;
    }

    public function addDoctorUser(DoctorUser $doctorUser): static
    {
        if (!$this->doctorUsers->contains($doctorUser)) {
            $this->doctorUsers->add($doctorUser);
            $doctorUser->addMedicalReport($this);
        }

        return $this;
    }

    public function removeDoctorUser(DoctorUser $doctorUser): static
    {
        if ($this->doctorUsers->removeElement($doctorUser)) {
            $doctorUser->removeMedicalReport($this);
        }

        return $this;
    }

    public function getPrescription(): ?Prescription
    {
        return $this->prescription;
    }

    public function setPrescription(?Prescription $prescription): static
    {
        $this->prescription = $prescription;

        return $this;
    }

    /**
     * @return Collection<int, Appointment>
     */
    public function getAppointment(): Collection
    {
        return $this->appointment;
    }

    public function addAppointment(Appointment $appointment): static
    {
        if (!$this->appointment->contains($appointment)) {
            $this->appointment->add($appointment);
            $appointment->setMedicalReport($this);
        }

        return $this;
    }

    public function removeAppointment(Appointment $appointment): static
    {
        if ($this->appointment->removeElement($appointment)) {
            // set the owning side to null (unless already changed)
            if ($appointment->getMedicalReport() === $this) {
                $appointment->setMedicalReport(null);
            }
        }

        return $this;
    }
}
