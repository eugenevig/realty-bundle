<?php

namespace App\RealtyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\RealtyBundle\Repository\RoomRepository;
use App\RealtyBundle\Entity\RealEstateObject;
use App\RealtyBundle\Entity\RoomDefinition;

#[ORM\Entity(repositoryClass: RoomRepository::class)]
class Room
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\ManyToOne(targetEntity: RealEstateObject::class)]
    #[ORM\JoinColumn(nullable: false)]
    private RealEstateObject $realEstateObject;

    #[ORM\ManyToOne(targetEntity: RoomDefinition::class)]
    #[ORM\JoinColumn(nullable: false)]
    private RoomDefinition $roomDefinition;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $customName = null;

    #[ORM\Column(type: 'float', nullable: true)]
    private ?float $area = null;

    #[ORM\Column(type: 'json', nullable: true)]
    private ?array $gallery = [];

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

    public function getRoomDefinition() {
        return $this->roomDefinition;
    }

    public function setRoomDefinition($value) {
        $this->roomDefinition = $value;
        return $this;
    }

    public function getCustomName() {
        return $this->customName;
    }

    public function setCustomName($value) {
        $this->customName = $value;
        return $this;
    }

    public function getArea() {
        return $this->area;
    }

    public function setArea($value) {
        $this->area = $value;
        return $this;
    }

    public function getGallery() {
        return $this->gallery;
    }

    public function setGallery($value) {
        $this->gallery = $value;
        return $this;
    }

    public function __toString(): string
    {
        return $this->name ?? 'n/a';
    }
}
