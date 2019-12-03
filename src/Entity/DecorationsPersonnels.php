<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DecorationsPersonnelsRepository")
 */
class DecorationsPersonnels
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=128)
     */
    private $reference;

    /**
     * @ORM\Column(type="date")
     */
    private $date_reference;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Personnels", inversedBy="decorationsPersonnels")
     */
    private $personnel;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Decorations", inversedBy="decorationsPersonnels")
     */
    private $decoration;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(string $reference): self
    {
        $this->reference = $reference;

        return $this;
    }

    public function getDateReference(): ?\DateTimeInterface
    {
        return $this->date_reference;
    }

    public function setDateReference(\DateTimeInterface $date_reference): self
    {
        $this->date_reference = $date_reference;

        return $this;
    }

    public function getPersonnel(): ?Personnels
    {
        return $this->personnel;
    }

    public function setPersonnel(?Personnels $personnel): self
    {
        $this->personnel = $personnel;

        return $this;
    }

    public function getDecoration(): ?Decorations
    {
        return $this->decoration;
    }

    public function setDecoration(?Decorations $decoration): self
    {
        $this->decoration = $decoration;

        return $this;
    }

    /**
    * toString
    * @return string
    */
    public function __toString()
    {
        return $this->getPersonnel();
    }
}
