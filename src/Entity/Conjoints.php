<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ConjointsRepository")
 */
class Conjoints
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $lieu_naissance;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nom_pere;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nom_mere;

    /**
     * @ORM\Column(type="boolean")
     */
    private $sexe;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date_mariage;

    /**
     * @ORM\Column(type="string", length=12, nullable=true)
     */
    private $numero_cin;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date_cin;

    /**
     * @ORM\Column(type="string", length=128, nullable=true)
     */
    private $lieu_cin;

    /**
     * @ORM\Column(type="string", length=128, nullable=true)
     */
    private $reference_autorisation_mariage;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date_reference_autorisation_mariage;

    /**
     * @ORM\Column(type="string", length=128, nullable=true)
     */
    private $lieu_mariage;

    /**
     * @ORM\Column(type="string", length=128, nullable=true)
     */
    private $reference_officiel_mariage;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date_reference_officiel_mariage;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Communes", inversedBy="conjoints")
     */
    private $commune;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Personnels", inversedBy="conjoints")
     */
    private $personnel;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ExConjoints", mappedBy="conjoint")
     */
    private $exConjoints;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\FonctionsConjoints", mappedBy="conjoint")
     */
    private $fonctionsConjoints;

    public function __construct()
    {
        $this->exConjoints = new ArrayCollection();
        $this->fonctionsConjoints = new ArrayCollection();
    }

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

    public function getSexe(): ?bool
    {
        return $this->sexe;
    }

    public function setSexe(bool $sexe): self
    {
        $this->sexe = $sexe;

        return $this;
    }

    public function getDateMariage(): ?\DateTimeInterface
    {
        return $this->date_mariage;
    }

    public function setDateMariage(\DateTimeInterface $date_mariage): self
    {
        $this->date_mariage = $date_mariage;

        return $this;
    }

    public function getNumeroCin(): ?string
    {
        return $this->numero_cin;
    }

    public function setNumeroCin(string $numero_cin): self
    {
        $this->numero_cin = $numero_cin;

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

    public function getReferenceAutorisationMariage(): ?string
    {
        return strtoupper($this->reference_autorisation_mariage);
    }

    public function setReferenceAutorisationMariage(?string $reference_autorisation_mariage): self
    {
        $this->reference_autorisation_mariage = strtoupper($reference_autorisation_mariage);

        return $this;
    }

    public function getDateReferenceAutorisationMariage(): ?\DateTimeInterface
    {
        return $this->date_reference_autorisation_mariage;
    }

    public function setDateReferenceAutorisationMariage(?\DateTimeInterface $date_reference_autorisation_mariage): self
    {
        $this->date_reference_autorisation_mariage = $date_reference_autorisation_mariage;

        return $this;
    }

    public function getLieuMariage(): ?string
    {
        return $this->lieu_mariage;
    }

    public function setLieuMariage(string $lieu_mariage): self
    {
        $this->lieu_mariage = $lieu_mariage;

        return $this;
    }

    public function getReferenceOfficielMariage(): ?string
    {
        return strtoupper($this->reference_officiel_mariage);
    }

    public function setReferenceOfficielMariage(string $reference_officiel_mariage): self
    {
        $this->reference_officiel_mariage = strtoupper($reference_officiel_mariage);

        return $this;
    }

    public function getDateReferenceOfficielMariage(): ?\DateTimeInterface
    {
        return $this->date_reference_officiel_mariage;
    }

    public function setDateReferenceOfficielMariage(\DateTimeInterface $date_reference_officiel_mariage): self
    {
        $this->date_reference_officiel_mariage = $date_reference_officiel_mariage;

        return $this;
    }

    public function getCommune(): ?Communes
    {
        return $this->commune;
    }

    public function setCommune(?Communes $commune): self
    {
        $this->commune = $commune;

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
     * @return Collection|ExConjoints[]
     */
    public function getExConjoints(): Collection
    {
        return $this->exConjoints;
    }

    public function addExConjoint(ExConjoints $exConjoint): self
    {
        if (!$this->exConjoints->contains($exConjoint)) {
            $this->exConjoints[] = $exConjoint;
            $exConjoint->setConjoint($this);
        }

        return $this;
    }

    public function removeExConjoint(ExConjoints $exConjoint): self
    {
        if ($this->exConjoints->contains($exConjoint)) {
            $this->exConjoints->removeElement($exConjoint);
            // set the owning side to null (unless already changed)
            if ($exConjoint->getConjoint() === $this) {
                $exConjoint->setConjoint(null);
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
        return $this->getNom().' '.$this->getPrenom();
    }

    /**
     * @return Collection|FonctionsConjoints[]
     */
    public function getFonctionsConjoints(): Collection
    {
        return $this->fonctionsConjoints;
    }

    public function addFonctionsConjoint(FonctionsConjoints $fonctionsConjoint): self
    {
        if (!$this->fonctionsConjoints->contains($fonctionsConjoint)) {
            $this->fonctionsConjoints[] = $fonctionsConjoint;
            $fonctionsConjoint->setConjoint($this);
        }

        return $this;
    }

    public function removeFonctionsConjoint(FonctionsConjoints $fonctionsConjoint): self
    {
        if ($this->fonctionsConjoints->contains($fonctionsConjoint)) {
            $this->fonctionsConjoints->removeElement($fonctionsConjoint);
            // set the owning side to null (unless already changed)
            if ($fonctionsConjoint->getConjoint() === $this) {
                $fonctionsConjoint->setConjoint(null);
            }
        }

        return $this;
    }
}
