<?php

namespace App\Entity;

use App\Repository\CommandesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommandesRepository::class)]
class Commandes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $etat = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\OneToMany(mappedBy: 'commandes', targetEntity: Annonces::class)]
    private Collection $id_annonce;

    #[ORM\ManyToOne(inversedBy: 'commandes')]
    private ?User $id_user = null;

    public function __construct()
    {
        $this->id_annonce = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEtat(): ?int
    {
        return $this->etat;
    }

    public function setEtat(int $etat): static
    {
        $this->etat = $etat;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): static
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @return Collection<int, Annonces>
     */
    public function getIdAnnonce(): Collection
    {
        return $this->id_annonce;
    }

    public function addIdAnnonce(Annonces $idAnnonce): static
    {
        if (!$this->id_annonce->contains($idAnnonce)) {
            $this->id_annonce->add($idAnnonce);
            $idAnnonce->setCommandes($this);
        }

        return $this;
    }

    public function removeIdAnnonce(Annonces $idAnnonce): static
    {
        if ($this->id_annonce->removeElement($idAnnonce)) {
            // set the owning side to null (unless already changed)
            if ($idAnnonce->getCommandes() === $this) {
                $idAnnonce->setCommandes(null);
            }
        }

        return $this;
    }

    public function getIdUser(): ?User
    {
        return $this->id_user;
    }

    public function setIdUser(?User $id_user): static
    {
        $this->id_user = $id_user;

        return $this;
    }
}
