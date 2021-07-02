<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Imageproduct
 *
 * @ORM\Table(name="imageproduct", indexes={@ORM\Index(name="idProduct", columns={"idProduct"})})
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="App\Repository\ImageproductRepository")
 */
class Imageproduct
{
    /**
     * @var int
     *
     * @ORM\Column(name="idImage", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idimage;

    /**
     * @var string|null
     *
     * @ORM\Column(name="urlImage", type="string", length=50, nullable=true)
     */
    private $urlimage;

    /**
     * @var \Product
     *
     * @ORM\ManyToOne(targetEntity="Product")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idProduct", referencedColumnName="idProduct")
     * })
     */
    private $idproduct;

    public function getIdimage(): ?int
    {
        return $this->idimage;
    }

    public function getUrlimage(): ?string
    {
        return $this->urlimage;
    }

    public function setUrlimage(?string $urlimage): self
    {
        $this->urlimage = $urlimage;

        return $this;
    }

    public function getIdproduct(): ?Product
    {
        return $this->idproduct;
    }

    public function setIdproduct(?Product $idproduct): self
    {
        $this->idproduct = $idproduct;

        return $this;
    }


}
