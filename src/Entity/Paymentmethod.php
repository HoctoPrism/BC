<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Paymentmethod
 *
 * @ORM\Table(name="paymentmethod")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="App\Repository\PaymentmethodRepository")
 */
class Paymentmethod
{
    /**
     * @var int
     *
     * @ORM\Column(name="idPayment", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idpayment;

    /**
     * @var string|null
     *
     * @ORM\Column(name="namePayment", type="string", length=50, nullable=true)
     */
    private $namepayment;

    public function getIdpayment(): ?int
    {
        return $this->idpayment;
    }

    public function getNamepayment(): ?string
    {
        return $this->namepayment;
    }

    public function setNamepayment(?string $namepayment): self
    {
        $this->namepayment = $namepayment;

        return $this;
    }


}
