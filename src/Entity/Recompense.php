<?php

namespace App\Entity;

use App\Repository\RecompenseRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RecompenseRepository::class)
 */
class Recompense
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Nature::class, inversedBy="recompenses")
     * @ORM\JoinColumn(nullable=false)
     */
    private $nature;

    /**
     * @ORM\Column(type="string", length=128, nullable=true)
     */
    private $reference;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $libelle;

    /**
     * @ORM\Column(type="string", length=64, nullable=true)
     */
    private $autorite;

    /**
     * @ORM\ManyToOne(targetEntity=Personnels::class, inversedBy="recompenses")
     * @ORM\JoinColumn(nullable=false)
     */
    private $personnel;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNature(): ?Nature
    {
        return $this->nature;
    }

    public function setNature(?Nature $nature): self
    {
        $this->nature = $nature;

        return $this;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(?string $reference): self
    {
        $this->reference = $reference;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(?\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getAutorite(): ?string
    {
        return $this->autorite;
    }

    public function setAutorite(?string $autorite): self
    {
        $this->autorite = $autorite;

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

    /**
    * toString
    * @return string
    */
    public function __toString()
    {
        return $this->getLibelle();
    }
}
