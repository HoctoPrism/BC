<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * Orders
 *
 * @ApiResource()
 * @ORM\Table(name="orders", indexes={@ORM\Index(name="idAdress", columns={"idAdress"}), @ORM\Index(name="idPayment", columns={"idPayment"}), @ORM\Index(name="idUser", columns={"idUser"})})
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="App\Repository\OrdersRepository")
 */
class Orders
{
    /**
     * @var int
     *
     * @ORM\Column(name="idOrder", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idorder;

    /**
     * @var int|null
     *
     * @ORM\Column(name="promoOrder", type="integer", nullable=true)
     */
    private $promoorder;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="orderDate", type="date", nullable=true)
     */
    private $orderdate;

    /**
     * @var \Address
     *
     * @ORM\ManyToOne(targetEntity="Address")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idAdress", referencedColumnName="idAdress")
     * })
     */
    private $idadress;

    /**
     * @var \Useraccount
     *
     * @ORM\ManyToOne(targetEntity="Useraccount")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idUser", referencedColumnName="idUser")
     * })
     */
    private $iduser;

    /**
     * @var \Paymentmethod
     *
     * @ORM\ManyToOne(targetEntity="Paymentmethod")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idPayment", referencedColumnName="idPayment")
     * })
     */
    private $idpayment;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Status", inversedBy="idorder")
     * @ORM\JoinTable(name="datestatus",
     *   joinColumns={
     *     @ORM\JoinColumn(name="idOrder", referencedColumnName="idOrder")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="idStatus", referencedColumnName="idStatus")
     *   }
     * )
     */
    private $idstatus;

    /**
     * @ORM\OneToMany(targetEntity=ProductOrder::class, mappedBy="idorder")
     */
    private $productOrders;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idstatus = new \Doctrine\Common\Collections\ArrayCollection();
        $this->productOrders = new ArrayCollection();
    }

    public function getIdorder(): ?int
    {
        return $this->idorder;
    }

    public function getPromoorder(): ?int
    {
        return $this->promoorder;
    }

    public function setPromoorder(?int $promoorder): self
    {
        $this->promoorder = $promoorder;

        return $this;
    }

    public function getOrderdate(): ?\DateTimeInterface
    {
        return $this->orderdate;
    }

    public function setOrderdate(?\DateTimeInterface $orderdate): self
    {
        $this->orderdate = $orderdate;

        return $this;
    }

    public function getIdadress(): ?Address
    {
        return $this->idadress;
    }

    public function setIdadress(?Address $idadress): self
    {
        $this->idadress = $idadress;

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

    public function getIdpayment(): ?Paymentmethod
    {
        return $this->idpayment;
    }

    public function setIdpayment(?Paymentmethod $idpayment): self
    {
        $this->idpayment = $idpayment;

        return $this;
    }

    /**
     * @return Collection|Status[]
     */
    public function getIdstatus(): Collection
    {
        return $this->idstatus;
    }

    public function addIdstatus(Status $idstatus): self
    {
        if (!$this->idstatus->contains($idstatus)) {
            $this->idstatus[] = $idstatus;
        }

        return $this;
    }

    public function removeIdstatus(Status $idstatus): self
    {
        $this->idstatus->removeElement($idstatus);

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
            $productOrder->setIdorder($this);
        }

        return $this;
    }

    public function removeProductOrder(ProductOrder $productOrder): self
    {
        if ($this->productOrders->removeElement($productOrder)) {
            // set the owning side to null (unless already changed)
            if ($productOrder->getIdorder() === $this) {
                $productOrder->setIdorder(null);
            }
        }

        return $this;
    }

}
