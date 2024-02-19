<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EnfantsRepository")
 */
class Enfants
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $rang;

    /**
     * @ORM\Column(type="string", length=128, nullable=true)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=128, nullable=true)
     */
    private $prenom;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date_naissance;

    /**
     * @ORM\Column(type="string", length=128, nullable=true)
     */
    private $lieu_naissance;

    /**
     * @ORM\Column(type="boolean")
     */
    private $sexe;

    /**
     * @ORM\Column(type="string", length=1, nullable=true)
     */
    private $qualite;

    /**
     * @ORM\Column(type="boolean")
     */
    private $est_decede;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date_dece;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Personnels", inversedBy="enfants")
     */
    private $personnel;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRang(): ?int
    {
        return $this->rang;
    }

    public function setRang(int $rang): self
    {
        $this->rang = $rang;

        return $this;
    }

    public function getNom(): ?string
    {
        return strtoupper($this->nom);
    }

    public function setNom(string $nom): self
    {
        $this->nom = strtoupper($nom);

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(?string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->date_naissance;
    }

    public function setDateNaissance(\DateTimeInterface $date_naissance): self
    {
        $this->date_naissance = $date_naissance;

        return $this;
    }

    public function getLieuNaissance(): ?string
    {
        return $this->lieu_naissance;
    }

    public function setLieuNaissance(string $lieu_naissance): self
    {
        $this->lieu_naissance = $lieu_naissance;

        return $this;
    }

    public function getSexe(): ?bool
    {
        return $this->sexe;
    }

    public function setSexe(bool $sexe): self
    {
        $this->sexe = $sexe;

        return $this;
    }

    public function getQualite(): ?string
    {
        return $this->qualite;
    }

    public function setQualite(string $qualite): self
    {
        $this->qualite = $qualite;

        return $this;
    }

    public function getEstDecede(): ?bool
    {
        return $this->est_decede;
    }

    public function setEstDecede(bool $est_decede): self
    {
        $this->est_decede = $est_decede;

        return $this;
    }

    public function getDateDece(): ?\DateTimeInterface
    {
        return $this->date_dece;
    }

    public function setDateDece(?\DateTimeInterface $date_dece): self
    {
        $this->date_dece = $date_dece;

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

    /**
    * toString
    * @return string
    */
    public function __toString()
    {
        return $this->getNom().' '.$this->getPrenom();
    }
}
