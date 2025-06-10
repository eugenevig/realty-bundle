<?php

namespace App\RealtyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\RealtyBundle\Repository\RealEstateObjectRepository;
use App\RealtyBundle\Entity\Building;

#[ORM\Entity(repositoryClass: RealEstateObjectRepository::class)]
class RealEstateObject
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

    #[ORM\Column(type: 'string', length: 255)]
    private string $objectId;

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $floor = null;

    #[ORM\Column(type: 'json', nullable: true)]
    private ?array $orientation = [];

    #[ORM\Column(type: 'float', nullable: true)]
    private ?float $areaTotal = null;

    #[ORM\Column(type: 'float', nullable: true)]
    private ?float $ceilingHeight = null;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2, nullable: true)]
    private ?string $price = null;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2, nullable: true)]
    private ?string $pricePerSqm = null;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2, nullable: true)]
    private ?string $discount = null;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $discountValidUntil = null;

    #[ORM\Column(type: 'string', length: 10, nullable: true)]
    private ?string $currency = null;

    #[ORM\Column(type: 'datetime')]
    private \DateTimeInterface $createdAt;

    #[ORM\Column(type: 'datetime')]
    private \DateTimeInterface $updatedAt;

    #[ORM\ManyToOne(targetEntity: Building::class, inversedBy: 'realEstateObjects')]
    #[ORM\JoinColumn(nullable: true)]
    private ?Building $building = null;

    public function getBuilding(): ?Building
    {
        return $this->building;
    }

    public function setBuilding(?Building $building): self
    {
        $this->building = $building;
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

    public function getObjectId() {
        return $this->objectId;
    }

    public function setObjectId($value) {
        $this->objectId = $value;
        return $this;
    }

    public function getFloor() {
        return $this->floor;
    }

    public function setFloor($value) {
        $this->floor = $value;
        return $this;
    }

    public function getOrientation() {
        return $this->orientation;
    }

    public function setOrientation($value) {
        $this->orientation = $value;
        return $this;
    }

    public function getAreaTotal() {
        return $this->areaTotal;
    }

    public function setAreaTotal($value) {
        $this->areaTotal = $value;
        return $this;
    }

    public function getCeilingHeight() {
        return $this->ceilingHeight;
    }

    public function setCeilingHeight($value) {
        $this->ceilingHeight = $value;
        return $this;
    }

    public function getPrice() {
        return $this->price;
    }

    public function setPrice($value) {
        $this->price = $value;
        return $this;
    }

    public function getPricePerSqm() {
        return $this->pricePerSqm;
    }

    public function setPricePerSqm($value) {
        $this->pricePerSqm = $value;
        return $this;
    }

    public function getDiscount() {
        return $this->discount;
    }

    public function setDiscount($value) {
        $this->discount = $value;
        return $this;
    }

    public function getDiscountValidUntil() {
        return $this->discountValidUntil;
    }

    public function setDiscountValidUntil($value) {
        $this->discountValidUntil = $value;
        return $this;
    }

    public function getCurrency() {
        return $this->currency;
    }

    public function setCurrency($value) {
        $this->currency = $value;
        return $this;
    }

    public function getCreatedAt() {
        return $this->createdAt;
    }

    public function setCreatedAt($value) {
        $this->createdAt = $value;
        return $this;
    }

    public function getUpdatedAt() {
        return $this->updatedAt;
    }

    public function setUpdatedAt($value) {
        $this->updatedAt = $value;
        return $this;
    }

}
