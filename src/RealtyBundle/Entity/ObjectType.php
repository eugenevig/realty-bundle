<?php

namespace App\RealtyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\RealtyBundle\Repository\ObjectTypeRepository;

#[ORM\Entity(repositoryClass: ObjectTypeRepository::class)]
class ObjectType
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string', length: 255)]
    private string $name;
}
