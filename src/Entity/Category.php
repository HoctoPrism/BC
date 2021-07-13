<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Category
 *
 * @ORM\Table(name="category", indexes={@ORM\Index(name="idCategoryParent", columns={"idCategoryParent"})})
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="App\Repository\CategoryRepository")
 */
class Category
{
    /**
     * @var int
     *
     * @ORM\Column(name="idCategory", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idcategory;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nameCategory", type="string", length=50, nullable=true)
     */
    private $namecategory;

    /**
     * @var \Category
     *
     * @ORM\ManyToOne(targetEntity="Category")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idCategoryParent", referencedColumnName="idCategory")
     * })
     */
    private $idcategoryparent;

    public function getIdcategory(): ?int
    {
        return $this->idcategory;
    }

    public function getNamecategory(): ?string
    {
        return $this->namecategory;
    }

    public function setNamecategory(?string $namecategory): self
    {
        $this->namecategory = $namecategory;

        return $this;
    }

    public function getIdcategoryparent(): ?self
    {
        return $this->idcategoryparent;
    }

    public function setIdcategoryparent(?self $idcategoryparent): self
    {
        $this->idcategoryparent = $idcategoryparent;

        return $this;
    }

    public function __toString()
    {
        return $this->idcategory;
    }
}
