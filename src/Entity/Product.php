<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Product
 *
 * @ORM\Table(name="product", indexes={@ORM\Index(name="idCategory", columns={"idCategory"})})
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="App\Repository\ProductRepository")
 * 
 * @ApiResource(attributes={
 *   "normalization_context"={"groups"={"read"}},
 *   "denormalization_context"={"groups"={"write"}},
 * })
 */
class Product
{
    /**
     * @var int
     *
     * @ORM\Column(name="idProduct", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Groups({"read"})
     */
    private $idproduct;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nameProduct", type="string", length=100, nullable=true)
     * @Groups({"read", "write"})
     * 
     */
    private $nameproduct;

    /**
     * @var string|null
     *
     * @ORM\Column(name="brandProduct", type="string", length=50, nullable=true)
     * @Groups({"read", "write"})
     * 
     */
    private $brandproduct;

    /**
     * @var string|null
     *
     * @ORM\Column(name="descriptionProduct", type="string", length=5000, nullable=true)
     * @Groups({"read", "write"})
     * 
     */
    private $descriptionproduct;

    /**
     * @var string|null
     *
     * @ORM\Column(name="htProduct", type="decimal", precision=15, scale=2, nullable=true)
     * @Groups({"read", "write"})
     * 
     */
    private $htproduct;

    /**
     * @var string|null
     *
     * @ORM\Column(name="qtyProduct", type="decimal", precision=15, scale=2, nullable=true)
     * @Groups({"read", "write"})
     * 
     */
    private $qtyproduct;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="isActive", type="boolean", nullable=true)
     * @Groups({"read", "write"})
     * 
     */
    private $isactive;

    /**
     * @var string|null
     *
     * @ORM\Column(name="quickDescript", type="string", length=3000, nullable=true)
     * @Groups({"read", "write"})
     * 
     */
    private $quickdescript;

    /**
     * @var string|null
     *
     * @ORM\Column(name="saveur", type="string", length=50, nullable=true)
     * @Groups({"read", "write"})
     * 
     */
    private $saveur;

    /**
     * @var string|null
     *
     * @ORM\Column(name="composition", type="string", length=2000, nullable=true)
     * @Groups({"read", "write"})
     * 
     */
    private $composition;

    /**
     * @var \Category
     *
     * @ORM\ManyToOne(targetEntity="Category")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idCategory", referencedColumnName="idCategory")
     * })
     * @Groups({"read", "write"})
     * 
     */
    private $idcategory;

    /**
     * @ORM\Column(type="string", length=1000, nullable=true)
     * @Groups({"read", "write"})
     * 
     */
    private $descriptionProduct2;

    /**
     * @ORM\Column(type="string", length=1000, nullable=true)
     * @Groups({"read", "write"})
     * 
     */
    private $descriptionProduct3;

    /**
     * @ORM\Column(type="string", length=1000, nullable=true)
     * @Groups({"read", "write"})
     * 
     */
    private $descriptionProduct4;

    /**
     * @ORM\OneToMany(targetEntity=ProductOrder::class, mappedBy="productid")
     * @Groups({"read", "write"})
     * 
     */
    private $productOrders;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image1;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image3;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image4;

    public function __construct()
    {
        $this->productOrders = new ArrayCollection();
    }

    public function getIdproduct(): ?int
    {
        return $this->idproduct;
    }

    public function getNameproduct(): ?string
    {
        return $this->nameproduct;
    }

    public function setNameproduct(?string $nameproduct): self
    {
        $this->nameproduct = $nameproduct;

        return $this;
    }

    public function getBrandproduct(): ?string
    {
        return $this->brandproduct;
    }

    public function setBrandproduct(?string $brandproduct): self
    {
        $this->brandproduct = $brandproduct;

        return $this;
    }

    public function getDescriptionproduct(): ?string
    {
        return $this->descriptionproduct;
    }

    public function setDescriptionproduct(?string $descriptionproduct): self
    {
        $this->descriptionproduct = $descriptionproduct;

        return $this;
    }

    public function getHtproduct(): ?string
    {
        return $this->htproduct;
    }

    public function setHtproduct(?string $htproduct): self
    {
        $this->htproduct = $htproduct;

        return $this;
    }

    public function getQtyproduct(): ?string
    {
        return $this->qtyproduct;
    }

    public function setQtyproduct(?string $qtyproduct): self
    {
        $this->qtyproduct = $qtyproduct;

        return $this;
    }

    public function getIsactive(): ?bool
    {
        return $this->isactive;
    }

    public function setIsactive(?bool $isactive): self
    {
        $this->isactive = $isactive;

        return $this;
    }

    public function getQuickdescript(): ?string
    {
        return $this->quickdescript;
    }

    public function setQuickdescript(?string $quickdescript): self
    {
        $this->quickdescript = $quickdescript;

        return $this;
    }

    public function getSaveur(): ?string
    {
        return $this->saveur;
    }

    public function setSaveur(?string $saveur): self
    {
        $this->saveur = $saveur;

        return $this;
    }

    public function getComposition(): ?string
    {
        return $this->composition;
    }

    public function setComposition(?string $composition): self
    {
        $this->composition = $composition;

        return $this;
    }

    public function getIdcategory(): ?Category
    {
        return $this->idcategory;
    }

    public function setIdcategory(?Category $idcategory): self
    {
        $this->idcategory = $idcategory;

        return $this;
    }

    public function getDescriptionProduct2(): ?string
    {
        return $this->descriptionProduct2;
    }

    public function setDescriptionProduct2(?string $descriptionProduct2): self
    {
        $this->descriptionProduct2 = $descriptionProduct2;

        return $this;
    }

    public function getDescriptionProduct3(): ?string
    {
        return $this->descriptionProduct3;
    }

    public function setDescriptionProduct3(?string $descriptionProduct3): self
    {
        $this->descriptionProduct3 = $descriptionProduct3;

        return $this;
    }

    public function getDescriptionProduct4(): ?string
    {
        return $this->descriptionProduct4;
    }

    public function setDescriptionProduct4(?string $descriptionProduct4): self
    {
        $this->descriptionProduct4 = $descriptionProduct4;

        return $this;
    }

    /**
     * @return Collection|ProductOrder[]
     */
    public function getProductOrders(): Collection
    {
        return $this->productOrders;
    }

    public function addProductOrder(ProductOrder $productOrder): self
    {
        if (!$this->productOrders->contains($productOrder)) {
            $this->productOrders[] = $productOrder;
            $productOrder->setIdproduct($this);
        }

        return $this;
    }

    public function removeProductOrder(ProductOrder $productOrder): self
    {
        if ($this->productOrders->removeElement($productOrder)) {
            // set the owning side to null (unless alprouty changed)
            if ($productOrder->getIdproduct() === $this) {
                $productOrder->setIdproduct(null);
            }
        }

        return $this;
    }

    public function getImage1(): ?string
    {
        return $this->image1;
    }

    public function setImage1(string $image1): self
    {
        $this->image1 = $image1;

        return $this;
    }

    public function getImage2(): ?string
    {
        return $this->image2;
    }

    public function setImage2(?string $image2): self
    {
        $this->image2 = $image2;

        return $this;
    }

    public function getImage3(): ?string
    {
        return $this->image3;
    }

    public function setImage3(?string $image3): self
    {
        $this->image3 = $image3;

        return $this;
    }

    public function getImage4(): ?string
    {
        return $this->image4;
    }

    public function setImage4(?string $image4): self
    {
        $this->image4 = $image4;

        return $this;
    }


}
