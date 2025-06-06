<?php

namespace App\RealtyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\RealtyBundle\Repository\DocumentRepository;
use App\Entity\RealEstateObject;

#[ORM\Entity(repositoryClass: DocumentRepository::class)]
class Document
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\ManyToOne(targetEntity: RealEstateObject::class)]
    #[ORM\JoinColumn(nullable: false)]
    private RealEstateObject $realEstateObject;

    #[ORM\Column(type: 'string', length: 255)]
    private string $title;

    #[ORM\Column(type: 'string', length: 255)]
    private string $filePath;
}
