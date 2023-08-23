<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\GradesRepository")
 */
class Grades
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
    private $grade;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $abbreviation;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $rang;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\NominationsPersonnels", mappedBy="grade")
     */
    private $nominationsPersonnels;

    /**
     * @ORM\OneToMany(targetEntity=Personnels::class, mappedBy="grade")
     */
    private $personnel;

    public function __construct()
    {
        $this->nominationsPersonnels = new ArrayCollection();
        $this->personnel = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGrade(): ?string
    {
        return strtoupper($this->grade);
    }

    public function setGrade(string $grade): self
    {
        $this->grade = strtoupper($grade);

        return $this;
    }

    public function getAbbreviation(): ?string
    {
        return strtoupper($this->abbreviation);
    }

    public function setAbbreviation(string $abbreviation): self
    {
        $this->abbreviation = strtoupper($abbreviation);

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

    /**
    * toString
    * @return string
    */
    public function __toString()
    {
        return $this->getAbbreviation();
    }

    /**
     * @return Collection|NominationsPersonnels[]
     */
    public function getNominationsPersonnels(): Collection
    {
        return $this->nominationsPersonnels;
    }

    public function addNominationsPersonnel(NominationsPersonnels $nominationsPersonnel): self
    {
        if (!$this->nominationsPersonnels->contains($nominationsPersonnel)) {
            $this->nominationsPersonnels[] = $nominationsPersonnel;
            $nominationsPersonnel->setGrade($this);
        }

        return $this;
    }

    public function removeNominationsPersonnel(NominationsPersonnels $nominationsPersonnel): self
    {
        if ($this->nominationsPersonnels->contains($nominationsPersonnel)) {
            $this->nominationsPersonnels->removeElement($nominationsPersonnel);
            // set the owning side to null (unless already changed)
            if ($nominationsPersonnel->getGrade() === $this) {
                $nominationsPersonnel->setGrade(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Personnels[]
     */
    public function getPersonnel(): Collection
    {
        return $this->personnel;
    }

    public function addPersonnel(Personnels $personnel): self
    {
        if (!$this->personnel->contains($personnel)) {
            $this->personnel[] = $personnel;
            $personnel->setGrade($this);
        }

        return $this;
    }

    public function removePersonnel(Personnels $personnel): self
    {
        if ($this->personnel->removeElement($personnel)) {
            // set the owning side to null (unless already changed)
            if ($personnel->getGrade() === $this) {
                $personnel->setGrade(null);
            }
        }

        return $this;
    }
}
