<?php

namespace App\Entity;

use App\Repository\ReintegrationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ReintegrationRepository::class)
 */
class Reintegration
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Personnels::class, inversedBy="reintegrations")
     * @ORM\JoinColumn(nullable=true)
     */
    private $personnel;

    /**
     * @ORM\ManyToOne(targetEntity=MotifReintegration::class, inversedBy="reintegrations")
     * @ORM\JoinColumn(nullable=true)
     */
    private $motif_reintegration;

    /**
     * @ORM\ManyToOne(targetEntity=DetailsMotifsReintegration::class, inversedBy="reintegrations")
     * @ORM\JoinColumn(nullable=true)
     */
    private $detail_motif_reintegration;

    /**
     * @ORM\ManyToOne(targetEntity=DecisionReintegration::class, inversedBy="reintegrations")
     * @ORM\JoinColumn(nullable=true)
     */
    private $decision_reintegration;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date_notification;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date_reintegration;

    /**
     * @ORM\ManyToOne(targetEntity=Unites::class, inversedBy="reintegrations")
     * @ORM\JoinColumn(nullable=true)
     */
    private $unite;

    /**
     * @ORM\Column(type="string", length=128, nullable=true)
     */
    private $reference_rc_reintegration;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date_rc_reintegration;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date_prevu_reintegration;

    /**
     * @ORM\ManyToOne(targetEntity=RadiationsPersonnels::class, inversedBy="reintegrations")
     * @ORM\JoinColumn(nullable=true)
     */
    private $radiation;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getMotifReintegration(): ?MotifReintegration
    {
        return $this->motif_reintegration;
    }

    public function setMotifReintegration(?MotifReintegration $motif_reintegration): self
    {
        $this->motif_reintegration = $motif_reintegration;

        return $this;
    }

    public function getDetailMotifReintegration(): ?DetailsMotifsReintegration
    {
        return $this->detail_motif_reintegration;
    }

    public function setDetailMotifReintegration(?DetailsMotifsReintegration $detail_motif_reintegration): self
    {
        $this->detail_motif_reintegration = $detail_motif_reintegration;

        return $this;
    }

    public function getDecisionReintegration(): ?DecisionReintegration
    {
        return $this->decision_reintegration;
    }

    public function setDecisionReintegration(?DecisionReintegration $decision_reintegration): self
    {
        $this->decision_reintegration = $decision_reintegration;

        return $this;
    }

    public function getDateNotification(): ?\DateTimeInterface
    {
        return $this->date_notification;
    }

    public function setDateNotification(?\DateTimeInterface $date_notification): self
    {
        $this->date_notification = $date_notification;

        return $this;
    }

    public function getDateReintegration(): ?\DateTimeInterface
    {
        return $this->date_reintegration;
    }

    public function setDateReintegration(?\DateTimeInterface $date_reintegration): self
    {
        $this->date_reintegration = $date_reintegration;

        return $this;
    }

    public function getUnite(): ?Unites
    {
        return $this->unite;
    }

    public function setUnite(?Unites $unite): self
    {
        $this->unite = $unite;

        return $this;
    }

    public function getReferenceRcReintegration(): ?string
    {
        return $this->reference_rc_reintegration;
    }

    public function setReferenceRcReintegration(?string $reference_rc_reintegration): self
    {
        $this->reference_rc_reintegration = $reference_rc_reintegration;

        return $this;
    }

    public function getDateRcReintegration(): ?\DateTimeInterface
    {
        return $this->date_rc_reintegration;
    }

    public function setDateRcReintegration(?\DateTimeInterface $date_rc_reintegration): self
    {
        $this->date_rc_reintegration = $date_rc_reintegration;

        return $this;
    }

    public function getDatePrevuReintegration(): ?\DateTimeInterface
    {
        return $this->date_prevu_reintegration;
    }

    public function setDatePrevuReintegration(?\DateTimeInterface $date_prevu_reintegration): self
    {
        $this->date_prevu_reintegration = $date_prevu_reintegration;

        return $this;
    }

    public function getRadiation(): ?RadiationsPersonnels
    {
        return $this->radiation;
    }

    public function setRadiation(?RadiationsPersonnels $radiation): self
    {
        $this->radiation = $radiation;

        return $this;
    }

    /**
    * toString
    * @return string
    */
    public function __toString()
    {
        return $this->getDecisionReintegration().' '.$this->getMotifReintegration();
    }
}
