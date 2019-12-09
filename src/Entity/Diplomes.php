<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DiplomesRepository")
 */
class Diplomes
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
    private $type;

    /**
     * @ORM\Column(type="boolean")
     */
    private $est_diplome_militaire;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\DomaineDiplome", inversedBy="diplomes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $domaine;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\NiveauDiplome", inversedBy="diplomes")
     */
    private $niveau;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\DiplomesPersonnels", mappedBy="diplome")
     */
    private $diplomesPersonnels;

    public function __construct()
    {
        $this->diplomesPersonnels = new ArrayCollection();
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

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getEstDiplomeMilitaire(): ?bool
    {
        return $this->est_diplome_militaire;
    }

    public function setEstDiplomeMilitaire(bool $est_diplome_militaire): self
    {
        $this->est_diplome_militaire = $est_diplome_militaire;

        return $this;
    }

    public function getDomaine(): ?DomaineDiplome
    {
        return $this->domaine;
    }

    public function setDomaine(?DomaineDiplome $domaine): self
    {
        $this->domaine = $domaine;

        return $this;
    }

    public function getNiveau(): ?NiveauDiplome
    {
        return $this->niveau;
    }

    public function setNiveau(?NiveauDiplome $niveau): self
    {
        $this->niveau = $niveau;

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
     * @return Collection|DiplomesPersonnels[]
     */
    public function getDiplomesPersonnels(): Collection
    {
        return $this->diplomesPersonnels;
    }

    public function addDiplomesPersonnel(DiplomesPersonnels $diplomesPersonnel): self
    {
        if (!$this->diplomesPersonnels->contains($diplomesPersonnel)) {
            $this->diplomesPersonnels[] = $diplomesPersonnel;
            $diplomesPersonnel->setDiplome($this);
        }

        return $this;
    }

    public function removeDiplomesPersonnel(DiplomesPersonnels $diplomesPersonnel): self
    {
        if ($this->diplomesPersonnels->contains($diplomesPersonnel)) {
            $this->diplomesPersonnels->removeElement($diplomesPersonnel);
            // set the owning side to null (unless already changed)
            if ($diplomesPersonnel->getDiplome() === $this) {
                $diplomesPersonnel->setDiplome(null);
            }
        }

        return $this;
    }
}
