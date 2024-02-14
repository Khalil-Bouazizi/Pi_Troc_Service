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

    public function __construct()
    {
        $this->products = new ArrayCollection();
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


}
