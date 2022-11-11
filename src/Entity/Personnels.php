<?php

namespace App\Entity;

use App\Entity\NominationsPersonnels;
use App\Entity\Grades;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\Length;

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

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Punitions", mappedBy="personnel")
     */
    private $punitions;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\DiplomesPersonnels", mappedBy="personnel")
     */
    private $diplomesPersonnels;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Conjoints", mappedBy="personnel")
     */
    private $conjoints;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Enfants", mappedBy="personnel")
     */
    private $enfants;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Permissions", mappedBy="personnel")
     */
    private $permissions;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\NotesPOS", mappedBy="personnels")
     */
    private $notesPOS;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\DecorationsPersonnels", mappedBy="personnel")
     */
    private $decorationsPersonnels;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\AffectationsPersonnels", mappedBy="personnel")
     */
    private $affectationsPersonnels;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\RadiationsPersonnels", mappedBy="personnel")
     */
    private $radiationsPersonnels;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\User", mappedBy="utilisateur")
     */
    private $users;

    /**
     * @ORM\ManyToOne(targetEntity=Grades::class, inversedBy="personnel")
     */
    private $grade;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateDepartRetraite;

    /**
     * @ORM\OneToMany(targetEntity=Recompense::class, mappedBy="personnel")
     */
    private $recompenses;

    public function __construct()
    {
        $this->nominationsPersonnels = new ArrayCollection();
        $this->photos = new ArrayCollection();
        $this->notesPersonnels = new ArrayCollection();
        $this->punitions = new ArrayCollection();
        $this->diplomesPersonnels = new ArrayCollection();
        $this->conjoints = new ArrayCollection();
        $this->enfants = new ArrayCollection();
        $this->permissions = new ArrayCollection();
        $this->notesPOS = new ArrayCollection();
        $this->decorationsPersonnels = new ArrayCollection();
        $this->affectationsPersonnels = new ArrayCollection();
        $this->radiationsPersonnels = new ArrayCollection();
        $this->users = new ArrayCollection();
        $this->recompenses = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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
        return $this->getGrade().' '.$this->getNom().' '.$this->getPrenoms();
        /* $grd = "";
        if($this->getNominationsPersonnels() != NULL){
            $grd = $this->getNominationsPersonnels()[-1];
        }else{
            $grd = "PC";
        }
        return $grd.' '.$this->getNom().' '.$this->getPrenoms(); */
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

    /**
     * @return Collection|Punitions[]
     */
    public function getPunitions(): Collection
    {
        return $this->punitions;
    }

    public function addPunition(Punitions $punition): self
    {
        if (!$this->punitions->contains($punition)) {
            $this->punitions[] = $punition;
            $punition->setPersonnel($this);
        }

        return $this;
    }

    public function removePunition(Punitions $punition): self
    {
        if ($this->punitions->contains($punition)) {
            $this->punitions->removeElement($punition);
            // set the owning side to null (unless already changed)
            if ($punition->getPersonnel() === $this) {
                $punition->setPersonnel(null);
            }
        }

        return $this;
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
            $diplomesPersonnel->setPersonnel($this);
        }

        return $this;
    }

    public function removeDiplomesPersonnel(DiplomesPersonnels $diplomesPersonnel): self
    {
        if ($this->diplomesPersonnels->contains($diplomesPersonnel)) {
            $this->diplomesPersonnels->removeElement($diplomesPersonnel);
            // set the owning side to null (unless already changed)
            if ($diplomesPersonnel->getPersonnel() === $this) {
                $diplomesPersonnel->setPersonnel(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Conjoints[]
     */
    public function getConjoints(): Collection
    {
        return $this->conjoints;
    }

    public function addConjoint(Conjoints $conjoint): self
    {
        if (!$this->conjoints->contains($conjoint)) {
            $this->conjoints[] = $conjoint;
            $conjoint->setPersonnel($this);
        }

        return $this;
    }

    public function removeConjoint(Conjoints $conjoint): self
    {
        if ($this->conjoints->contains($conjoint)) {
            $this->conjoints->removeElement($conjoint);
            // set the owning side to null (unless already changed)
            if ($conjoint->getPersonnel() === $this) {
                $conjoint->setPersonnel(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Enfants[]
     */
    public function getEnfants(): Collection
    {
        return $this->enfants;
    }

    public function addEnfant(Enfants $enfant): self
    {
        if (!$this->enfants->contains($enfant)) {
            $this->enfants[] = $enfant;
            $enfant->setPersonnel($this);
        }

        return $this;
    }

    public function removeEnfant(Enfants $enfant): self
    {
        if ($this->enfants->contains($enfant)) {
            $this->enfants->removeElement($enfant);
            // set the owning side to null (unless already changed)
            if ($enfant->getPersonnel() === $this) {
                $enfant->setPersonnel(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Permissions[]
     */
    public function getPermissions(): Collection
    {
        return $this->permissions;
    }

    public function addPermission(Permissions $permission): self
    {
        if (!$this->permissions->contains($permission)) {
            $this->permissions[] = $permission;
            $permission->setPersonnel($this);
        }

        return $this;
    }

    public function removePermission(Permissions $permission): self
    {
        if ($this->permissions->contains($permission)) {
            $this->permissions->removeElement($permission);
            // set the owning side to null (unless already changed)
            if ($permission->getPersonnel() === $this) {
                $permission->setPersonnel(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|NotesPOS[]
     */
    public function getNotesPOS(): Collection
    {
        return $this->notesPOS;
    }

    public function addNotesPO(NotesPOS $notesPO): self
    {
        if (!$this->notesPOS->contains($notesPO)) {
            $this->notesPOS[] = $notesPO;
            $notesPO->setPersonnels($this);
        }

        return $this;
    }

    public function removeNotesPO(NotesPOS $notesPO): self
    {
        if ($this->notesPOS->contains($notesPO)) {
            $this->notesPOS->removeElement($notesPO);
            // set the owning side to null (unless already changed)
            if ($notesPO->getPersonnels() === $this) {
                $notesPO->setPersonnels(null);
            }
        }

        return $this;
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
            $decorationsPersonnel->setPersonnel($this);
        }

        return $this;
    }

    public function removeDecorationsPersonnel(DecorationsPersonnels $decorationsPersonnel): self
    {
        if ($this->decorationsPersonnels->contains($decorationsPersonnel)) {
            $this->decorationsPersonnels->removeElement($decorationsPersonnel);
            // set the owning side to null (unless already changed)
            if ($decorationsPersonnel->getPersonnel() === $this) {
                $decorationsPersonnel->setPersonnel(null);
            }
        }

        return $this;
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
            $affectationsPersonnel->setPersonnel($this);
        }

        return $this;
    }

    public function removeAffectationsPersonnel(AffectationsPersonnels $affectationsPersonnel): self
    {
        if ($this->affectationsPersonnels->contains($affectationsPersonnel)) {
            $this->affectationsPersonnels->removeElement($affectationsPersonnel);
            // set the owning side to null (unless already changed)
            if ($affectationsPersonnel->getPersonnel() === $this) {
                $affectationsPersonnel->setPersonnel(null);
            }
        }

        return $this;
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
            $radiationsPersonnel->setPersonnel($this);
        }

        return $this;
    }

    public function removeRadiationsPersonnel(RadiationsPersonnels $radiationsPersonnel): self
    {
        if ($this->radiationsPersonnels->contains($radiationsPersonnel)) {
            $this->radiationsPersonnels->removeElement($radiationsPersonnel);
            // set the owning side to null (unless already changed)
            if ($radiationsPersonnel->getPersonnel() === $this) {
                $radiationsPersonnel->setPersonnel(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->setUtilisateur($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->contains($user)) {
            $this->users->removeElement($user);
            // set the owning side to null (unless already changed)
            if ($user->getUtilisateur() === $this) {
                $user->setUtilisateur(null);
            }
        }

        return $this;
    }

    public function getGrade(): ?Grades
    {
        return $this->grade;
    }

    public function setGrade(?Grades $grade): self
    {
        $this->grade = $grade;

        return $this;
    }

    public function getDateDepartRetraite(): ?\DateTimeInterface
    {
        return $this->dateDepartRetraite;
    }

    public function setDateDepartRetraite(?\DateTimeInterface $dateDepartRetraite): self
    {
        $this->dateDepartRetraite = $dateDepartRetraite;

        return $this;
    }

    /**
     * @return Collection|Recompense[]
     */
    public function getRecompenses(): Collection
    {
        return $this->recompenses;
    }

    public function addRecompense(Recompense $recompense): self
    {
        if (!$this->recompenses->contains($recompense)) {
            $this->recompenses[] = $recompense;
            $recompense->setPersonnel($this);
        }

        return $this;
    }

    public function removeRecompense(Recompense $recompense): self
    {
        if ($this->recompenses->removeElement($recompense)) {
            // set the owning side to null (unless already changed)
            if ($recompense->getPersonnel() === $this) {
                $recompense->setPersonnel(null);
            }
        }

        return $this;
    }
}
