<?php

namespace App\RealtyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\RealtyBundle\Repository\RenovationTypeRepository;

#[ORM\Entity(repositoryClass: RenovationTypeRepository::class)]
class RenovationType
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string', length: 255)]
    private string $name;
}
