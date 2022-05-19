<?php

namespace App\Entity;

use App\Repository\OpinionsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OpinionsRepository::class)]
class Opinions
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 50)]
    private $UserLogin;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $Text;

    #[ORM\Column(type: 'integer')]
    private $RestaurantId;

    #[ORM\Column(type: 'integer')]
    private $Stars;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getText(): ?string
    {
        return $this->Text;
    }

    public function setText(?string $Text): self
    {
        $this->Text = $Text;

        return $this;
    }

    public function getRestaurantId(): ?int
    {
        return $this->RestaurantId;
    }

    public function setRestaurantId(int $RestaurantId): self
    {
        $this->RestaurantId = $RestaurantId;

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
}
