<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CommunesRepository")
 */
class Communes
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=64, nullable=true)
     */
    private $commune;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TypesCommunes", inversedBy="communes")
     * @ORM\JoinColumn(nullable=true)
     */
    private $type;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Districts", inversedBy="communes")
     * @ORM\JoinColumn(nullable=true)
     */
    private $district;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Conjoints", mappedBy="commune")
     */
    private $conjoints;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Unites", mappedBy="commune")
     */
    private $unites;

    public function __construct()
    {
        $this->conjoints = new ArrayCollection();
        $this->unites = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCommune(): ?string
    {
        return strtoupper($this->commune);
    }

    public function setCommune(string $commune): self
    {
        $this->commune = strtoupper($commune);

        return $this;
    }

    public function getType(): ?TypesCommunes
    {
        return $this->type;
    }

    public function setType(?TypesCommunes $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getDistrict(): ?Districts
    {
        return $this->district;
    }

    public function setDistrict(?Districts $district): self
    {
        $this->district = $district;

        return $this;
    }

    /**
    * toString
    * @return string
    */
    public function __toString()
    {
        return $this->getCommune().', District : '.$this->getDistrict();
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
            $conjoint->setCommune($this);
        }

        return $this;
    }

    public function removeConjoint(Conjoints $conjoint): self
    {
        if ($this->conjoints->contains($conjoint)) {
            $this->conjoints->removeElement($conjoint);
            // set the owning side to null (unless already changed)
            if ($conjoint->getCommune() === $this) {
                $conjoint->setCommune(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Unites[]
     */
    public function getUnites(): Collection
    {
        return $this->unites;
    }

    public function addUnite(Unites $unite): self
    {
        if (!$this->unites->contains($unite)) {
            $this->unites[] = $unite;
            $unite->setCommune($this);
        }

        return $this;
    }

    public function removeUnite(Unites $unite): self
    {
        if ($this->unites->contains($unite)) {
            $this->unites->removeElement($unite);
            // set the owning side to null (unless already changed)
            if ($unite->getCommune() === $this) {
                $unite->setCommune(null);
            }
        }

        return $this;
    }
}
