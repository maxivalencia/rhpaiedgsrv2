<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AffectationsPersonnelsRepository")
 */
class AffectationsPersonnels
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
    private $date_affectation;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date_disponibilite;

    /**
     * @ORM\Column(type="string", length=128, nullable=true)
     */
    private $reference_disponibilite;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date_reference_disponibilite;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $motif_affectation;

    /**
     * @ORM\Column(type="string", length=4, nullable=true)
     */
    private $situation;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\DecisionsAffectations", inversedBy="affectationsPersonnels")
     */
    private $annulation;

    /**
     * @ORM\Column(type="string", length=128)
     */
    private $motif_annulation;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Fonctions", inversedBy="affectationsPersonnels")
     */
    private $fonction;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Personnels", inversedBy="affectationsPersonnels")
     */
    private $personnel;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\DecisionsAffectations", inversedBy="affectationsPersonnels")
     */
    private $decision_affectation;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateAffectation(): ?\DateTimeInterface
    {
        return $this->date_affectation;
    }

    public function setDateAffectation(\DateTimeInterface $date_affectation): self
    {
        $this->date_affectation = $date_affectation;

        return $this;
    }

    public function getDateDisponibilite(): ?\DateTimeInterface
    {
        return $this->date_disponibilite;
    }

    public function setDateDisponibilite(?\DateTimeInterface $date_disponibilite): self
    {
        $this->date_disponibilite = $date_disponibilite;

        return $this;
    }

    public function getReferenceDisponibilite(): ?string
    {
        return $this->reference_disponibilite;
    }

    public function setReferenceDisponibilite(?string $reference_disponibilite): self
    {
        $this->reference_disponibilite = $reference_disponibilite;

        return $this;
    }

    public function getDateReferenceDisponibilite(): ?\DateTimeInterface
    {
        return $this->date_reference_disponibilite;
    }

    public function setDateReferenceDisponibilite(?\DateTimeInterface $date_reference_disponibilite): self
    {
        $this->date_reference_disponibilite = $date_reference_disponibilite;

        return $this;
    }

    public function getMotifAffectation(): ?string
    {
        return $this->motif_affectation;
    }

    public function setMotifAffectation(string $motif_affectation): self
    {
        $this->motif_affectation = $motif_affectation;

        return $this;
    }

    public function getSituation(): ?string
    {
        return $this->situation;
    }

    public function setSituation(?string $situation): self
    {
        $this->situation = $situation;

        return $this;
    }

    public function getAnnulation(): ?DecisionsAffectations
    {
        return $this->annulation;
    }

    public function setAnnulation(?DecisionsAffectations $annulation): self
    {
        $this->annulation = $annulation;

        return $this;
    }

    public function getMotifAnnulation(): ?string
    {
        return $this->motif_annulation;
    }

    public function setMotifAnnulation(string $motif_annulation): self
    {
        $this->motif_annulation = $motif_annulation;

        return $this;
    }

    public function getFonction(): ?Fonctions
    {
        return $this->fonction;
    }

    public function setFonction(?Fonctions $fonction): self
    {
        $this->fonction = $fonction;

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

    public function getDecisionAffectation(): ?DecisionsAffectations
    {
        return $this->decision_affectation;
    }

    public function setDecisionAffectation(?DecisionsAffectations $decision_affectation): self
    {
        $this->decision_affectation = $decision_affectation;

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
