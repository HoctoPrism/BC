<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * Status
 *
 * @ApiResource()
 * @ORM\Table(name="status")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="App\Repository\StatusRepository")
 */
class Status
{
    /**
     * @var int
     *
     * @ORM\Column(name="idStatus", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idstatus;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nameStatus", type="string", length=50, nullable=true)
     */
    private $namestatus;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="dateStatus", type="date", nullable=true)
     */
    private $datestatus;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Orders", mappedBy="idstatus")
     */
    private $idorder;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idorder = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdstatus(): ?int
    {
        return $this->idstatus;
    }

    public function getNamestatus(): ?string
    {
        return $this->namestatus;
    }

    public function setNamestatus(?string $namestatus): self
    {
        $this->namestatus = $namestatus;

        return $this;
    }

    public function getDatestatus(): ?\DateTimeInterface
    {
        return $this->datestatus;
    }

    public function setDatestatus(?\DateTimeInterface $datestatus): self
    {
        $this->datestatus = $datestatus;

        return $this;
    }

    /**
     * @return Collection|Orders[]
     */
    public function getIdorder(): Collection
    {
        return $this->idorder;
    }

    public function addIdorder(Orders $idorder): self
    {
        if (!$this->idorder->contains($idorder)) {
            $this->idorder[] = $idorder;
            $idorder->addIdstatus($this);
        }

        return $this;
    }

    public function removeIdorder(Orders $idorder): self
    {
        if ($this->idorder->removeElement($idorder)) {
            $idorder->removeIdstatus($this);
        }

        return $this;
    }

}
