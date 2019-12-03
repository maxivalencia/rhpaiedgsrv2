<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DomaineDiplomeRepository")
 */
class DomaineDiplome
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
    private $libelle;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Diplomes", mappedBy="domaine")
     */
    private $diplomes;

    public function __construct()
    {
        $this->diplomes = new ArrayCollection();
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
     * @return Collection|Diplomes[]
     */
    public function getDiplomes(): Collection
    {
        return $this->diplomes;
    }

    public function addDiplome(Diplomes $diplome): self
    {
        if (!$this->diplomes->contains($diplome)) {
            $this->diplomes[] = $diplome;
            $diplome->setDomaine($this);
        }

        return $this;
    }

    public function removeDiplome(Diplomes $diplome): self
    {
        if ($this->diplomes->contains($diplome)) {
            $this->diplomes->removeElement($diplome);
            // set the owning side to null (unless already changed)
            if ($diplome->getDomaine() === $this) {
                $diplome->setDomaine(null);
            }
        }

        return $this;
    }
}
