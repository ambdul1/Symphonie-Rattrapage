<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\TacheRepository;

#[ORM\Entity(repositoryClass: TacheRepository::class)]
#[ORM\Table(name: "tache")]
class Tache
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private ?int $id = null;

    #[ORM\Column(type: "string", length: 255)]
    private ?string $titre = null;

    #[ORM\Column(type: "text")]
    private ?string $description = null;

    #[ORM\Column(type: "datetime")]
    private ?\DateTimeInterface $dateLimite = null;

    #[ORM\Column(type: "boolean")]
    private bool $terminee = false;

    #[ORM\Column(type: "integer")]
    private int $priorite = 0;

    // Voici la relation modifiée pour accepter la nullité
    #[ORM\ManyToOne(targetEntity: Categorie::class)]
    #[ORM\JoinColumn(nullable: true)]  // <--- nullable true ici, changement clé
    private ?Categorie $categorie = null;

    // GETTERS & SETTERS...

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }

    public function getDateLimite(): ?\DateTimeInterface
    {
        return $this->dateLimite;
    }

    public function setDateLimite(\DateTimeInterface $dateLimite): self
    {
        $this->dateLimite = $dateLimite;
        return $this;
    }

    public function isTerminee(): bool
    {
        return $this->terminee;
    }

    public function setTerminee(bool $terminee): self
    {
        $this->terminee = $terminee;
        return $this;
    }

    public function getPriorite(): int
    {
        return $this->priorite;
    }

    public function setPriorite(int $priorite): self
    {
        $this->priorite = $priorite;
        return $this;
    }

    public function getCategorie(): ?Categorie
    {
        return $this->categorie;
    }

    public function setCategorie(?Categorie $categorie): self
    {
        $this->categorie = $categorie;
        return $this;
    }
}
