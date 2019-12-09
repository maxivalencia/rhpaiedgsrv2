<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TypesContratsRepository")
 */
class TypesContrats
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=64)
     */
    private $type;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Personnels", mappedBy="contrat")
     */
    private $personnels;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\FonctionsConjoints", mappedBy="type_contrat")
     */
    private $fonctionsConjoints;

    public function __construct()
    {
        $this->personnels = new ArrayCollection();
        $this->fonctionsConjoints = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return strtoupper($this->type);
    }

    public function setType(string $type): self
    {
        $this->type = strtoupper($type);

        return $this;
    }

    /**
     * @return Collection|Personnels[]
     */
    public function getPersonnels(): Collection
    {
        return $this->personnels;
    }

    public function addPersonnel(Personnels $personnel): self
    {
        if (!$this->personnels->contains($personnel)) {
            $this->personnels[] = $personnel;
            $personnel->setContrat($this);
        }

        return $this;
    }

    public function removePersonnel(Personnels $personnel): self
    {
        if ($this->personnels->contains($personnel)) {
            $this->personnels->removeElement($personnel);
            // set the owning side to null (unless already changed)
            if ($personnel->getContrat() === $this) {
                $personnel->setContrat(null);
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
        return $this->getType();
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
            $fonctionsConjoint->setTypeContrat($this);
        }

        return $this;
    }

    public function removeFonctionsConjoint(FonctionsConjoints $fonctionsConjoint): self
    {
        if ($this->fonctionsConjoints->contains($fonctionsConjoint)) {
            $this->fonctionsConjoints->removeElement($fonctionsConjoint);
            // set the owning side to null (unless already changed)
            if ($fonctionsConjoint->getTypeContrat() === $this) {
                $fonctionsConjoint->setTypeContrat(null);
            }
        }

        return $this;
    }
}
