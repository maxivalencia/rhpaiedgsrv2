<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DroitsPensionsRepository")
 */
class DroitsPensions
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
     * @ORM\OneToMany(targetEntity="App\Entity\RadiationsPersonnels", mappedBy="droit_pension")
     */
    private $radiationsPersonnels;

    public function __construct()
    {
        $this->radiationsPersonnels = new ArrayCollection();
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

    /**
    * toString
    * @return string
    */
    public function __toString()
    {
        return $this->getLibelle();
    }

    /**
     * @return Collection|RadiationsPersonnels[]
     */
    public function getRadiationsPersonnels(): Collection
    {
        return $this->radiationsPersonnels;
    }

    public function addRadiationsPersonnel(RadiationsPersonnels $radiationsPersonnel): self
    {
        if (!$this->radiationsPersonnels->contains($radiationsPersonnel)) {
            $this->radiationsPersonnels[] = $radiationsPersonnel;
            $radiationsPersonnel->setDroitPension($this);
        }

        return $this;
    }

    public function removeRadiationsPersonnel(RadiationsPersonnels $radiationsPersonnel): self
    {
        if ($this->radiationsPersonnels->contains($radiationsPersonnel)) {
            $this->radiationsPersonnels->removeElement($radiationsPersonnel);
            // set the owning side to null (unless already changed)
            if ($radiationsPersonnel->getDroitPension() === $this) {
                $radiationsPersonnel->setDroitPension(null);
            }
        }

        return $this;
    }
}
