<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PersonnelsRepository")
 */
class Personnels
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
    private $nom;

    /**
     * @ORM\Column(type="string", length=128, nullable=true)
     */
    private $prenoms;

    /**
     * @ORM\Column(type="date")
     */
    private $date_naissance;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $lieu_naissance;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nom_pere;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom_mere;

    /**
     * @ORM\Column(type="string", length=12)
     */
    private $num_cin;

    /**
     * @ORM\Column(type="date")
     */
    private $date_cin;

    /**
     * @ORM\Column(type="string", length=64)
     */
    private $lieu_cin;

    /**
     * @ORM\Column(type="boolean")
     */
    private $sexe;

    /**
     * @ORM\Column(type="boolean")
     */
    private $est_marie;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $telephone;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $telephone_ice;

    /**
     * @ORM\Column(type="date")
     */
    private $date_embauche;

    /**
     * @ORM\Column(type="string", length=16, nullable=true)
     */
    private $matricule;

    /**
     * @ORM\Column(type="string", length=32, nullable=true)
     */
    private $numero_cnaps;

    /**
     * @ORM\Column(type="boolean")
     */
    private $est_militaire;

    /**
     * @ORM\Column(type="boolean")
     */
    private $actif;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TypesContrats", inversedBy="personnels")
     * @ORM\JoinColumn(nullable=false)
     */
    private $contrat;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\NominationsPersonnels", mappedBy="personnel")
     */
    private $nominationsPersonnels;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Photos", mappedBy="personnel")
     */
    private $photos;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\NotesPersonnels", mappedBy="personnel")
     */
    private $notesPersonnels;

    public function __construct()
    {
        $this->nominationsPersonnels = new ArrayCollection();
        $this->photos = new ArrayCollection();
        $this->notesPersonnels = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenoms(): ?string
    {
        return $this->prenoms;
    }

    public function setPrenoms(?string $prenoms): self
    {
        $this->prenoms = $prenoms;

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

    public function setLieuNaissance(?string $lieu_naissance): self
    {
        $this->lieu_naissance = $lieu_naissance;

        return $this;
    }

    public function getNomPere(): ?string
    {
        return $this->nom_pere;
    }

    public function setNomPere(?string $nom_pere): self
    {
        $this->nom_pere = $nom_pere;

        return $this;
    }

    public function getNomMere(): ?string
    {
        return $this->nom_mere;
    }

    public function setNomMere(string $nom_mere): self
    {
        $this->nom_mere = $nom_mere;

        return $this;
    }

    public function getNumCin(): ?string
    {
        return $this->num_cin;
    }

    public function setNumCin(string $num_cin): self
    {
        $this->num_cin = $num_cin;

        return $this;
    }

    public function getDateCin(): ?\DateTimeInterface
    {
        return $this->date_cin;
    }

    public function setDateCin(\DateTimeInterface $date_cin): self
    {
        $this->date_cin = $date_cin;

        return $this;
    }

    public function getLieuCin(): ?string
    {
        return $this->lieu_cin;
    }

    public function setLieuCin(string $lieu_cin): self
    {
        $this->lieu_cin = $lieu_cin;

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

    public function getEstMarie(): ?bool
    {
        return $this->est_marie;
    }

    public function setEstMarie(bool $est_marie): self
    {
        $this->est_marie = $est_marie;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(?string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getTelephoneIce(): ?string
    {
        return $this->telephone_ice;
    }

    public function setTelephoneIce(?string $telephone_ice): self
    {
        $this->telephone_ice = $telephone_ice;

        return $this;
    }

    public function getDateEmbauche(): ?\DateTimeInterface
    {
        return $this->date_embauche;
    }

    public function setDateEmbauche(\DateTimeInterface $date_embauche): self
    {
        $this->date_embauche = $date_embauche;

        return $this;
    }

    public function getMatricule(): ?string
    {
        return $this->matricule;
    }

    public function setMatricule(?string $matricule): self
    {
        $this->matricule = $matricule;

        return $this;
    }

    public function getNumeroCnaps(): ?string
    {
        return $this->numero_cnaps;
    }

    public function setNumeroCnaps(?string $numero_cnaps): self
    {
        $this->numero_cnaps = $numero_cnaps;

        return $this;
    }

    public function getEstMilitaire(): ?bool
    {
        return $this->est_militaire;
    }

    public function setEstMilitaire(bool $est_militaire): self
    {
        $this->est_militaire = $est_militaire;

        return $this;
    }

    public function getActif(): ?bool
    {
        return $this->actif;
    }

    public function setActif(bool $actif): self
    {
        $this->actif = $actif;

        return $this;
    }

    /**
    * toString
    * @return string
    */
    public function __toString()
    {
        return $this->getNom().' '.$this->getPrenoms();
    }

    public function getContrat(): ?TypesContrats
    {
        return $this->contrat;
    }

    public function setContrat(?TypesContrats $contrat): self
    {
        $this->contrat = $contrat;

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
            $nominationsPersonnel->setPersonnel($this);
        }

        return $this;
    }

    public function removeNominationsPersonnel(NominationsPersonnels $nominationsPersonnel): self
    {
        if ($this->nominationsPersonnels->contains($nominationsPersonnel)) {
            $this->nominationsPersonnels->removeElement($nominationsPersonnel);
            // set the owning side to null (unless already changed)
            if ($nominationsPersonnel->getPersonnel() === $this) {
                $nominationsPersonnel->setPersonnel(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Photos[]
     */
    public function getPhotos(): Collection
    {
        return $this->photos;
    }

    public function addPhoto(Photos $photo): self
    {
        if (!$this->photos->contains($photo)) {
            $this->photos[] = $photo;
            $photo->setPersonnel($this);
        }

        return $this;
    }

    public function removePhoto(Photos $photo): self
    {
        if ($this->photos->contains($photo)) {
            $this->photos->removeElement($photo);
            // set the owning side to null (unless already changed)
            if ($photo->getPersonnel() === $this) {
                $photo->setPersonnel(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|NotesPersonnels[]
     */
    public function getNotesPersonnels(): Collection
    {
        return $this->notesPersonnels;
    }

    public function addNotesPersonnel(NotesPersonnels $notesPersonnel): self
    {
        if (!$this->notesPersonnels->contains($notesPersonnel)) {
            $this->notesPersonnels[] = $notesPersonnel;
            $notesPersonnel->setPersonnel($this);
        }

        return $this;
    }

    public function removeNotesPersonnel(NotesPersonnels $notesPersonnel): self
    {
        if ($this->notesPersonnels->contains($notesPersonnel)) {
            $this->notesPersonnels->removeElement($notesPersonnel);
            // set the owning side to null (unless already changed)
            if ($notesPersonnel->getPersonnel() === $this) {
                $notesPersonnel->setPersonnel(null);
            }
        }

        return $this;
    }
}
