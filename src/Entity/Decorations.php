<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DecorationsRepository")
 */
class Decorations
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
     * @ORM\Column(type="integer")
     */
    private $ordre;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\DecorationsPersonnels", mappedBy="decoration")
     */
    private $decorationsPersonnels;

    public function __construct()
    {
        $this->decorationsPersonnels = new ArrayCollection();
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

    public function getOrdre(): ?int
    {
        return $this->ordre;
    }

    public function setOrdre(int $ordre): self
    {
        $this->ordre = $ordre;

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
     * @return Collection|DecorationsPersonnels[]
     */
    public function getDecorationsPersonnels(): Collection
    {
        return $this->decorationsPersonnels;
    }

    public function addDecorationsPersonnel(DecorationsPersonnels $decorationsPersonnel): self
    {
        if (!$this->decorationsPersonnels->contains($decorationsPersonnel)) {
            $this->decorationsPersonnels[] = $decorationsPersonnel;
            $decorationsPersonnel->setDecoration($this);
        }

        return $this;
    }

    public function removeDecorationsPersonnel(DecorationsPersonnels $decorationsPersonnel): self
    {
        if ($this->decorationsPersonnels->contains($decorationsPersonnel)) {
            $this->decorationsPersonnels->removeElement($decorationsPersonnel);
            // set the owning side to null (unless already changed)
            if ($decorationsPersonnel->getDecoration() === $this) {
                $decorationsPersonnel->setDecoration(null);
            }
        }

        return $this;
    }
}
