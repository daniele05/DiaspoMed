<?php

namespace App\Entity;

use App\Repository\AppointmentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AppointmentRepository::class)]
class Appointment
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $scheduledDate = null;

    #[ORM\Column(length: 255)]
    private ?string $place = null;

    #[ORM\ManyToOne(inversedBy: 'appointment')]
    private ?MedicalReport $medicalReport = null;

    #[ORM\ManyToOne(inversedBy: 'appointment')]
    private ?PatientUser $patientUser = null;

    #[ORM\OneToMany(targetEntity: TypeOfActs::class, mappedBy: 'appointment')]
    private Collection $typeOfActs;

    public function __construct()
    {
        $this->typeOfActs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getScheduledDate(): ?\DateTimeInterface
    {
        return $this->scheduledDate;
    }

    public function setScheduledDate(\DateTimeInterface $scheduledDate): static
    {
        $this->scheduledDate = $scheduledDate;

        return $this;
    }

    public function getPlace(): ?string
    {
        return $this->place;
    }

    public function setPlace(string $place): static
    {
        $this->place = $place;

        return $this;
    }

    public function getMedicalReport(): ?MedicalReport
    {
        return $this->medicalReport;
    }

    public function setMedicalReport(?MedicalReport $medicalReport): static
    {
        $this->medicalReport = $medicalReport;

        return $this;
    }

    public function getPatientUser(): ?PatientUser
    {
        return $this->patientUser;
    }

    public function setPatientUser(?PatientUser $patientUser): static
    {
        $this->patientUser = $patientUser;

        return $this;
    }

    /**
     * @return Collection<int, TypeOfActs>
     */
    public function getTypeOfActs(): Collection
    {
        return $this->typeOfActs;
    }

    public function addTypeOfAct(TypeOfActs $typeOfAct): static
    {
        if (!$this->typeOfActs->contains($typeOfAct)) {
            $this->typeOfActs->add($typeOfAct);
            $typeOfAct->setAppointment($this);
        }

        return $this;
    }

    public function removeTypeOfAct(TypeOfActs $typeOfAct): static
    {
        if ($this->typeOfActs->removeElement($typeOfAct)) {
            // set the owning side to null (unless already changed)
            if ($typeOfAct->getAppointment() === $this) {
                $typeOfAct->setAppointment(null);
            }
        }

        return $this;
    }
}
