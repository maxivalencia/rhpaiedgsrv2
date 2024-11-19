<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FonctionsConjointsRepository")
 */
class FonctionsConjoints
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $libelle;

    /**
     * @ORM\Column(type="string", length=64, nullable=true)
     */
    private $abbreviation;

    /**
     * @ORM\Column(type="string", length=128, nullable=true)
     */
    private $lieu_travail;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $employeur;

    /**
     * @ORM\Column(type="string", length=128, nullable=true)
     */
    private $adresse_employeur;

    /**
     * @ORM\Column(type="boolean")
     */
    private $est_fonctionnaire;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TypesContrats", inversedBy="fonctionsConjoints")
     * @ORM\JoinColumn(nullable=true)
     */
    private $type_contrat;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Conjoints", inversedBy="fonctionsConjoints")
     * @ORM\JoinColumn(nullable=true)
     */
    private $conjoint;

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

    public function setAbbreviation(?string $abbreviation): self
    {
        $this->abbreviation = strtoupper($abbreviation);

        return $this;
    }

    public function getLieuTravail(): ?string
    {
        return $this->lieu_travail;
    }

    public function setLieuTravail(string $lieu_travail): self
    {
        $this->lieu_travail = $lieu_travail;

        return $this;
    }

    public function getEmployeur(): ?string
    {
        return strtoupper($this->employeur);
    }

    public function setEmployeur(string $employeur): self
    {
        $this->employeur = strtoupper($employeur);

        return $this;
    }

    public function getAdresseEmployeur(): ?string
    {
        return $this->adresse_employeur;
    }

    public function setAdresseEmployeur(string $adresse_employeur): self
    {
        $this->adresse_employeur = $adresse_employeur;

        return $this;
    }

    public function getEstFonctionnaire(): ?bool
    {
        return $this->est_fonctionnaire;
    }

    public function setEstFonctionnaire(bool $est_fonctionnaire): self
    {
        $this->est_fonctionnaire = $est_fonctionnaire;

        return $this;
    }

    public function getTypeContrat(): ?TypesContrats
    {
        return $this->type_contrat;
    }

    public function setTypeContrat(?TypesContrats $type_contrat): self
    {
        $this->type_contrat = $type_contrat;

        return $this;
    }

    public function getConjoint(): ?Conjoints
    {
        return $this->conjoint;
    }

    public function setConjoint(?Conjoints $conjoint): self
    {
        $this->conjoint = $conjoint;

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
