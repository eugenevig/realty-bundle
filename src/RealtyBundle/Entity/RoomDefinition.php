<?php

namespace App\RealtyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\RealtyBundle\Repository\RoomDefinitionRepository;

#[ORM\Entity(repositoryClass: RoomDefinitionRepository::class)]
class RoomDefinition
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string', length: 255)]
    private string $name;

    #[ORM\Column(type: 'boolean', options: ['default' => true])]
    private bool $hasGallery = true;

    #[ORM\Column(type: 'boolean', options: ['default' => true])]
    private bool $hasArea = true;

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $sortOrder = null;

    public function getId() {
        return $this->id;
    }

    public function setId($value) {
        $this->id = $value;
        return $this;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($value) {
        $this->name = $value;
        return $this;
    }

    public function getHasGallery() {
        return $this->hasGallery;
    }

    public function setHasGallery($value) {
        $this->hasGallery = $value;
        return $this;
    }

    public function getHasArea() {
        return $this->hasArea;
    }

    public function setHasArea($value) {
        $this->hasArea = $value;
        return $this;
    }

    public function getSortOrder() {
        return $this->sortOrder;
    }

    public function setSortOrder($value) {
        $this->sortOrder = $value;
        return $this;
    }

    public function __toString(): string
    {
        return $this->name ?? 'n/a';
    }
}
