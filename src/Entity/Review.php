<?php

namespace App\Entity;

use App\Repository\ReviewRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReviewRepository::class)]
#[ORM\Table(name: 'comments')]
#[ORM\Index(columns: ['destination_id'])]
class Review
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

   #[ORM\Column(name: 'destination_id', type: 'integer', length: 100)]
    private ?int $destinationId = null;

    #[ORM\Column(name: 'username', length: 50)]
    private ?string $username = null;

    #[ORM\Column(name: 'content', type: 'text')]
    private ?string $comment = null;

    #[ORM\Column(name: 'rating', type: 'integer')]
    private ?int $rating = null;

    #[ORM\Column(name: 'created_at', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $createdAt = null;

    public function __construct()
    {
        $this->createdAt = new \DateTime();
    }

    // ── Getters & Setters ──────────────────────────────────────

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDestinationId(): ?int
    {
        return $this->destinationId;
    }

    public function setDestinationId(int $destinationId): static
    {
        $this->destinationId = $destinationId;
        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): static
    {
        $this->username = $username;
        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(string $comment): static
    {
        $this->comment = $comment;
        return $this;
    }

    public function getRating(): ?int
    {
        return $this->rating;
    }

    public function setRating(int $rating): static
    {
        $this->rating = $rating;
        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): static
    {
        $this->createdAt = $createdAt;
        return $this;
    }
}