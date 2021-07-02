<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Invoice
 *
 * @ORM\Table(name="invoice", indexes={@ORM\Index(name="idOrder", columns={"idOrder"})})
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="App\Repository\InvoiceRepository")
 */
class Invoice
{
    /**
     * @var int
     *
     * @ORM\Column(name="idInvoice", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idinvoice;

    /**
     * @var \Orders
     *
     * @ORM\ManyToOne(targetEntity="Orders")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idOrder", referencedColumnName="idOrder")
     * })
     */
    private $idorder;

    public function getIdinvoice(): ?int
    {
        return $this->idinvoice;
    }

    public function getIdorder(): ?Orders
    {
        return $this->idorder;
    }

    public function setIdorder(?Orders $idorder): self
    {
        $this->idorder = $idorder;

        return $this;
    }


}
