<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\AttributeValueRepository;
use App\Entity\Attribute;
use App\Entity\RealEstateObject;

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

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $value = null;
}
