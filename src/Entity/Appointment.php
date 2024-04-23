<?php

namespace App\Entity;

use App\Repository\AppointmentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AppointmentRepository::class)]
class Appointment
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $content = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $scheduledDate = null;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'appointments')]
    #[ORM\JoinColumn( nullable: false)]
    private $user;
    
    #[ORM\OneToMany(targetEntity: TypeOfActs::class, mappedBy: 'appointment')]
    private Collection $typeOfActs;

    #[ORM\ManyToMany(targetEntity: MedicalReport::class, inversedBy: 'appointments')]
    private Collection $medicalReport;

    #[ORM\ManyToOne(inversedBy: 'appointments')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Doctor $doctor = null;

    public function __construct()
    {
        $this->typeOfActs = new ArrayCollection();
        $this->medicalReport = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): static
    {
        $this->content = $content;

        return $this;
    }


    public function getScheduledDate(): ?\DateTimeImmutable
    {
        return $this->scheduledDate;
    }

    public function setScheduledDate(\DateTimeImmutable $scheduledDate): static
    {
        $this->scheduledDate = $scheduledDate;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getUser():?User
    {
        return $this->user;
    }
    public function setUser(?User $user): self
    {
        $this->user = $user;
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

    /**
     * @return Collection<int, MedicalReport>
     */
    public function getMedicalReport(): Collection
    {
        return $this->medicalReport;
    }

    public function addMedicalReport(MedicalReport $medicalReport): static
    {
        if (!$this->medicalReport->contains($medicalReport)) {
            $this->medicalReport->add($medicalReport);
        }

        return $this;
    }

    public function removeMedicalReport(MedicalReport $medicalReport): static
    {
        $this->medicalReport->removeElement($medicalReport);

        return $this;
    }

    public function getDoctor(): ?Doctor
    {
        return $this->doctor;
    }

    public function setDoctor(?Doctor $doctor): static
    {
        $this->doctor = $doctor;

        return $this;
    }
}
