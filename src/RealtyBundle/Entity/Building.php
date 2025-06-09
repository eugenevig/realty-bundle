<?php

namespace App\RealtyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\RealtyBundle\Repository\BuildingRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use App\RealtyBundle\Entity\Project;
use App\RealtyBundle\Entity\RealEstateObject;

#[ORM\Entity(repositoryClass: BuildingRepository::class)]
class Building
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

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

    #[ORM\ManyToOne(targetEntity: Project::class, inversedBy: 'buildings')]
    #[ORM\JoinColumn(nullable: false)]
    private Project $project;

    #[ORM\OneToMany(mappedBy: 'building', targetEntity: RealEstateObject::class, cascade: ['persist'], orphanRemoval: true)]
    private Collection $realEstateObjects;

    public function __construct()
    {
        $this->realEstateObjects = new ArrayCollection();
    }

    public function getProject(): Project
    {
        return $this->project;
    }

    public function setProject(Project $project): self
    {
        $this->project = $project;
        return $this;
    }

    public function getRealEstateObjects(): Collection
    {
        return $this->realEstateObjects;
    }

    public function addRealEstateObject(RealEstateObject $object): self
    {
        if (!$this->realEstateObjects->contains($object)) {
            $this->realEstateObjects[] = $object;
            $object->setBuilding($this);
        }

        return $this;
    }

    public function removeRealEstateObject(RealEstateObject $object): self
    {
        if ($this->realEstateObjects->removeElement($object)) {
            if ($object->getBuilding() === $this) {
                $object->setBuilding(null);
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

    public function getSection() {
        return $this->section;
    }

    public function setSection($value) {
        $this->section = $value;
        return $this;
    }

    public function getBuildingNumber() {
        return $this->buildingNumber;
    }

    public function setBuildingNumber($value) {
        $this->buildingNumber = $value;
        return $this;
    }

    public function getCountry() {
        return $this->country;
    }

    public function setCountry($value) {
        $this->country = $value;
        return $this;
    }

    public function getRegion() {
        return $this->region;
    }

    public function setRegion($value) {
        $this->region = $value;
        return $this;
    }

    public function getCity() {
        return $this->city;
    }

    public function setCity($value) {
        $this->city = $value;
        return $this;
    }

    public function getDistrict() {
        return $this->district;
    }

    public function setDistrict($value) {
        $this->district = $value;
        return $this;
    }

    public function getStreet() {
        return $this->street;
    }

    public function setStreet($value) {
        $this->street = $value;
        return $this;
    }

    public function getCoordinates() {
        return $this->coordinates;
    }

    public function setCoordinates($value) {
        $this->coordinates = $value;
        return $this;
    }

    public function getBuildingType() {
        return $this->buildingType;
    }

    public function setBuildingType($value) {
        $this->buildingType = $value;
        return $this;
    }

    public function getYearBuilt() {
        return $this->yearBuilt;
    }

    public function setYearBuilt($value) {
        $this->yearBuilt = $value;
        return $this;
    }

    public function getPlannedDeliveryDate() {
        return $this->plannedDeliveryDate;
    }

    public function setPlannedDeliveryDate($value) {
        $this->plannedDeliveryDate = $value;
        return $this;
    }

    public function getGallery() {
        return $this->gallery;
    }

    public function setGallery($value) {
        $this->gallery = $value;
        return $this;
    }

    public function setRealEstateObjects($value) {
        $this->realEstateObjects = $value;
        return $this;
    }
}
