<?php

namespace App\Entity;

use App\Repository\PtCollectRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PtCollectRepository::class)]
class PtCollect
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Nom_pc = null;

    #[ORM\Column(length: 255)]
    private ?string $adresse_pc = null;

    #[ORM\Column(nullable: true)]
    private ?float $latitude_pc = null;

    #[ORM\Column(nullable: true)]
    private ?float $longitude_pc = null;

    #[ORM\ManyToMany(targetEntity: TypeDispo::class, inversedBy: 'ptC')]
    private Collection $type;

    #[ORM\OneToMany(mappedBy: 'ptc_id', cascade: ['remove'], targetEntity: ProdR::class)]
    private Collection $prodRs;

    public function __construct()
    {
        $this->type = new ArrayCollection();
        $this->prodRs = new ArrayCollection();
    }
    public function __toString()
    {
        return $this->Nom_pc; // ou toute autre propriété à afficher
    }
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomPc(): ?string
    {
        return $this->Nom_pc;
    }

    public function setNomPc(string $Nom_pc): static
    {
        $this->Nom_pc = $Nom_pc;

        return $this;
    }

    public function getAdressePc(): ?string
    {
        return $this->adresse_pc;
    }

    public function setAdressePc(string $adresse_pc): static
    {
        $this->adresse_pc = $adresse_pc;

        return $this;
    }

    public function getLatitudePc(): ?float
    {
        return $this->latitude_pc;
    }

    public function setLatitudePc(?float $latitude_pc): static
    {
        $this->latitude_pc = $latitude_pc;

        return $this;
    }

    public function getLongitudePc(): ?float
    {
        return $this->longitude_pc;
    }

    public function setLongitudePc(?float $longitude_pc): static
    {
        $this->longitude_pc = $longitude_pc;

        return $this;
    }

    /**
     * @return Collection<int, TypeDispo>
     */
    public function getType(): Collection
    {
        return $this->type;
    }

    public function addType(TypeDispo $type): static
    {
        if (!$this->type->contains($type)) {
            $this->type->add($type);
        }

        return $this;
    }

    public function removeType(TypeDispo $type): static
    {
        $this->type->removeElement($type);

        return $this;
    }

    /**
     * @return Collection<int, ProdR>
     */
    public function getProdRs(): Collection
    {
        return $this->prodRs;
    }

    public function addProdR(ProdR $prodR): static
    {
        if (!$this->prodRs->contains($prodR)) {
            $this->prodRs->add($prodR);
            $prodR->setPtcId($this);
        }

        return $this;
    }

    public function removeProdR(ProdR $prodR): static
    {
        if ($this->prodRs->removeElement($prodR)) {
            // set the owning side to null (unless already changed)
            if ($prodR->getPtcId() === $this) {
                $prodR->setPtcId(null);
            }
        }

        return $this;
    }
}
