<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\BasketRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BasketRepository::class)
 */
#[ApiResource]
class Basket
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity=Product::class, mappedBy="idproduct")
     */
    private $idproduct;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantity;

    public function __construct()
    {
        $this->idproduct = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Product[]
     */
    public function getIdproduct(): Collection
    {
        return $this->idproduct;
    }

    public function addIdproduct(Product $idproduct): self
    {
        if (!$this->idproduct->contains($idproduct)) {
            $this->idproduct[] = $idproduct;
        }

        return $this;
    }

    public function removeIdproduct(Product $idproduct): self
    {
        $this->idproduct->removeElement($idproduct);

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }
}
