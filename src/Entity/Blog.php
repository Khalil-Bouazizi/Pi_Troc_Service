<?php

namespace App\Entity;

use App\Repository\BlogRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BlogRepository::class)]
class Blog
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $category = null;

    #[ORM\Column(length: 255)]
    private ?string $titre = null;

    #[ORM\Column(length: 500)]
    private ?string $contenu_blog = null;

    #[ORM\Column]
    private ?int $status = null;

    #[ORM\Column(nullable: true)]
    private ?int $rate = null;

    #[ORM\ManyToOne(inversedBy: 'blogs')]
    private ?User $user = null;

    #[ORM\OneToMany(mappedBy: 'blog', targetEntity: ReponseBlog::class)]
    private Collection $reponseBlogs;

    public function __construct()
    {
        $this->reponseBlogs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(string $category): static
    {
        $this->category = $category;

        return $this;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): static
    {
        $this->titre = $titre;

        return $this;
    }

    public function getContenuBlog(): ?string
    {
        return $this->contenu_blog;
    }

    public function setContenuBlog(string $contenu_blog): static
    {
        $this->contenu_blog = $contenu_blog;

        return $this;
    }

    public function getStatus(): ?int
    {
        return $this->status;
    }

    public function setStatus(int $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getRate(): ?int
    {
        return $this->rate;
    }

    public function setRate(?int $rate): static
    {
        $this->rate = $rate;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection<int, ReponseBlog>
     */
    public function getReponseBlogs(): Collection
    {
        return $this->reponseBlogs;
    }

    public function addReponseBlog(ReponseBlog $reponseBlog): static
    {
        if (!$this->reponseBlogs->contains($reponseBlog)) {
            $this->reponseBlogs->add($reponseBlog);
            $reponseBlog->setBlog($this);
        }

        return $this;
    }

    public function removeReponseBlog(ReponseBlog $reponseBlog): static
    {
        if ($this->reponseBlogs->removeElement($reponseBlog)) {
            // set the owning side to null (unless already changed)
            if ($reponseBlog->getBlog() === $this) {
                $reponseBlog->setBlog(null);
            }
        }

        return $this;
    }
}
