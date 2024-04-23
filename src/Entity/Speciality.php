<?php

namespace App\Entity;

use App\Repository\SpecialityRepository;
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
    }


    #[ORM\Column(type: Types::TEXT)]
    private ?string $specialityContent = null;

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
}
