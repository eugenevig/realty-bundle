<?php

namespace App\RealtyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\RealtyBundle\Repository\RoomRepository;
use App\Entity\RealEstateObject;
use App\Entity\RoomDefinition;

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
}
