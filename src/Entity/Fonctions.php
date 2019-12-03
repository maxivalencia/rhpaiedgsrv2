<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FonctionsRepository")
 */
class Fonctions
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
     * @ORM\Column(type="string", length=128)
     */
    private $abbreviation;

    /**
     * @ORM\Column(type="integer")
     */
    private $hierarchie;

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

    public function getAbbreviation(): ?string
    {
        return $this->abbreviation;
    }

    public function setAbbreviation(string $abbreviation): self
    {
        $this->abbreviation = $abbreviation;

        return $this;
    }

    public function getHierarchie(): ?int
    {
        return $this->hierarchie;
    }

    public function setHierarchie(int $hierarchie): self
    {
        $this->hierarchie = $hierarchie;

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
