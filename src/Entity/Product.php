<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Product
 *
 * @ORM\Table(name="product", indexes={@ORM\Index(name="idCategory", columns={"idCategory"})})
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="App\Repository\ProductRepository")
 */
class Product
{
    /**
     * @var int
     *
     * @ORM\Column(name="idProduct", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idproduct;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nameProduct", type="string", length=100, nullable=true)
     */
    private $nameproduct;

    /**
     * @var string|null
     *
     * @ORM\Column(name="brandProduct", type="string", length=50, nullable=true)
     */
    private $brandproduct;

    /**
     * @var string|null
     *
     * @ORM\Column(name="descriptionProduct", type="string", length=5000, nullable=true)
     */
    private $descriptionproduct;

    /**
     * @var string|null
     *
     * @ORM\Column(name="htProduct", type="decimal", precision=15, scale=2, nullable=true)
     */
    private $htproduct;

    /**
     * @var string|null
     *
     * @ORM\Column(name="qtyProduct", type="decimal", precision=15, scale=2, nullable=true)
     */
    private $qtyproduct;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="isActive", type="boolean", nullable=true)
     */
    private $isactive;

    /**
     * @var string|null
     *
     * @ORM\Column(name="quickDescript", type="string", length=3000, nullable=true)
     */
    private $quickdescript;

    /**
     * @var string|null
     *
     * @ORM\Column(name="saveur", type="string", length=50, nullable=true)
     */
    private $saveur;

    /**
     * @var string|null
     *
     * @ORM\Column(name="composition", type="string", length=2000, nullable=true)
     */
    private $composition;

    /**
     * @var \Category
     *
     * @ORM\ManyToOne(targetEntity="Category")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idCategory", referencedColumnName="idCategory")
     * })
     */
    private $idcategory;

    /**
     * @ORM\Column(type="string", length=1000, nullable=true)
     */
    private $descriptionProduct2;

    /**
     * @ORM\Column(type="string", length=1000, nullable=true)
     */
    private $descriptionProduct3;

    /**
     * @ORM\Column(type="string", length=1000, nullable=true)
     */
    private $descriptionProduct4;

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


}
