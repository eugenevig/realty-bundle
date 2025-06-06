<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\RealEstateObjectRepository;

#[ORM\Entity(repositoryClass: RealEstateObjectRepository::class)]
class RealEstateObject
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $externalId = null;

    #[ORM\Column(type: 'string', length: 255)]
    private string $internalId;

    #[ORM\Column(type: 'string', length: 255)]
    private string $name;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $description = null;

    #[ORM\Column(type: 'string', length: 255)]
    private string $objectId;

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $floor = null;

    #[ORM\Column(type: 'json', nullable: true)]
    private ?array $orientation = [];

    #[ORM\Column(type: 'float', nullable: true)]
    private ?float $areaTotal = null;

    #[ORM\Column(type: 'float', nullable: true)]
    private ?float $ceilingHeight = null;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2, nullable: true)]
    private ?string $price = null;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2, nullable: true)]
    private ?string $pricePerSqm = null;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2, nullable: true)]
    private ?string $discount = null;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $discountValidUntil = null;

    #[ORM\Column(type: 'string', length: 10, nullable: true)]
    private ?string $currency = null;

    #[ORM\Column(type: 'datetime')]
    private \DateTimeInterface $createdAt;

    #[ORM\Column(type: 'datetime')]
    private \DateTimeInterface $updatedAt;

    // TODO: Add relations to Building, Type, Status, ListingType, RenovationType, Media, Rooms, Attributes, etc.
}
