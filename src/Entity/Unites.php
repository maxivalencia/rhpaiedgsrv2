<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UnitesRepository")
 */
class Unites
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
    private $abbreviation;

    /**
     * @ORM\Column(type="string", length=128)
     */
    private $localite;

    /**
     * @ORM\Column(type="string", length=128, nullable=true)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $phone;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Communes", inversedBy="unites")
     * @ORM\JoinColumn(nullable=false)
     */
    private $commune;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Unites", inversedBy="unites")
     */
    private $unite_superieur;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Unites", mappedBy="unite_superieur")
     */
    private $unites;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\AffectationsPersonnels", mappedBy="unite")
     */
    private $affectationsPersonnels;

    public function __construct()
    {
        $this->unites = new ArrayCollection();
        $this->affectationsPersonnels = new ArrayCollection();
    }

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

    public function getAbbreviation(): ?string
    {
        return $this->abbreviation;
    }

    public function setAbbreviation(string $abbreviation): self
    {
        $this->abbreviation = $abbreviation;

        return $this;
    }

    public function getLocalite(): ?string
    {
        return $this->localite;
    }

    public function setLocalite(string $localite): self
    {
        $this->localite = $localite;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getCommune(): ?Communes
    {
        return $this->commune;
    }

    public function setCommune(?Communes $commune): self
    {
        $this->commune = $commune;

        return $this;
    }

    public function getUniteSuperieur(): ?self
    {
        return $this->unite_superieur;
    }

    public function setUniteSuperieur(?self $unite_superieur): self
    {
        $this->unite_superieur = $unite_superieur;

        return $this;
    }

    /**
     * @return Collection|self[]
     */
    public function getUnites(): Collection
    {
        return $this->unites;
    }

    public function addUnite(self $unite): self
    {
        if (!$this->unites->contains($unite)) {
            $this->unites[] = $unite;
            $unite->setUniteSuperieur($this);
        }

        return $this;
    }

    public function removeUnite(self $unite): self
    {
        if ($this->unites->contains($unite)) {
            $this->unites->removeElement($unite);
            // set the owning side to null (unless already changed)
            if ($unite->getUniteSuperieur() === $this) {
                $unite->setUniteSuperieur(null);
            }
        }

        return $this;
    }

    /**
    * toString
    * @return string
    */
    public function __toString()
    {
        return $this->getAbbreviation();
    }

    /**
     * @return Collection|AffectationsPersonnels[]
     */
    public function getAffectationsPersonnels(): Collection
    {
        return $this->affectationsPersonnels;
    }

    public function addAffectationsPersonnel(AffectationsPersonnels $affectationsPersonnel): self
    {
        if (!$this->affectationsPersonnels->contains($affectationsPersonnel)) {
            $this->affectationsPersonnels[] = $affectationsPersonnel;
            $affectationsPersonnel->setUnite($this);
        }

        return $this;
    }

    public function removeAffectationsPersonnel(AffectationsPersonnels $affectationsPersonnel): self
    {
        if ($this->affectationsPersonnels->contains($affectationsPersonnel)) {
            $this->affectationsPersonnels->removeElement($affectationsPersonnel);
            // set the owning side to null (unless already changed)
            if ($affectationsPersonnel->getUnite() === $this) {
                $affectationsPersonnel->setUnite(null);
            }
        }

        return $this;
    }
}
