<?php

namespace App\Entity;

use App\Repository\TypeDispoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TypeDispoRepository::class)]
class TypeDispo
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\ManyToMany(targetEntity: PtCollect::class, mappedBy: 'type')]
    private Collection $ptC;


    #[ORM\OneToMany(mappedBy: 'typeProd_id', targetEntity: ProdR::class, cascade: ['remove'])]
    private Collection $prodR_type;

    public function __construct()
    {
        $this->ptC = new ArrayCollection();
        $this->prodR_type = new ArrayCollection();
    }
    public function __toString()
    {
        return $this->nom; // ou toute autre propriété à afficher
    }
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return Collection<int, PtCollect>
     */
    public function getPtC(): Collection
    {
        return $this->ptC;
    }

    public function addPtC(PtCollect $ptC): static
    {
        if (!$this->ptC->contains($ptC)) {
            $this->ptC->add($ptC);
            $ptC->addType($this);
        }

        return $this;
    }

    public function removePtC(PtCollect $ptC): static
    {
        if ($this->ptC->removeElement($ptC)) {
            $ptC->removeType($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, ProdR>
     */
    public function getProdRType(): Collection
    {
        return $this->prodR_type;
    }

    public function addProdRType(ProdR $prodRType): static
    {
        if (!$this->prodR_type->contains($prodRType)) {
            $this->prodR_type->add($prodRType);
            $prodRType->setTypeProdId($this);
        }

        return $this;
    }

    public function removeProdRType(ProdR $prodRType): static
    {
        if ($this->prodR_type->removeElement($prodRType)) {
            // set the owning side to null (unless already changed)
            if ($prodRType->getTypeProdId() === $this) {
                $prodRType->setTypeProdId(null);
            }
        }

        return $this;
    }
}
