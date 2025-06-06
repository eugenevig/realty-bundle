<?php

namespace App\RealtyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\RealtyBundle\Repository\BuildingRepository;

#[ORM\Entity(repositoryClass: BuildingRepository::class)]
class Building
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string', length: 255)]
    private string $internalId;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $externalId = null;

    #[ORM\Column(type: 'string', length: 255)]
    private string $section;

    #[ORM\Column(type: 'string', length: 255)]
    private string $buildingNumber;

    #[ORM\Column(type: 'string', length: 255)]
    private string $country;

    #[ORM\Column(type: 'string', length: 255)]
    private string $region;

    #[ORM\Column(type: 'string', length: 255)]
    private string $city;

    #[ORM\Column(type: 'string', length: 255)]
    private string $district;

    #[ORM\Column(type: 'string', length: 255)]
    private string $street;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $coordinates = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $buildingType = null;

    #[ORM\Column(type: 'date', nullable: true)]
    private ?\DateTimeInterface $yearBuilt = null;

    #[ORM\Column(type: 'date', nullable: true)]
    private ?\DateTimeInterface $plannedDeliveryDate = null;

    #[ORM\Column(type: 'json', nullable: true)]
    private ?array $gallery = [];

    // TODO: Add ManyToOne relation to Project
    // TODO: Add OneToMany relation to RealEstateObject
}
