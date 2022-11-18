<?php

namespace App\Entity;

use App\Repository\SituationSanitaireRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SituationSanitaireRepository::class)
 */
class SituationSanitaire
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Personnels::class, inversedBy="situationSanitaires")
     * @ORM\JoinColumn(nullable=false)
     */
    private $personnel;

    /**
     * @ORM\ManyToOne(targetEntity=TypeMaladie::class, inversedBy="situationSanitaires")
     */
    private $type_maladie;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $hopital_medecin_traitant;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date_debut_traitement;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date_fin_traitement;

    /**
     * @ORM\ManyToOne(targetEntity=TypeTraitement::class, inversedBy="situationSanitaires")
     */
    private $type_traitement;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $maladie;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $lieu_traitement;

    /**
     * @ORM\ManyToOne(targetEntity=FrequenceTraitement::class, inversedBy="situationSanitaires")
     */
    private $frequence_traitement;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $disponibilite_traitement;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adresse_traitant;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $controle_periodique;

    /**
     * @ORM\ManyToOne(targetEntity=SuivieApresTraitement::class, inversedBy="situationSanitaires")
     */
    private $controleur_periodique;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $niveau_danger;

    /**
     * @ORM\ManyToOne(targetEntity=Proche::class, inversedBy="situationSanitaires")
     */
    private $personne_concerner;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getTypeMaladie(): ?TypeMaladie
    {
        return $this->type_maladie;
    }

    public function setTypeMaladie(?TypeMaladie $type_maladie): self
    {
        $this->type_maladie = $type_maladie;

        return $this;
    }

    public function getHopitalMedecinTraitant(): ?string
    {
        return $this->hopital_medecin_traitant;
    }

    public function setHopitalMedecinTraitant(?string $hopital_medecin_traitant): self
    {
        $this->hopital_medecin_traitant = $hopital_medecin_traitant;

        return $this;
    }

    public function getDateDebutTraitement(): ?\DateTimeInterface
    {
        return $this->date_debut_traitement;
    }

    public function setDateDebutTraitement(?\DateTimeInterface $date_debut_traitement): self
    {
        $this->date_debut_traitement = $date_debut_traitement;

        return $this;
    }

    public function getDateFinTraitement(): ?\DateTimeInterface
    {
        return $this->date_fin_traitement;
    }

    public function setDateFinTraitement(?\DateTimeInterface $date_fin_traitement): self
    {
        $this->date_fin_traitement = $date_fin_traitement;

        return $this;
    }

    public function getTypeTraitement(): ?TypeTraitement
    {
        return $this->type_traitement;
    }

    public function setTypeTraitement(?TypeTraitement $type_traitement): self
    {
        $this->type_traitement = $type_traitement;

        return $this;
    }

    public function getMaladie(): ?string
    {
        return $this->maladie;
    }

    public function setMaladie(string $maladie): self
    {
        $this->maladie = $maladie;

        return $this;
    }

    public function getLieuTraitement(): ?string
    {
        return $this->lieu_traitement;
    }

    public function setLieuTraitement(?string $lieu_traitement): self
    {
        $this->lieu_traitement = $lieu_traitement;

        return $this;
    }

    public function getFrequenceTraitement(): ?FrequenceTraitement
    {
        return $this->frequence_traitement;
    }

    public function setFrequenceTraitement(?FrequenceTraitement $frequence_traitement): self
    {
        $this->frequence_traitement = $frequence_traitement;

        return $this;
    }

    public function getDisponibiliteTraitement(): ?string
    {
        return $this->disponibilite_traitement;
    }

    public function setDisponibiliteTraitement(?string $disponibilite_traitement): self
    {
        $this->disponibilite_traitement = $disponibilite_traitement;

        return $this;
    }

    public function getAdresseTraitant(): ?string
    {
        return $this->adresse_traitant;
    }

    public function setAdresseTraitant(?string $adresse_traitant): self
    {
        $this->adresse_traitant = $adresse_traitant;

        return $this;
    }

    public function getControlePeriodique(): ?bool
    {
        return $this->controle_periodique;
    }

    public function setControlePeriodique(?bool $controle_periodique): self
    {
        $this->controle_periodique = $controle_periodique;

        return $this;
    }

    public function getControleurPeriodique(): ?SuivieApresTraitement
    {
        return $this->controleur_periodique;
    }

    public function setControleurPeriodique(?SuivieApresTraitement $controleur_periodique): self
    {
        $this->controleur_periodique = $controleur_periodique;

        return $this;
    }

    public function getNiveauDanger(): ?int
    {
        return $this->niveau_danger;
    }

    public function setNiveauDanger(?int $niveau_danger): self
    {
        $this->niveau_danger = $niveau_danger;

        return $this;
    }

    /**
    * toString
    * @return string
    */
    public function __toString()
    {
        return $this->getMaladie();
    }

    public function getPersonneConcerner(): ?Proche
    {
        return $this->personne_concerner;
    }

    public function setPersonneConcerner(?Proche $personne_concerner): self
    {
        $this->personne_concerner = $personne_concerner;

        return $this;
    }
}
