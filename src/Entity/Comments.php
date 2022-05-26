<?php

namespace App\Entity;

use App\Repository\CommentsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommentsRepository::class)]
class Comments
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: Restaurant::class, inversedBy: 'Comments')]
    #[ORM\JoinColumn(nullable: false)]
    private $Restaurant;

    #[ORM\Column(type: 'string', length: 255)]
    private $Text;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'UserId')]
    #[ORM\JoinColumn(nullable: false)]
    private $User;

    #[ORM\Column(type: 'datetime')]
    private $Date;

    #[ORM\Column(type: 'integer')]
    private $Stars;

    #[ORM\Column(type: 'string', length: 20)]
    private $UserLogin;
    
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Get restaurant
     *
     * @return string
     */
    public function getRestaurant(): ?Restaurant
    {
        return $this->Restaurant;
    }

    public function setRestaurant(?Restaurant $Restaurant): self
    {
        $this->Restaurant = $Restaurant;

        return $this;
    }

    public function getText(): ?string
    {
        return $this->Text;
    }

    public function setText(string $Text): self
    {
        $this->Text = $Text;

        return $this;
    }

    public function __toString()
    {
        return $this->getRestaurant();
    }

    public function getUser(): ?User
    {
        return $this->User;
    }

    public function setUser(?User $User): self
    {
        $this->User = $User;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->Date;
    }

    public function setDate(\DateTimeInterface $Date): self
    {
        $this->Date = $Date;

        return $this;
    }

    public function getStars(): ?int
    {
        return $this->Stars;
    }

    public function setStars(int $Stars): self
    {
        $this->Stars = $Stars;

        return $this;
    }

    public function getUserLogin(): ?string
    {
        return $this->UserLogin;
    }

    public function setUserLogin(string $UserLogin): self
    {
        $this->UserLogin = $UserLogin;

        return $this;
    }


}
