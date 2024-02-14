<?php

namespace App\Entity;

use App\Repository\AssociationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AssociationRepository::class)]
class Association
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nomAssociation = null;

    #[ORM\Column(length: 500)]
    private ?string $adresseAssociation = null;

    #[ORM\Column(type: Types::BIGINT)]
    private ?string $RIB = null;

    #[ORM\Column(length: 255)]
    private ?string $logoAssociation = null;

    #[ORM\OneToMany(mappedBy: 'id_association', targetEntity: DonBienMateriel::class)]
    private Collection $donBienMateriels;

    #[ORM\OneToMany(mappedBy: 'id_association', targetEntity: DonArgent::class)]
    private Collection $donArgents;

    public function __construct()
    {
        $this->donBienMateriels = new ArrayCollection();
        $this->donArgents = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomAssociation(): ?string
    {
        return $this->nomAssociation;
    }

    public function setNomAssociation(string $nomAssociation): static
    {
        $this->nomAssociation = $nomAssociation;

        return $this;
    }

    public function getAdresseAssociation(): ?string
    {
        return $this->adresseAssociation;
    }

    public function setAdresseAssociation(string $adresseAssociation): static
    {
        $this->adresseAssociation = $adresseAssociation;

        return $this;
    }

    public function getRIB(): ?string
    {
        return $this->RIB;
    }

    public function setRIB(string $RIB): static
    {
        $this->RIB = $RIB;

        return $this;
    }

    public function getLogoAssociation(): ?string
    {
        return $this->logoAssociation;
    }

    public function setLogoAssociation(string $logoAssociation): static
    {
        $this->logoAssociation = $logoAssociation;

        return $this;
    }

    /**
     * @return Collection<int, DonBienMateriel>
     */
    public function getDonBienMateriels(): Collection
    {
        return $this->donBienMateriels;
    }

    public function addDonBienMateriel(DonBienMateriel $donBienMateriel): static
    {
        if (!$this->donBienMateriels->contains($donBienMateriel)) {
            $this->donBienMateriels->add($donBienMateriel);
            $donBienMateriel->setIdAssociation($this);
        }

        return $this;
    }

    public function removeDonBienMateriel(DonBienMateriel $donBienMateriel): static
    {
        if ($this->donBienMateriels->removeElement($donBienMateriel)) {
            // set the owning side to null (unless already changed)
            if ($donBienMateriel->getIdAssociation() === $this) {
                $donBienMateriel->setIdAssociation(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, DonArgent>
     */
    public function getDonArgents(): Collection
    {
        return $this->donArgents;
    }

    public function addDonArgent(DonArgent $donArgent): static
    {
        if (!$this->donArgents->contains($donArgent)) {
            $this->donArgents->add($donArgent);
            $donArgent->setIdAssociation($this);
        }

        return $this;
    }

    public function removeDonArgent(DonArgent $donArgent): static
    {
        if ($this->donArgents->removeElement($donArgent)) {
            // set the owning side to null (unless already changed)
            if ($donArgent->getIdAssociation() === $this) {
                $donArgent->setIdAssociation(null);
            }
        }

        return $this;
    }
}
