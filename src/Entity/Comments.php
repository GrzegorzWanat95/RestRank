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
}
