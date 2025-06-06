<?php

namespace App\RealtyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\RealtyBundle\Repository\AttributeRepository;

#[ORM\Entity(repositoryClass: AttributeRepository::class)]
class Attribute
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string', length: 255)]
    private string $name;

    #[ORM\Column(type: 'string', length: 50)]
    private string $inputType;

    #[ORM\Column(type: 'boolean')]
    private bool $isFilterable;

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $sortOrder = null;

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getInputType(): string
    {
        return $this->inputType;
    }

    public function setInputType(string $inputType): self
    {
        $this->inputType = $inputType;
        return $this;
    }

    public function isFilterable(): bool
    {
        return $this->isFilterable;
    }

    public function setIsFilterable(bool $isFilterable): self
    {
        $this->isFilterable = $isFilterable;
        return $this;
    }

    public function getSortOrder(): ?int
    {
        return $this->sortOrder;
    }

    public function setSortOrder(?int $sortOrder): self
    {
        $this->sortOrder = $sortOrder;
        return $this;
    }

    public function __toString(): string
    {
        return $this->name ?? '—';
    }
}
