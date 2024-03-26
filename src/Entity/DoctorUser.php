<?php

namespace App\Entity;

use App\Repository\DoctorUserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity(repositoryClass: DoctorUserRepository::class)]
class DoctorUser extends User
{

    #[ORM\GeneratedValue]




    #[ORM\Column]
    private ?int $RPPSNumber = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $CvDoctorUser = null;

    #[ORM\Column(length: 255)]
    private ?string $pictureDoctorUser = null;

    #[ORM\OneToMany(targetEntity: Speciality::class, mappedBy: 'Id_Speciality')]
    private Collection $speciality;

    #[ORM\ManyToMany(targetEntity: MedicalReport::class, inversedBy: 'doctorUsers')]
    private Collection $medicalReport;

    public function __construct()
    {
        $this->speciality = new ArrayCollection();
        $this->medicalReport = new ArrayCollection();
    }



    public function getRPPSNumber(): ?int
    {
        return $this->RPPSNumber;
    }

    public function setRPPSNumber(int $RPPSNumber): static
    {
        $this->RPPSNumber = $RPPSNumber;

        return $this;
    }

    public function getCvDoctorUser(): ?string
    {
        return $this->CvDoctorUser;
    }

    public function setCvDoctorUser(string $CvDoctorUser): static
    {
        $this->CvDoctorUser = $CvDoctorUser;

        return $this;
    }

    public function getPictureDoctorUser(): ?string
    {
        return $this->pictureDoctorUser;
    }

    public function setPictureDoctorUser(string $pictureDoctorUser): static
    {
        $this->pictureDoctorUser = $pictureDoctorUser;

        return $this;
    }

    /**
     * @return Collection<int, Speciality>
     */
    public function getSpeciality(): Collection
    {
        return $this->speciality;
    }

    public function addSpeciality(Speciality $speciality): static
    {
        if (!$this->speciality->contains($speciality)) {
            $this->speciality->add($speciality);
            $speciality->setIdSpeciality($this);
        }

        return $this;
    }

    public function removeSpeciality(Speciality $speciality): static
    {
        if ($this->speciality->removeElement($speciality)) {
            // set the owning side to null (unless already changed)
            if ($speciality->getIdSpeciality() === $this) {
                $speciality->setIdSpeciality(null);
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
}
