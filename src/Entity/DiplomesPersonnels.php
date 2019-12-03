<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DiplomesPersonnelsRepository")
 */
class DiplomesPersonnels
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
    private $numero;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Diplomes", inversedBy="diplomesPersonnels")
     * @ORM\JoinColumn(nullable=false)
     */
    private $diplome;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Personnels", inversedBy="diplomesPersonnels")
     * @ORM\JoinColumn(nullable=false)
     */
    private $personnel;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumero(): ?string
    {
        return $this->numero;
    }

    public function setNumero(string $numero): self
    {
        $this->numero = $numero;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getDiplome(): ?Diplomes
    {
        return $this->diplome;
    }

    public function setDiplome(?Diplomes $diplome): self
    {
        $this->diplome = $diplome;

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
    * toString
    * @return string
    */
    public function __toString()
    {
        return $this->getNumero();
    }
}
