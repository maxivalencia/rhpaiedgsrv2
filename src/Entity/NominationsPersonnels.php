<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\NominationsPersonnelsRepository")
 */
class NominationsPersonnels
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date_nomination;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $rang;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $echelon;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $class;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $indice;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Grades", inversedBy="nominationsPersonnels")
     * @ORM\JoinColumn(nullable=true)
     */
    private $grade;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Personnels", inversedBy="nominationsPersonnels")
     * @ORM\JoinColumn(nullable=true)
     */
    private $personnel;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\DecisionsPromotions", inversedBy="nominationsPersonnels")
     * @ORM\JoinColumn(nullable=true)
     */
    private $decision;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateNomination(): ?\DateTimeInterface
    {
        return $this->date_nomination;
    }

    public function setDateNomination(\DateTimeInterface $date_nomination): self
    {
        $this->date_nomination = $date_nomination;

        return $this;
    }

    public function getRang(): ?int
    {
        return $this->rang;
    }

    public function setRang(int $rang): self
    {
        $this->rang = $rang;

        return $this;
    }

    public function getEchelon(): ?int
    {
        return $this->echelon;
    }

    public function setEchelon(int $echelon): self
    {
        $this->echelon = $echelon;

        return $this;
    }

    public function getClass(): ?int
    {
        return $this->class;
    }

    public function setClass(int $class): self
    {
        $this->class = $class;

        return $this;
    }

    public function getIndice(): ?int
    {
        return $this->indice;
    }

    public function setIndice(int $indice): self
    {
        $this->indice = $indice;

        return $this;
    }

    public function getGrade(): ?Grades
    {
        return $this->grade;
    }

    public function setGrade(?Grades $grade): self
    {
        $this->grade = $grade;

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

    public function getDecision(): ?DecisionsPromotions
    {
        return $this->decision;
    }

    public function setDecision(?DecisionsPromotions $decision): self
    {
        $this->decision = $decision;

        return $this;
    }

    /**
    * toString
    * @return string
    */
    public function __toString()
    {
        return $this->getGrade();
    }
}
