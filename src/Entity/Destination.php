<?php

namespace App\Entity;

use App\Repository\DestinationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DestinationRepository::class)]
#[ORM\Table(name: 'destinations')]
class Destination
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50, unique: true)]
    private ?string $slug = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $title = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $heroImage = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $heroTagline = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $quoteTagline = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $quoteText = null;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $description = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $bestTime = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $category = null;

    #[ORM\Column(type: 'json', nullable: true)]
    private ?array $highlights = [];


    public function getId(): ?int { return $this->id; }

    public function getSlug(): ?string { return $this->slug; }
    public function setSlug(string $slug): static { $this->slug = $slug; return $this; }

    public function getTitle(): ?string { return $this->title; }
    public function setTitle(?string $title): static { $this->title = $title; return $this; }

    public function getHeroImage(): ?string { return $this->heroImage; }
    public function setHeroImage(?string $heroImage): static { $this->heroImage = $heroImage; return $this; }

    public function getHeroTagline(): ?string { return $this->heroTagline; }
    public function setHeroTagline(?string $heroTagline): static { $this->heroTagline = $heroTagline; return $this; }

    public function getQuoteTagline(): ?string { return $this->quoteTagline; }
    public function setQuoteTagline(?string $quoteTagline): static { $this->quoteTagline = $quoteTagline; return $this; }

    public function getQuoteText(): ?string { return $this->quoteText; }
    public function setQuoteText(?string $quoteText): static { $this->quoteText = $quoteText; return $this; }

    public function getDescription(): ?string { return $this->description; }
    public function setDescription(?string $description): static { $this->description = $description; return $this; }

    public function getBestTime(): ?string { return $this->bestTime; }
    public function setBestTime(?string $bestTime): static { $this->bestTime = $bestTime; return $this; }

    public function getCategory(): ?string { return $this->category; }
    public function setCategory(?string $category): static { $this->category = $category; return $this; }

    public function getHighlights(): array
    {
        return $this->highlights ?? [];
    }

    public function setHighlights(array $highlights): static
    {
        $this->highlights = $highlights;
        return $this;
    }
}