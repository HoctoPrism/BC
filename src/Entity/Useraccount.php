<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;


/**
 * Useraccount
 *
 * @ORM\Table(name="useraccount")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="App\Repository\UseraccountRepository")
 * @UniqueEntity(fields={"emailuser"}, message="There is already an account with this emailuser")
 */
class Useraccount implements UserInterface, PasswordAuthenticatedUserInterface
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
     * @var string|null
     *
     * @ORM\Column(name="gender", type="string", length=40, nullable=true)
     */
    private $gender;

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
     * @ORM\Column(name="pwdUser", type="string", length=255, nullable=true)
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

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @ORM\Column(type="boolean")
     */
    private $isVerified = false;

    public function getUserIdentifier(): ?int
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

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(?string $gender): self
    {
        $this->gender = $gender;

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

    public function getUsername(): ?string
    {
        return $this->emailuser;
    }

    public function setUsername(?string $emailuser): self
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
    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): ?string
    {
        return $this->pwduser;
    }

    public function setPassword(?string $pwduser): self
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

    public function eraseCredentials()
    {
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_ANON';
        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    public function getSalt()
    {
        // you *may* need a real salt depending on your encoder
        // see section on salt below
        return null;
    }

    public function isVerified(): bool
    {
        return $this->isVerified;
    }

    public function setIsVerified(bool $isVerified): self
    {
        $this->isVerified = $isVerified;

        return $this;
    }

}
