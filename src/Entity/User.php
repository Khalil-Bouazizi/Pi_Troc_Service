<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[UniqueEntity(fields: ['mail'], message: 'There is already an account with this email')]
#[UniqueEntity(fields: ['tel'], message: 'There is already an account with this phone number')]

class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\Length(
        min: 3,
        max: 10,
    )]
    #[Assert\Regex(
        pattern: '/^[a-z]+$/i',
        message: 'the first name must only contains characters[a-z].'
    )]
    #[Assert\NotBlank(message:"First Name is required")]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    #[Assert\Length(
        min: 3,
        max: 10,
        exactMessage: 'less characters for your last name'
    )]
    #[Assert\Regex(
        pattern: '/^[a-z]+$/i',
        message: 'the last name must only contains characters[a-z].'
    )]
    #[Assert\NotBlank(message:"Last Name is required")]

    private ?string $prenom = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message:"Mail please")]
    #[Assert\Email(
        message: 'The email {{ value }} is not a valid email.',
    )]
    private ?string $mail = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: "Phone number is required")]
    #[Assert\Length(
        min: 8,
        max: 8,
        exactMessage: 'The telephone number must consist of exactly 8 characters.'
    )]
    #[Assert\Regex(
        pattern: '/^\d{8}$/',
        message: 'The telephone number must consist of 8 numeric characters.'
    )]
    private ?string $tel = null;
    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message:"Gender is required")]
    private ?string $gender = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message:"Password is required")]
    #[Assert\Regex(
        pattern: '/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()-_=+{};:,<.>]).{8,}$/',
        message: 'Your password is too weak. Please include at least one uppercase letter, one lowercase letter, one digit, and one special character.'
    )]
    private ?string $password = null;

    #[ORM\Column]
    private ?int $nb_points = null;

    #[ORM\Column]
    #[Assert\NotBlank(message:"Age is required")]
    #[Assert\Positive]
    private ?int $age = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    #[Assert\NotBlank(message:"Birthday date is required")]
    private ?\DateTimeInterface $date_birthday = null;

    #[ORM\Column(length: 255)]
    #[Assert\Regex(
        pattern: '/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()-_=+{};:,<.>]).{8,}$/',
        message: 'Your password is too weak. Please include at least one uppercase letter, one lowercase letter, one digit, and one special character.'
    )]
    #[Assert\NotBlank(message:"Confirm password is required")]

    private ?string $Confirmpassword = null;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: Product::class)]
    private Collection $products;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: Blog::class)]
    private Collection $blogs;

    #[ORM\OneToMany(mappedBy: 'id_user_reponse', targetEntity: ReponseBlog::class)]
    private Collection $reponseBlogs;

    #[ORM\OneToMany(mappedBy: 'user_id', targetEntity: ProdR::class)]
    private Collection $prodRs;

    #[ORM\OneToMany(mappedBy: 'id_user', targetEntity: Annonces::class)]
    private Collection $annonces;

    #[ORM\OneToMany(mappedBy: 'id_user', targetEntity: ProduitTroc::class)]
    private Collection $produitTrocs;

    #[ORM\OneToMany(mappedBy: 'id_user', targetEntity: Commandes::class)]
    private Collection $commandes;

    #[ORM\OneToMany(mappedBy: 'user_id', targetEntity: DonBienMateriel::class)]
    private Collection $donBienMateriels;

    #[ORM\OneToMany(mappedBy: 'user_id', targetEntity: DonArgent::class)]
    private Collection $donArgents;

    public function __construct()
    {
        $this->products = new ArrayCollection();
        $this->blogs = new ArrayCollection();
        $this->reponseBlogs = new ArrayCollection();
        $this->prodRs = new ArrayCollection();
        $this->annonces = new ArrayCollection();
        $this->produitTrocs = new ArrayCollection();
        $this->commandes = new ArrayCollection();
        $this->donBienMateriels = new ArrayCollection();
        $this->donArgents = new ArrayCollection();
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): static
    {
        $this->mail = $mail;

        return $this;
    }

    public function getTel(): ?string
    {
        return $this->tel;
    }

    public function setTel(string $tel): static
    {
        $this->tel = $tel;

        return $this;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(string $gender): static
    {
        $this->gender = $gender;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    public function getNbPoints(): ?int
    {
        return $this->nb_points;
    }

    public function setNbPoints(int $nb_points): static
    {
        $this->nb_points = $nb_points;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(int $age): static
    {
        $this->age = $age;

        return $this;
    }

    public function getDateBirthday(): ?\DateTimeInterface
    {
        return $this->date_birthday;
    }

    public function setDateBirthday(\DateTimeInterface $date_birthday): static
    {
        $this->date_birthday = $date_birthday;

        return $this;
    }

    public function getConfirmpassword(): ?string
    {
        return $this->Confirmpassword;
    }

    public function setConfirmpassword(string $Confirmpassword): static
    {
        $this->Confirmpassword = $Confirmpassword;

        return $this;
    }

    // Implementing UserInterface methods

    public function getRoles(): array
    {
        // Return an array of roles for the user, e.g., ['ROLE_USER']
        return ['ROLE_USER'];
    }

    public function eraseCredentials()
    {
        // Implement if you store any temporary, sensitive data on the user
    }

    public function getSalt()
    {
        // Implement if you are not using a modern algorithm for password hashing
        // This method is deprecated in Symfony 5.3 and removed in Symfony 6
    }

    public function getUsername(): string
    {
        // Implement to return the username of the user
        return $this->id;
    }
    public function getAllAttributes(): array
    {
        return [
            'id' => $this->id,
            'nom' => $this->nom,
            'prenom' => $this->prenom,
            'mail' => $this->mail,
        ];
    }

    /**
     * @return Collection<int, Product>
     */
    public function getProducts(): Collection
    {
        return $this->products;
    }

    public function addProduct(Product $product): static
    {
        if (!$this->products->contains($product)) {
            $this->products->add($product);
            $product->setUser($this);
        }

        return $this;
    }

    public function removeProduct(Product $product): static
    {
        if ($this->products->removeElement($product)) {
            // set the owning side to null (unless already changed)
            if ($product->getUser() === $this) {
                $product->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Blog>
     */
    public function getBlogs(): Collection
    {
        return $this->blogs;
    }

    public function addBlog(Blog $blog): static
    {
        if (!$this->blogs->contains($blog)) {
            $this->blogs->add($blog);
            $blog->setUser($this);
        }

        return $this;
    }

    public function removeBlog(Blog $blog): static
    {
        if ($this->blogs->removeElement($blog)) {
            // set the owning side to null (unless already changed)
            if ($blog->getUser() === $this) {
                $blog->setUser(null);
            }
        }

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
            $reponseBlog->setIdUserReponse($this);
        }

        return $this;
    }

    public function removeReponseBlog(ReponseBlog $reponseBlog): static
    {
        if ($this->reponseBlogs->removeElement($reponseBlog)) {
            // set the owning side to null (unless already changed)
            if ($reponseBlog->getIdUserReponse() === $this) {
                $reponseBlog->setIdUserReponse(null);
            }
        }

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
            $prodR->setUserId($this);
        }

        return $this;
    }

    public function removeProdR(ProdR $prodR): static
    {
        if ($this->prodRs->removeElement($prodR)) {
            // set the owning side to null (unless already changed)
            if ($prodR->getUserId() === $this) {
                $prodR->setUserId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Annonces>
     */
    public function getAnnonces(): Collection
    {
        return $this->annonces;
    }

    public function addAnnonce(Annonces $annonce): static
    {
        if (!$this->annonces->contains($annonce)) {
            $this->annonces->add($annonce);
            $annonce->setIdUser($this);
        }

        return $this;
    }

    public function removeAnnonce(Annonces $annonce): static
    {
        if ($this->annonces->removeElement($annonce)) {
            // set the owning side to null (unless already changed)
            if ($annonce->getIdUser() === $this) {
                $annonce->setIdUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ProduitTroc>
     */
    public function getProduitTrocs(): Collection
    {
        return $this->produitTrocs;
    }

    public function addProduitTroc(ProduitTroc $produitTroc): static
    {
        if (!$this->produitTrocs->contains($produitTroc)) {
            $this->produitTrocs->add($produitTroc);
            $produitTroc->setIdUser($this);
        }

        return $this;
    }

    public function removeProduitTroc(ProduitTroc $produitTroc): static
    {
        if ($this->produitTrocs->removeElement($produitTroc)) {
            // set the owning side to null (unless already changed)
            if ($produitTroc->getIdUser() === $this) {
                $produitTroc->setIdUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Commandes>
     */
    public function getCommandes(): Collection
    {
        return $this->commandes;
    }

    public function addCommande(Commandes $commande): static
    {
        if (!$this->commandes->contains($commande)) {
            $this->commandes->add($commande);
            $commande->setIdUser($this);
        }

        return $this;
    }

    public function removeCommande(Commandes $commande): static
    {
        if ($this->commandes->removeElement($commande)) {
            // set the owning side to null (unless already changed)
            if ($commande->getIdUser() === $this) {
                $commande->setIdUser(null);
            }
        }

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
            $donBienMateriel->setUserId($this);
        }

        return $this;
    }

    public function removeDonBienMateriel(DonBienMateriel $donBienMateriel): static
    {
        if ($this->donBienMateriels->removeElement($donBienMateriel)) {
            // set the owning side to null (unless already changed)
            if ($donBienMateriel->getUserId() === $this) {
                $donBienMateriel->setUserId(null);
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
            $donArgent->setUserId($this);
        }

        return $this;
    }

    public function removeDonArgent(DonArgent $donArgent): static
    {
        if ($this->donArgents->removeElement($donArgent)) {
            // set the owning side to null (unless already changed)
            if ($donArgent->getUserId() === $this) {
                $donArgent->setUserId(null);
            }
        }

        return $this;
    }


}
