<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\NotesPOSRepository")
 */
class NotesPOS
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $annee;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $qf;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $vet;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ags;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $niveau;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $potentiel;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $appreciation_complet;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $personnel;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Personnels", inversedBy="notesPOS")
     */
    private $personnels;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAnnee(): ?\DateTimeInterface
    {
        return $this->annee;
    }

    public function setAnnee(\DateTimeInterface $annee): self
    {
        $this->annee = $annee;

        return $this;
    }

    public function getQf(): ?string
    {
        return strtoupper($this->qf);
    }

    public function setQf(string $qf): self
    {
        $this->qf = strtoupper($qf);

        return $this;
    }

    public function getVet(): ?string
    {
        return strtoupper($this->vet);
    }

    public function setVet(string $vet): self
    {
        $this->vet = strtoupper($vet);

        return $this;
    }

    public function getAgs(): ?string
    {
        return strtoupper($this->ags);
    }

    public function setAgs(string $ags): self
    {
        $this->ags = strtoupper($ags);

        return $this;
    }

    public function getNiveau(): ?string
    {
        return strtoupper($this->niveau);
    }

    public function setNiveau(string $niveau): self
    {
        $this->niveau = strtoupper($niveau);

        return $this;
    }

    public function getPotentiel(): ?string
    {
        return strtoupper($this->potentiel);
    }

    public function setPotentiel(string $potentiel): self
    {
        $this->potentiel = strtoupper($potentiel);

        return $this;
    }

    public function getAppreciationComplet(): ?string
    {
        return $this->appreciation_complet;
    }

    public function setAppreciationComplet(string $appreciation_complet): self
    {
        $this->appreciation_complet = $appreciation_complet;

        return $this;
    }

    public function getPersonnel(): ?string
    {
        return $this->personnel;
    }

    public function setPersonnel(?string $personnel): self
    {
        $this->personnel = $personnel;

        return $this;
    }

    public function getPersonnels(): ?Personnels
    {
        return $this->personnels;
    }

    public function setPersonnels(?Personnels $personnels): self
    {
        $this->personnels = $personnels;

        return $this;
    }

    /**
    * toString
    * @return string
    */
    public function __toString()
    {
        return $this->getPersonnels();
    }
}
