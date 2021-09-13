<?php

namespace App\Entity;

use App\Repository\ProductOrderRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;


/**
 * @ORM\Entity(repositoryClass=ProductOrderRepository::class)
 * @ApiResource()
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
     * @ORM\ManyToOne(targetEntity=Product::class, inversedBy="productOrders", fetch="EAGER")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idProduct", referencedColumnName="idProduct")
     * })
     */
    private $productid;

    /**
     * @ORM\ManyToOne(targetEntity=Orders::class, inversedBy="productOrders", fetch="EAGER")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idOrder", referencedColumnName="idOrder")
     * })
     */
    private $orderid;

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

    public function getIdproduct(): ?Product
    {
        return $this->productid;
    }

    public function setIdproduct(?Product $productid): self
    {
        $this->productid = $productid;

        return $this;
    }

    public function getIdorder(): ?Orders
    {
        return $this->orderid;
    }

    public function setIdorder(?Orders $orderid): self
    {
        $this->orderid = $orderid;

        return $this;
    }
}
