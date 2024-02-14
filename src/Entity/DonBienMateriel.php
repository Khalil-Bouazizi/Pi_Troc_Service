<?php

namespace App\Entity;

use App\Repository\DonBienMaterielRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DonBienMaterielRepository::class)]
class DonBienMateriel
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 500)]
    private ?string $descriptionDon = null;

    #[ORM\Column(length: 255)]
    private ?string $photoDon = null;

    #[ORM\Column]
    private ?bool $statutDon = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateDonBienMateriel = null;

    #[ORM\ManyToOne(inversedBy: 'donBienMateriels')]
    private ?Association $id_association = null;

    #[ORM\ManyToOne(inversedBy: 'donBienMateriels')]
    private ?User $user_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescriptionDon(): ?string
    {
        return $this->descriptionDon;
    }

    public function setDescriptionAssociation(string $descriptionDon): static
    {
        $this->descriptionDon = $descriptionDon;

        return $this;
    }

    public function getPhotoDon(): ?string
    {
        return $this->photoDon;
    }

    public function setPhotoDon(string $photoDon): static
    {
        $this->photoDon = $photoDon;

        return $this;
    }

    public function isStatutDon(): ?bool
    {
        return $this->statutDon;
    }

    public function setStatutDon(bool $statutDon): static
    {
        $this->statutDon = $statutDon;

        return $this;
    }

    public function getDateDonBienMateriel(): ?\DateTimeInterface
    {
        return $this->dateDonBienMateriel;
    }

    public function setDateDonBienMateriel(\DateTimeInterface $dateDonBienMateriel): static
    {
        $this->dateDonBienMateriel = $dateDonBienMateriel;

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

    public function getUserId(): ?User
    {
        return $this->user_id;
    }

    public function setUserId(?User $user_id): static
    {
        $this->user_id = $user_id;

        return $this;
    }
}
