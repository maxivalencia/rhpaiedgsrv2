<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DecisionsPromotionsRepository")
 */
class DecisionsPromotions
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
    private $reference_decision;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date_decision;

    /**
     * @ORM\Column(type="string", length=64, nullable=true)
     */
    private $genre_decision;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\NominationsPersonnels", mappedBy="decision")
     */
    private $nominationsPersonnels;

    public function __construct()
    {
        $this->nominationsPersonnels = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReferenceDecision(): ?string
    {
        return strtoupper($this->reference_decision);
    }

    public function setReferenceDecision(string $reference_decision): self
    {
        $this->reference_decision = strtoupper($reference_decision);

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

    public function getGenreDecision(): ?string
    {
        return $this->genre_decision;
    }

    public function setGenreDecision(string $genre_decision): self
    {
        $this->genre_decision = $genre_decision;

        return $this;
    }

    /**
     * @return Collection|NominationsPersonnels[]
     */
    public function getNominationsPersonnels(): Collection
    {
        return $this->nominationsPersonnels;
    }

    public function addNominationsPersonnel(NominationsPersonnels $nominationsPersonnel): self
    {
        if (!$this->nominationsPersonnels->contains($nominationsPersonnel)) {
            $this->nominationsPersonnels[] = $nominationsPersonnel;
            $nominationsPersonnel->setDecision($this);
        }

        return $this;
    }

    public function removeNominationsPersonnel(NominationsPersonnels $nominationsPersonnel): self
    {
        if ($this->nominationsPersonnels->contains($nominationsPersonnel)) {
            $this->nominationsPersonnels->removeElement($nominationsPersonnel);
            // set the owning side to null (unless already changed)
            if ($nominationsPersonnel->getDecision() === $this) {
                $nominationsPersonnel->setDecision(null);
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
        return $this->getReferenceDecision().' du '.$this->getDateDecision()->format('d/m/Y');
    }
}
