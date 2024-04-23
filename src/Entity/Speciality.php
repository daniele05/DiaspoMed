<?php

namespace App\Entity;

use App\Repository\SpecialityRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\UploadedFile;
#use MongoDB\BSON\Type;

#[ORM\Entity(repositoryClass: SpecialityRepository::class)]
#[Vich\Uploadable]
class Speciality
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $specialityImage = null;

    #[ORM\Column(length: 150)]
    private ?string $specialityName = null;

    #[Vich\UploadableField(mapping: "speciality_images" , fileNameProperty: "specialityImage")]
    private File $specialityImageFile;
    public function __construct(){
        $this->specialityImageFile = new File("specialityImage");
        $this->doctors = new ArrayCollection();
    }


    #[ORM\Column(type: Types::TEXT)]
    private ?string $specialityContent = null;

    #[ORM\OneToMany(targetEntity: Doctor::class, mappedBy: 'speciality')]
    private Collection $doctors;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSpecialityImage(): ?string
    {
        return $this->specialityImage;
    }

    public function setSpecialityImage(string $specialityImage): static
    {
        $this->specialityImage = $specialityImage;

        return $this;
    }

    public function getSpecialityImageFile(): File
    {
        return $this->specialityImageFile;
    }

    public function setSpecialityImageFile(File $specialityImageFile = null): self
    {
        $this->specialityImageFile = $specialityImageFile;
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

    /**
     * @return Collection<int, Doctor>
     */
    public function getDoctors(): Collection
    {
        return $this->doctors;
    }

    public function addDoctor(Doctor $doctor): static
    {
        if (!$this->doctors->contains($doctor)) {
            $this->doctors->add($doctor);
            $doctor->setSpeciality($this);
        }

        return $this;
    }

    public function removeDoctor(Doctor $doctor): static
    {
        if ($this->doctors->removeElement($doctor)) {
            // set the owning side to null (unless already changed)
            if ($doctor->getSpeciality() === $this) {
                $doctor->setSpeciality(null);
            }
        }

        return $this;
    }
}
