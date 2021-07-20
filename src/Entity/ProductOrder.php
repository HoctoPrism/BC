<?php

namespace App\Entity;

use App\Repository\ProductOrderRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=ProductOrderRepository::class)
 */
class ProductOrder
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantity;

    /**
     * @ORM\ManyToOne(targetEntity=product::class, inversedBy="productOrders")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idProduct", referencedColumnName="idProduct")
     * })
     */
    private $product;

    /**
     * @ORM\ManyToOne(targetEntity=orders::class, inversedBy="productOrders")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idOrder", referencedColumnName="idOrder")
     * })
     */
    private $order;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getIdproduct(): ?product
    {
        return $this->product;
    }

    public function setIdproduct(?product $product): self
    {
        $this->product = $product;

        return $this;
    }

    public function getIdorder(): ?orders
    {
        return $this->order;
    }

    public function setIdorder(?orders $order): self
    {
        $this->order = $order;

        return $this;
    }
}
