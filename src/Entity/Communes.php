<?php

namespace App\Entity;

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
     * @ORM\Column(type="string", length=64)
     */
    private $commune;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TypesCommunes", inversedBy="communes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $type;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Districts", inversedBy="communes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $district;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCommune(): ?string
    {
        return $this->commune;
    }

    public function setCommune(string $commune): self
    {
        $this->commune = $commune;

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
        return $this->getCommune();
    }
}
