<?php

namespace App\Entity;

use App\Repository\ProcheRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProcheRepository::class)
 */
class Proche
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=64)
     */
    private $libelle;

    /**
     * @ORM\OneToMany(targetEntity=SituationSanitaire::class, mappedBy="personne_concerner")
     */
    private $situationSanitaires;

    public function __construct()
    {
        $this->situationSanitaires = new ArrayCollection();
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

    /**
    * toString
    * @return string
    */
    public function __toString()
    {
        return $this->getLibelle();
    }

    /**
     * @return Collection|SituationSanitaire[]
     */
    public function getSituationSanitaires(): Collection
    {
        return $this->situationSanitaires;
    }

    public function addSituationSanitaire(SituationSanitaire $situationSanitaire): self
    {
        if (!$this->situationSanitaires->contains($situationSanitaire)) {
            $this->situationSanitaires[] = $situationSanitaire;
            $situationSanitaire->setPersonneConcerner($this);
        }

        return $this;
    }

    public function removeSituationSanitaire(SituationSanitaire $situationSanitaire): self
    {
        if ($this->situationSanitaires->removeElement($situationSanitaire)) {
            // set the owning side to null (unless already changed)
            if ($situationSanitaire->getPersonneConcerner() === $this) {
                $situationSanitaire->setPersonneConcerner(null);
            }
        }

        return $this;
    }
}
