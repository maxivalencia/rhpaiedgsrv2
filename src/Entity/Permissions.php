<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PermissionsRepository")
 */
class Permissions
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $annee;

    /**
     * @ORM\Column(type="date")
     */
    private $date_depart;

    /**
     * @ORM\Column(type="date")
     */
    private $date_fin;

    /**
     * @ORM\Column(type="integer")
     */
    private $duree;

    /**
     * @ORM\Column(type="integer")
     */
    private $reliquat;

    /**
     * @ORM\Column(type="string", length=128)
     */
    private $type_permission;

    /**
     * @ORM\Column(type="string", length=128)
     */
    private $lieu_jouissance;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Personnels", inversedBy="permissions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $personnel;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAnnee(): ?\DateTimeInterface
    {
        return $this->annee;
    }

    public function setAnnee(\DateTimeInterface $annee): self
    {
        $this->annee = $annee;

        return $this;
    }

    public function getDateDepart(): ?\DateTimeInterface
    {
        return $this->date_depart;
    }

    public function setDateDepart(\DateTimeInterface $date_depart): self
    {
        $this->date_depart = $date_depart;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->date_fin;
    }

    public function setDateFin(\DateTimeInterface $date_fin): self
    {
        $this->date_fin = $date_fin;

        return $this;
    }

    public function getDuree(): ?int
    {
        return $this->duree;
    }

    public function setDuree(int $duree): self
    {
        $this->duree = $duree;

        return $this;
    }

    public function getReliquat(): ?int
    {
        return $this->reliquat;
    }

    public function setReliquat(int $reliquat): self
    {
        $this->reliquat = $reliquat;

        return $this;
    }

    public function getTypePermission(): ?string
    {
        return $this->type_permission;
    }

    public function setTypePermission(string $type_permission): self
    {
        $this->type_permission = $type_permission;

        return $this;
    }

    public function getLieuJouissance(): ?string
    {
        return $this->lieu_jouissance;
    }

    public function setLieuJouissance(string $lieu_jouissance): self
    {
        $this->lieu_jouissance = $lieu_jouissance;

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
        return $this->getAnnee();
    }
}
