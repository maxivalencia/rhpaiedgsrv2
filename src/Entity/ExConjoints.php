<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ExConjointsRepository")
 */
class ExConjoints
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $motif_rupture;

    /**
     * @ORM\Column(type="date")
     */
    private $date_rupture;

    /**
     * @ORM\Column(type="string", length=128, nullable=true)
     */
    private $reference_rupture;

    /**
     * @ORM\Column(type="date")
     */
    private $date_reference_rupture;

    /**
     * @ORM\Column(type="string", length=128, nullable=true)
     */
    private $adresse_veuve;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Conjoints", inversedBy="exConjoints")
     * @ORM\JoinColumn(nullable=false)
     */
    private $conjoint;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMotifRupture(): ?string
    {
        return $this->motif_rupture;
    }

    public function setMotifRupture(string $motif_rupture): self
    {
        $this->motif_rupture = $motif_rupture;

        return $this;
    }

    public function getDateRupture(): ?\DateTimeInterface
    {
        return $this->date_rupture;
    }

    public function setDateRupture(\DateTimeInterface $date_rupture): self
    {
        $this->date_rupture = $date_rupture;

        return $this;
    }

    public function getReferenceRupture(): ?string
    {
        return strtoupper($this->reference_rupture);
    }

    public function setReferenceRupture(?string $reference_rupture): self
    {
        $this->reference_rupture = strtoupper($reference_rupture);

        return $this;
    }

    public function getDateReferenceRupture(): ?\DateTimeInterface
    {
        return $this->date_reference_rupture;
    }

    public function setDateReferenceRupture(\DateTimeInterface $date_reference_rupture): self
    {
        $this->date_reference_rupture = $date_reference_rupture;

        return $this;
    }

    public function getAdresseVeuve(): ?string
    {
        return $this->adresse_veuve;
    }

    public function setAdresseVeuve(?string $adresse_veuve): self
    {
        $this->adresse_veuve = $adresse_veuve;

        return $this;
    }

    public function getConjoint(): ?Conjoints
    {
        return $this->conjoint;
    }

    public function setConjoint(?Conjoints $conjoint): self
    {
        $this->conjoint = $conjoint;

        return $this;
    }

    /**
    * toString
    * @return string
    */
    public function __toString()
    {
        return $this->getConjoint();
    }
}
