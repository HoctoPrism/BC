<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Useraccount
 *
 * @ORM\Table(name="useraccount")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="App\Repository\UseraccountRepository")
 */
class Useraccount
{
    /**
     * @var int
     *
     * @ORM\Column(name="idUser", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $iduser;

    /**
     * @var string|null
     *
     * @ORM\Column(name="firstnameUser", type="string", length=50, nullable=true)
     */
    private $firstnameuser;

    /**
     * @var string|null
     *
     * @ORM\Column(name="lastnameUser", type="string", length=50, nullable=true)
     */
    private $lastnameuser;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="isMaleUser", type="boolean", nullable=true)
     */
    private $ismaleuser;

    /**
     * @var string|null
     *
     * @ORM\Column(name="emailUser", type="string", length=50, nullable=true)
     */
    private $emailuser;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="birthUser", type="date", nullable=true)
     */
    private $birthuser;

    /**
     * @var string|null
     *
     * @ORM\Column(name="pwdUser", type="string", length=50, nullable=true)
     */
    private $pwduser;

    /**
     * @var string|null
     *
     * @ORM\Column(name="vauncherUser", type="decimal", precision=15, scale=2, nullable=true)
     */
    private $vauncheruser;

    /**
     * @var string|null
     *
     * @ORM\Column(name="phoneUser", type="string", length=50, nullable=true)
     */
    private $phoneuser;

    /**
     * @var string|null
     *
     * @ORM\Column(name="phoneMobileUser", type="string", length=50, nullable=true)
     */
    private $phonemobileuser;

    /**
     * @var int|null
     *
     * @ORM\Column(name="nbOrderUser", type="integer", nullable=true)
     */
    private $nborderuser;

    public function getIduser(): ?int
    {
        return $this->iduser;
    }

    public function getFirstnameuser(): ?string
    {
        return $this->firstnameuser;
    }

    public function setFirstnameuser(?string $firstnameuser): self
    {
        $this->firstnameuser = $firstnameuser;

        return $this;
    }

    public function getLastnameuser(): ?string
    {
        return $this->lastnameuser;
    }

    public function setLastnameuser(?string $lastnameuser): self
    {
        $this->lastnameuser = $lastnameuser;

        return $this;
    }

    public function getIsmaleuser(): ?bool
    {
        return $this->ismaleuser;
    }

    public function setIsmaleuser(?bool $ismaleuser): self
    {
        $this->ismaleuser = $ismaleuser;

        return $this;
    }

    public function getEmailuser(): ?string
    {
        return $this->emailuser;
    }

    public function setEmailuser(?string $emailuser): self
    {
        $this->emailuser = $emailuser;

        return $this;
    }

    public function getBirthuser(): ?\DateTimeInterface
    {
        return $this->birthuser;
    }

    public function setBirthuser(?\DateTimeInterface $birthuser): self
    {
        $this->birthuser = $birthuser;

        return $this;
    }

    public function getPwduser(): ?string
    {
        return $this->pwduser;
    }

    public function setPwduser(?string $pwduser): self
    {
        $this->pwduser = $pwduser;

        return $this;
    }

    public function getVauncheruser(): ?string
    {
        return $this->vauncheruser;
    }

    public function setVauncheruser(?string $vauncheruser): self
    {
        $this->vauncheruser = $vauncheruser;

        return $this;
    }

    public function getPhoneuser(): ?string
    {
        return $this->phoneuser;
    }

    public function setPhoneuser(?string $phoneuser): self
    {
        $this->phoneuser = $phoneuser;

        return $this;
    }

    public function getPhonemobileuser(): ?string
    {
        return $this->phonemobileuser;
    }

    public function setPhonemobileuser(?string $phonemobileuser): self
    {
        $this->phonemobileuser = $phonemobileuser;

        return $this;
    }

    public function getNborderuser(): ?int
    {
        return $this->nborderuser;
    }

    public function setNborderuser(?int $nborderuser): self
    {
        $this->nborderuser = $nborderuser;

        return $this;
    }


}
