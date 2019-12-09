<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RadiationsPersonnelsRepository")
 */
class RadiationsPersonnels
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
    private $date_notification;

    /**
     * @ORM\Column(type="string", length=128)
     */
    private $lieu_repli;

    /**
     * @ORM\Column(type="date")
     */
    private $date_radiation;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date_prevu_radiation;

    /**
     * @ORM\Column(type="string", length=128, nullable=true)
     */
    private $reference_mrc_radiation;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date_mrc_radiation;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Personnels", inversedBy="radiationsPersonnels")
     * @ORM\JoinColumn(nullable=false)
     */
    private $personnel;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\MotifsRadiationsControles", inversedBy="radiationsPersonnels")
     */
    private $motif_radiation;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\DetailsMotifsRadiationsControles", inversedBy="radiationsPersonnels")
     */
    private $detail_motif_radiation;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\DecisionsRadiationsControles", inversedBy="radiationsPersonnels")
     */
    private $decision_radiation;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\DroitsPensions", inversedBy="radiationsPersonnels")
     */
    private $droit_pension;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateNotification(): ?\DateTimeInterface
    {
        return $this->date_notification;
    }

    public function setDateNotification(\DateTimeInterface $date_notification): self
    {
        $this->date_notification = $date_notification;

        return $this;
    }

    public function getLieuRepli(): ?string
    {
        return strtoupper($this->lieu_repli);
    }

    public function setLieuRepli(string $lieu_repli): self
    {
        $this->lieu_repli = strtoupper($lieu_repli);

        return $this;
    }

    public function getDateRadiation(): ?\DateTimeInterface
    {
        return $this->date_radiation;
    }

    public function setDateRadiation(\DateTimeInterface $date_radiation): self
    {
        $this->date_radiation = $date_radiation;

        return $this;
    }

    public function getDatePrevuRadiation(): ?\DateTimeInterface
    {
        return $this->date_prevu_radiation;
    }

    public function setDatePrevuRadiation(?\DateTimeInterface $date_prevu_radiation): self
    {
        $this->date_prevu_radiation = $date_prevu_radiation;

        return $this;
    }

    public function getReferenceMrcRadiation(): ?string
    {
        return strtoupper($this->reference_mrc_radiation);
    }

    public function setReferenceMrcRadiation(?string $reference_mrc_radiation): self
    {
        $this->reference_mrc_radiation = strtoupper($reference_mrc_radiation);

        return $this;
    }

    public function getDateMrcRadiation(): ?\DateTimeInterface
    {
        return $this->date_mrc_radiation;
    }

    public function setDateMrcRadiation(?\DateTimeInterface $date_mrc_radiation): self
    {
        $this->date_mrc_radiation = $date_mrc_radiation;

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

    public function getMotifRadiation(): ?MotifsRadiationsControles
    {
        return $this->motif_radiation;
    }

    public function setMotifRadiation(?MotifsRadiationsControles $motif_radiation): self
    {
        $this->motif_radiation = $motif_radiation;

        return $this;
    }

    public function getDetailMotifRadiation(): ?DetailsMotifsRadiationsControles
    {
        return $this->detail_motif_radiation;
    }

    public function setDetailMotifRadiation(?DetailsMotifsRadiationsControles $detail_motif_radiation): self
    {
        $this->detail_motif_radiation = $detail_motif_radiation;

        return $this;
    }

    public function getDecisionRadiation(): ?DecisionsRadiationsControles
    {
        return $this->decision_radiation;
    }

    public function setDecisionRadiation(?DecisionsRadiationsControles $decision_radiation): self
    {
        $this->decision_radiation = $decision_radiation;

        return $this;
    }

    public function getDroitPension(): ?DroitsPensions
    {
        return $this->droit_pension;
    }

    public function setDroitPension(?DroitsPensions $droit_pension): self
    {
        $this->droit_pension = $droit_pension;

        return $this;
    }

    /**
    * toString
    * @return string
    */
    public function __toString()
    {
        return $this->getPersonnel();
    }
}
