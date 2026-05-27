<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: 'users')]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\Column(name: 'fullname', type: 'string', length: 50, unique: true)]
    private string $fullname;

    #[ORM\Column(name: 'email', type: 'string', length: 100, unique: true)]
    private string $email;

    #[ORM\Column(name: 'password', type: 'string', length: 255)]
    private string $password;

    // ── Required by UserInterface ──────────────────────────────

    public function getUserIdentifier(): string
    {
        return $this->email; // what Symfony uses to identify the user
    }

    public function getRoles(): array
    {
        return ['ROLE_USER'];
    }

    public function eraseCredentials(): void
    {
        // clear any temporary sensitive data here if needed
    }

    // ── Required by PasswordAuthenticatedUserInterface ─────────

    public function getPassword(): string
    {
        return $this->password;
    }

    // ── Getters & Setters ──────────────────────────────────────

    public function getFullname(): string
    {
        return $this->fullname;
    }

    public function setFullname(string $fullname): self
    {
        $this->fullname = $fullname;
        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;
        return $this;
    }

    public function getUsername(): string
    {
        return $this->fullname;
    }

    public function setUsername(string $username): self
    {
        $this->fullname = $username;
        return $this;
    }
}