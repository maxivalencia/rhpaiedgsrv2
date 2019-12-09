<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\NotesPersonnelsRepository")
 */
class NotesPersonnels
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
    private $date_note;

    /**
     * @ORM\Column(type="string", length=7)
     */
    private $note;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $appreciation_global;

    /**
     * @ORM\Column(type="string", length=128)
     */
    private $reference_note;

    /**
     * @ORM\Column(type="date")
     */
    private $date_reference;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Personnels", inversedBy="notesPersonnels")
     * @ORM\JoinColumn(nullable=false)
     */
    private $personnel;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateNote(): ?\DateTimeInterface
    {
        return $this->date_note;
    }

    public function setDateNote(\DateTimeInterface $date_note): self
    {
        $this->date_note = $date_note;

        return $this;
    }

    public function getNote(): ?string
    {
        return $this->note;
    }

    public function setNote(string $note): self
    {
        $this->note = $note;

        return $this;
    }

    public function getAppreciationGlobal(): ?string
    {
        return $this->appreciation_global;
    }

    public function setAppreciationGlobal(string $appreciation_global): self
    {
        $this->appreciation_global = $appreciation_global;

        return $this;
    }

    public function getReferenceNote(): ?string
    {
        return strtoupper($this->reference_note);
    }

    public function setReferenceNote(string $reference_note): self
    {
        $this->reference_note = strtoupper($reference_note);

        return $this;
    }

    public function getDateReference(): ?\DateTimeInterface
    {
        return $this->date_reference;
    }

    public function setDateReference(\DateTimeInterface $date_reference): self
    {
        $this->date_reference = $date_reference;

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
        return $this->getNote();
    }
}
