<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * Address
 *
 * @ApiResource()
 * @ORM\Table(name="address", indexes={@ORM\Index(name="idUser", columns={"idUser"})})
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="App\Repository\AddressRepository")
 */
class Address
{
    /**
     * @var int
     *
     * @ORM\Column(name="idAdress", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idadress;

    /**
     * @var string|null
     *
     * @ORM\Column(name="typeAdress", type="string", length=50, nullable=true)
     */
    private $typeadress;

    /**
     * @var string|null
     *
     * @ORM\Column(name="postAdress", type="string", length=50, nullable=true)
     */
    private $postadress;

    /**
     * @var string|null
     *
     * @ORM\Column(name="postAdress2", type="string", length=50, nullable=true)
     */
    private $postadress2;

    /**
     * @var int|null
     *
     * @ORM\Column(name="cpAdress", type="integer", nullable=true)
     */
    private $cpadress;

    /**
     * @var string|null
     *
     * @ORM\Column(name="countryAdress", type="string", length=50, nullable=true)
     */
    private $countryadress;

    /**
     * @var \Useraccount
     *
     * @ORM\ManyToOne(targetEntity="Useraccount")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idUser", referencedColumnName="idUser")
     * })
     */
    private $iduser;

    public function getIdadress(): ?int
    {
        return $this->idadress;
    }

    public function getTypeadress(): ?string
    {
        return $this->typeadress;
    }

    public function setTypeadress(?string $typeadress): self
    {
        $this->typeadress = $typeadress;

        return $this;
    }

    public function getPostadress(): ?string
    {
        return $this->postadress;
    }

    public function setPostadress(?string $postadress): self
    {
        $this->postadress = $postadress;

        return $this;
    }

    public function getPostadress2(): ?string
    {
        return $this->postadress2;
    }

    public function setPostadress2(?string $postadress2): self
    {
        $this->postadress2 = $postadress2;

        return $this;
    }

    public function getCpadress(): ?int
    {
        return $this->cpadress;
    }

    public function setCpadress(?int $cpadress): self
    {
        $this->cpadress = $cpadress;

        return $this;
    }

    public function getCountryadress(): ?string
    {
        return $this->countryadress;
    }

    public function setCountryadress(?string $countryadress): self
    {
        $this->countryadress = $countryadress;

        return $this;
    }

    public function getIduser(): ?Useraccount
    {
        return $this->iduser;
    }

    public function setIduser(?Useraccount $iduser): self
    {
        $this->iduser = $iduser;

        return $this;
    }


}
