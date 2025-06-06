<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\AttributeRepository;

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

    #[ORM\Column(type: 'boolean', options: ['default' => false])]
    private bool $isFilterable = false;

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $sortOrder = null;
}
