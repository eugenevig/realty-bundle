<?php

namespace App\RealtyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\RealtyBundle\Repository\ProjectRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use App\RealtyBundle\Entity\Building;

#[ORM\Entity(repositoryClass: ProjectRepository::class)]
class Project
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
    private string $name;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $description = null;

    #[ORM\Column(type: 'json', nullable: true)]
    private ?array $gallery = [];

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $seoTitle = null;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $seoDescription = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $slug = null;

    #[ORM\OneToMany(mappedBy: 'project', targetEntity: Building::class, cascade: ['persist'], orphanRemoval: true)]
    private Collection $buildings;

    public function __construct()
    {
        $this->buildings = new ArrayCollection();
    }

    public function getBuildings(): Collection
    {
        return $this->buildings;
    }

    public function addBuilding(Building $building): self
    {
        if (!$this->buildings->contains($building)) {
            $this->buildings[] = $building;
            $building->setProject($this);
        }

        return $this;
    }

    public function removeBuilding(Building $building): self
    {
        if ($this->buildings->removeElement($building)) {
            if ($building->getProject() === $this) {
                $building->setProject(null);
            }
        }

        return $this;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($value) {
        $this->id = $value;
        return $this;
    }

    public function getInternalId() {
        return $this->internalId;
    }

    public function setInternalId($value) {
        $this->internalId = $value;
        return $this;
    }

    public function getExternalId() {
        return $this->externalId;
    }

    public function setExternalId($value) {
        $this->externalId = $value;
        return $this;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($value) {
        $this->name = $value;
        return $this;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($value) {
        $this->description = $value;
        return $this;
    }

    public function getGallery() {
        return $this->gallery;
    }

    public function setGallery($value) {
        $this->gallery = $value;
        return $this;
    }

    public function getSeoTitle() {
        return $this->seoTitle;
    }

    public function setSeoTitle($value) {
        $this->seoTitle = $value;
        return $this;
    }

    public function getSeoDescription() {
        return $this->seoDescription;
    }

    public function setSeoDescription($value) {
        $this->seoDescription = $value;
        return $this;
    }

    public function getSlug() {
        return $this->slug;
    }

    public function setSlug($value) {
        $this->slug = $value;
        return $this;
    }

    

    public function setBuildings($value) {
        $this->buildings = $value;
        return $this;
    }
}
