<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DecisionsRadiationsControlesRepository")
 */
class DecisionsRadiationsControles
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
    private $date_reference;

    /**
     * @ORM\Column(type="string", length=128, nullable=true)
     */
    private $reference_journal_officiel;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date_journal_officiel;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\RadiationsPersonnels", mappedBy="decision_radiation")
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

    public function getReferenceDecision(): ?string
    {
        return strtoupper($this->reference_decision);
    }

    public function setReferenceDecision(string $reference_decision): self
    {
        $this->reference_decision = strtoupper($reference_decision);

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

    public function getReferenceJournalOfficiel(): ?string
    {
        return strtoupper($this->reference_journal_officiel);
    }

    public function setReferenceJournalOfficiel(string $reference_journal_officiel): self
    {
        $this->reference_journal_officiel = strtoupper($reference_journal_officiel);

        return $this;
    }

    public function getDateJournalOfficiel(): ?\DateTimeInterface
    {
        return $this->date_journal_officiel;
    }

    public function setDateJournalOfficiel(?\DateTimeInterface $date_journal_officiel): self
    {
        $this->date_journal_officiel = $date_journal_officiel;

        return $this;
    }

    /**
    * toString
    * @return string
    */
    public function __toString()
    {
        return $this->getReferenceJournalOfficiel().' du '.$this->getDateReference()->format('d/m/Y');
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
            $radiationsPersonnel->setDecisionRadiation($this);
        }

        return $this;
    }

    public function removeRadiationsPersonnel(RadiationsPersonnels $radiationsPersonnel): self
    {
        if ($this->radiationsPersonnels->contains($radiationsPersonnel)) {
            $this->radiationsPersonnels->removeElement($radiationsPersonnel);
            // set the owning side to null (unless already changed)
            if ($radiationsPersonnel->getDecisionRadiation() === $this) {
                $radiationsPersonnel->setDecisionRadiation(null);
            }
        }

        return $this;
    }
}
