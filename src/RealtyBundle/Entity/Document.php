<?php

namespace App\RealtyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\RealtyBundle\Repository\DocumentRepository;
use App\RealtyBundle\Entity\RealEstateObject;

#[ORM\Entity(repositoryClass: DocumentRepository::class)]
class Document
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\ManyToOne(targetEntity: RealEstateObject::class)]
    #[ORM\JoinColumn(nullable: false)]
    private RealEstateObject $realEstateObject;

    #[ORM\Column(type: 'string', length: 255)]
    private string $title;

    #[ORM\Column(type: 'string', length: 255)]
    private string $filePath;

    public function getId() {
        return $this->id;
    }

    public function setId($value) {
        $this->id = $value;
        return $this;
    }

    public function getRealEstateObject() {
        return $this->realEstateObject;
    }

    public function setRealEstateObject($value) {
        $this->realEstateObject = $value;
        return $this;
    }

    public function getTitle() {
        return $this->title;
    }

    public function setTitle($value) {
        $this->title = $value;
        return $this;
    }

    public function getFilePath() {
        return $this->filePath;
    }

    public function setFilePath($value) {
        $this->filePath = $value;
        return $this;
    }
}
