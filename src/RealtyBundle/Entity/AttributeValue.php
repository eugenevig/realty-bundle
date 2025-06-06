<?php

namespace App\RealtyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\RealtyBundle\Repository\AttributeValueRepository;
use App\RealtyBundle\Entity\Attribute;
use App\RealtyBundle\Entity\RealEstateObject;

#[ORM\Entity(repositoryClass: AttributeValueRepository::class)]
class AttributeValue
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\ManyToOne(targetEntity: Attribute::class)]
    #[ORM\JoinColumn(nullable: false)]
    private Attribute $attribute;

    #[ORM\ManyToOne(targetEntity: RealEstateObject::class)]
    #[ORM\JoinColumn(nullable: false)]
    private RealEstateObject $realEstateObject;

    #[ORM\Column(type: 'string', length: 255)]
    private string $value;

    public function getId(): int
    {
        return $this->id;
    }

    public function getAttribute(): Attribute
    {
        return $this->attribute;
    }

    public function setAttribute(Attribute $attribute): self
    {
        $this->attribute = $attribute;
        return $this;
    }

    public function getRealEstateObject(): RealEstateObject
    {
        return $this->realEstateObject;
    }

    public function setRealEstateObject(RealEstateObject $realEstateObject): self
    {
        $this->realEstateObject = $realEstateObject;
        return $this;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function setValue(string $value): self
    {
        $this->value = $value;
        return $this;
    }
}
