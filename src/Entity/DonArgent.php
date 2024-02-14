<?php

namespace App\Entity;

use App\Repository\DonArgentRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DonArgentRepository::class)]
class DonArgent
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?float $montant = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateDonArgent = null;

    #[ORM\ManyToOne(inversedBy: 'donArgents')]
    private ?User $user_id = null;

    #[ORM\ManyToOne(inversedBy: 'donArgents')]
    private ?Association $id_association = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMontant(): ?float
    {
        return $this->montant;
    }

    public function setMontant(float $montant): static
    {
        $this->montant = $montant;

        return $this;
    }

    public function getDateDonArgent(): ?\DateTimeInterface
    {
        return $this->dateDonArgent;
    }

    public function setDateDonArgent(\DateTimeInterface $dateDonArgent): static
    {
        $this->dateDonArgent = $dateDonArgent;

        return $this;
    }

    public function getUserId(): ?User
    {
        return $this->user_id;
    }

    public function setUserId(?User $user_id): static
    {
        $this->user_id = $user_id;

        return $this;
    }

    public function getIdAssociation(): ?Association
    {
        return $this->id_association;
    }

    public function setIdAssociation(?Association $id_association): static
    {
        $this->id_association = $id_association;

        return $this;
    }
}
