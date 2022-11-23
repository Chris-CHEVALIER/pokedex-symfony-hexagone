<?php

namespace App\Entity;

use App\Entity\Pokemon;
use App\Repository\TypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TypeRepository::class)]
class Type
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 30)]
    private ?string $name = null;

    #[ORM\Column(length: 20)]
    private ?string $color = null;

    #[ORM\OneToMany(targetEntity: "App\Entity\Pokemon", mappedBy: "type")]
    private array $pokemons;

    public function __construct() {
        $this->pokemons = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(string $color): self
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get the value of pokemons
     */ 
    public function getPokemons()
    {
        return $this->pokemons;
    }

    /**
     * Set the value of pokemons
     *
     * @return  self
     */ 
    public function setPokemons($pokemons)
    {
        $this->pokemons = $pokemons;

        return $this;
    }
}
