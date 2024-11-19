<?php

namespace App\Entity;

use App\Repository\DecisionReintegrationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DecisionReintegrationRepository::class)
 */
class DecisionReintegration
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $libelle;

    /**
     * @ORM\OneToMany(targetEntity=Reintegration::class, mappedBy="decision_reintegration")
     */
    private $reintegrations;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date_reference;

    public function __construct()
    {
        $this->reintegrations = new ArrayCollection();
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
     * @return Collection|Reintegration[]
     */
    public function getReintegrations(): Collection
    {
        return $this->reintegrations;
    }

    public function addReintegration(Reintegration $reintegration): self
    {
        if (!$this->reintegrations->contains($reintegration)) {
            $this->reintegrations[] = $reintegration;
            $reintegration->setDecisionReintegration($this);
        }

        return $this;
    }

    public function removeReintegration(Reintegration $reintegration): self
    {
        if ($this->reintegrations->removeElement($reintegration)) {
            // set the owning side to null (unless already changed)
            if ($reintegration->getDecisionReintegration() === $this) {
                $reintegration->setDecisionReintegration(null);
            }
        }

        return $this;
    }

    public function getDateReference(): ?\DateTimeInterface
    {
        return $this->date_reference;
    }

    public function setDateReference(?\DateTimeInterface $date_reference): self
    {
        $this->date_reference = $date_reference;

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
}
