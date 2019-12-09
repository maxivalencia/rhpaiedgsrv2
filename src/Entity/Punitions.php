<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PunitionsRepository")
 */
class Punitions
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
    private $libelle;

    /**
     * @ORM\Column(type="string", length=128)
     */
    private $reference;

    /**
     * @ORM\Column(type="date")
     */
    private $date_reference;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date_effet;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $sanction;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Personnels", inversedBy="punitions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $personnel;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getReference(): ?string
    {
        return strtoupper($this->reference);
    }

    public function setReference(string $reference): self
    {
        $this->reference = strtoupper($reference);

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

    public function getDateEffet(): ?\DateTimeInterface
    {
        return $this->date_effet;
    }

    public function setDateEffet(?\DateTimeInterface $date_effet): self
    {
        $this->date_effet = $date_effet;

        return $this;
    }

    public function getSanction(): ?string
    {
        return $this->sanction;
    }

    public function setSanction(string $sanction): self
    {
        $this->sanction = $sanction;

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
