<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\RoomDefinitionRepository;

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
}
