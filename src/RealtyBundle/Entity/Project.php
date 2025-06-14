<?php

namespace App\RealtyBundle\Entity;

use App\RealtyBundle\Entity\Country;
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

    #[ORM\ManyToOne(targetEntity: Country::class)]
    private ?Country $country = null;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private ?string $region = null;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private ?string $city = null;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private ?string $district = null;


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

    /**
     * @return \App\RealtyBundle\Entity\Country|null
     */
    public function getCountry(): ?\App\RealtyBundle\Entity\Country
    {
        return $this->country;
    }

    /**
     * @param \App\RealtyBundle\Entity\Country|null $country
     */
    public function setCountry(?\App\RealtyBundle\Entity\Country $country): void
    {
        $this->country = $country;
    }

    /**
     * @return string|null
     */
    public function getRegion(): ?string
    {
        return $this->region;
    }

    /**
     * @param string|null $region
     */
    public function setRegion(?string $region): void
    {
        $this->region = $region;
    }

    /**
     * @return string|null
     */
    public function getCity(): ?string
    {
        return $this->city;
    }

    /**
     * @param string|null $city
     */
    public function setCity(?string $city): void
    {
        $this->city = $city;
    }

    /**
     * @return string|null
     */
    public function getDistrict(): ?string
    {
        return $this->district;
    }

    /**
     * @param string|null $district
     */
    public function setDistrict(?string $district): void
    {
        $this->district = $district;
    }

    public function __toString(): string
    {
        return $this->getName() ?? 'n/a'; // or any suitable property like code, title, etc.
    }
}