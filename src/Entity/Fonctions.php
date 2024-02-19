<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FonctionsRepository")
 */
class Fonctions
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=128, nullable=true)
     */
    private $libelle;

    /**
     * @ORM\Column(type="string", length=128, nullable=true)
     */
    private $abbreviation;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $hierarchie;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\AffectationsPersonnels", mappedBy="fonction")
     */
    private $affectationsPersonnels;

    public function __construct()
    {
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
        return strtoupper($this->abbreviation);
    }

    public function setAbbreviation(string $abbreviation): self
    {
        $this->abbreviation = strtoupper($abbreviation);

        return $this;
    }

    public function getHierarchie(): ?int
    {
        return $this->hierarchie;
    }

    public function setHierarchie(int $hierarchie): self
    {
        $this->hierarchie = $hierarchie;

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
            $affectationsPersonnel->setFonction($this);
        }

        return $this;
    }

    public function removeAffectationsPersonnel(AffectationsPersonnels $affectationsPersonnel): self
    {
        if ($this->affectationsPersonnels->contains($affectationsPersonnel)) {
            $this->affectationsPersonnels->removeElement($affectationsPersonnel);
            // set the owning side to null (unless already changed)
            if ($affectationsPersonnel->getFonction() === $this) {
                $affectationsPersonnel->setFonction(null);
            }
        }

        return $this;
    }
}
