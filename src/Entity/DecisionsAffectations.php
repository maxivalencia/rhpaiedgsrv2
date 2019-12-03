<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DecisionsAffectationsRepository")
 */
class DecisionsAffectations
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=128)
     */
    private $reference_decision;

    /**
     * @ORM\Column(type="date")
     */
    private $date_decision;

    /**
     * @ORM\Column(type="string", length=128)
     */
    private $genre;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\AffectationsPersonnels", mappedBy="annulation")
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

    public function getReferenceDecision(): ?string
    {
        return $this->reference_decision;
    }

    public function setReferenceDecision(string $reference_decision): self
    {
        $this->reference_decision = $reference_decision;

        return $this;
    }

    public function getDateDecision(): ?\DateTimeInterface
    {
        return $this->date_decision;
    }

    public function setDateDecision(\DateTimeInterface $date_decision): self
    {
        $this->date_decision = $date_decision;

        return $this;
    }

    public function getGenre(): ?string
    {
        return $this->genre;
    }

    public function setGenre(string $genre): self
    {
        $this->genre = $genre;

        return $this;
    }

    /**
    * toString
    * @return string
    */
    public function __toString()
    {
        return $this->getReferenceDecision();
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
            $affectationsPersonnel->setAnnulation($this);
        }

        return $this;
    }

    public function removeAffectationsPersonnel(AffectationsPersonnels $affectationsPersonnel): self
    {
        if ($this->affectationsPersonnels->contains($affectationsPersonnel)) {
            $this->affectationsPersonnels->removeElement($affectationsPersonnel);
            // set the owning side to null (unless already changed)
            if ($affectationsPersonnel->getAnnulation() === $this) {
                $affectationsPersonnel->setAnnulation(null);
            }
        }

        return $this;
    }
}
