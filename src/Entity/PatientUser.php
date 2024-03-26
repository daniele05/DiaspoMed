<?php

namespace App\Entity;

use App\Repository\PatientUserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PatientUserRepository::class)]
class PatientUser extends User
{

    #[ORM\GeneratedValue]



    #[ORM\Column(length: 255)]
    private ?string $picturePatientUser = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $birthDatePatientUser = null;

    #[ORM\OneToMany(targetEntity: Appointment::class, mappedBy: 'patientUser')]
    private Collection $appointment;

    public function __construct()
    {
        $this->appointment = new ArrayCollection();
    }


    public function getPicturePatientUser(): ?string
    {
        return $this->picturePatientUser;
    }

    public function setPicturePatientUser(string $picturePatientUser): static
    {
        $this->picturePatientUser = $picturePatientUser;

        return $this;
    }

    public function getBirthDatePatientUser(): ?\DateTimeInterface
    {
        return $this->birthDatePatientUser;
    }

    public function setBirthDatePatientUser(\DateTimeInterface $birthDatePatientUser): static
    {
        $this->birthDatePatientUser = $birthDatePatientUser;

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
            $appointment->setPatientUser($this);
        }

        return $this;
    }

    public function removeAppointment(Appointment $appointment): static
    {
        if ($this->appointment->removeElement($appointment)) {
            // set the owning side to null (unless already changed)
            if ($appointment->getPatientUser() === $this) {
                $appointment->setPatientUser(null);
            }
        }

        return $this;
    }
}
