<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CheckoutRepository")
 */
class Checkout
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $fullname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adress;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $city;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $state;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $zip;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nameOnCard;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $creditCardNumber;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $expMonth;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $expYear;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $CCV;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFullname(): ?string
    {
        return $this->fullname;
    }

    public function setFullname(string $fullname): self
    {
        $this->fullname = $fullname;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getAdress(): ?string
    {
        return $this->adress;
    }

    public function setAdress(string $adress): self
    {
        $this->adress = $adress;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getState(): ?string
    {
        return $this->state;
    }

    public function setState(string $state): self
    {
        $this->state = $state;

        return $this;
    }

    public function getZip(): ?string
    {
        return $this->zip;
    }

    public function setZip(string $zip): self
    {
        $this->zip = $zip;

        return $this;
    }

    public function getNameOnCard(): ?string
    {
        return $this->nameOnCard;
    }

    public function setNameOnCard(string $nameOnCard): self
    {
        $this->nameOnCard = $nameOnCard;

        return $this;
    }

    public function getCreditCardNumber(): ?string
    {
        return $this->creditCardNumber;
    }

    public function setCreditCardNumber(string $creditCardNumber): self
    {
        $this->creditCardNumber = $creditCardNumber;

        return $this;
    }

    public function getExpMonth(): ?string
    {
        return $this->expMonth;
    }

    public function setExpMonth(string $expMonth): self
    {
        $this->expMonth = $expMonth;

        return $this;
    }

    public function getExpYear(): ?string
    {
        return $this->expYear;
    }

    public function setExpYear(string $expYear): self
    {
        $this->expYear = $expYear;

        return $this;
    }

    public function getCCV(): ?string
    {
        return $this->CCV;
    }

    public function setCCV(string $CCV): self
    {
        $this->CCV = $CCV;

        return $this;
    }
}
