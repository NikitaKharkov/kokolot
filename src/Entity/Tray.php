<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TrayTypeRepository")
 */
class Tray
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $size;

    /**
     * Regular egg, quail egg for now
     *
     * @ORM\Column(type="string", length=255)
     */
    private $productType;

    /**
     * Array of imageUrl
     *
     * @ORM\Column(type="json")
     */
    private $imageUrl;

    /**
     * @ORM\Column(type="integer")
     */
    private $wholeSalePrice;

    /**
     * @ORM\Column(type="integer")
     */
    private $retailPrice;

    /**
     * @ORM\ManyToMany(targetEntity="Container")
     */
    private $containers;

    public function __construct()
    {
        $this->containers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getSize(): ?int
    {
        return $this->size;
    }

    public function setSize(?int $size): self
    {
        $this->size = $size;

        return $this;
    }

    public function getProductType()
    {
        return $this->productType;
    }

    public function setProductType($productType): self
    {
        $this->productType = $productType;

        return $this;
    }

    public function getImageUrl()
    {
        return $this->imageUrl;
    }

    public function setImageUrl($imageUrl): self
    {
        $this->imageUrl = $imageUrl;

        return $this;
    }

    public function getWholeSalePrice()
    {
        return $this->wholeSalePrice;
    }

    public function setWholeSalePrice($wholeSalePrice): self
    {
        $this->wholeSalePrice = $wholeSalePrice;

        return $this;
    }

    public function getRetailPrice()
    {
        return $this->retailPrice;
    }

    public function setRetailPrice($retailPrice): self
    {
        $this->retailPrice = $retailPrice;

        return $this;
    }

    public function getContainers(): ArrayCollection
    {
        return $this->containers;
    }

    public function addContainer(Container $container): self
    {
        $this->containers->add($container);

        return $this;
    }

    public function removeContainer(Container $container): self
    {
        $this->containers->remove($container);

        return $this;
    }
}
