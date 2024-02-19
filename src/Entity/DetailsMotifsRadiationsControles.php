<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DetailsMotifsRadiationsControlesRepository")
 */
class DetailsMotifsRadiationsControles
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $detail_motif_radiation;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\RadiationsPersonnels", mappedBy="detail_motif_radiation")
     */
    private $radiationsPersonnels;

    public function __construct()
    {
        $this->radiationsPersonnels = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDetailMotifRadiation(): ?string
    {
        return strtoupper($this->detail_motif_radiation);
    }

    public function setDetailMotifRadiation(string $detail_motif_radiation): self
    {
        $this->detail_motif_radiation = strtoupper($detail_motif_radiation);

        return $this;
    }

    /**
    * toString
    * @return string
    */
    public function __toString()
    {
        return $this->getDetailMotifRadiation();
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
            $radiationsPersonnel->setDetailMotifRadiation($this);
        }

        return $this;
    }

    public function removeRadiationsPersonnel(RadiationsPersonnels $radiationsPersonnel): self
    {
        if ($this->radiationsPersonnels->contains($radiationsPersonnel)) {
            $this->radiationsPersonnels->removeElement($radiationsPersonnel);
            // set the owning side to null (unless already changed)
            if ($radiationsPersonnel->getDetailMotifRadiation() === $this) {
                $radiationsPersonnel->setDetailMotifRadiation(null);
            }
        }

        return $this;
    }
}
