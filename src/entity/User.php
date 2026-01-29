<?php

namespace Entity;

class User
{
    protected int $id;
    protected string $pseudo;
    protected string $email;
    protected string $password;
    protected string $role;

    public function __construct(array $data)
    {
        $this->id = $data['id'] ?? 0;
        $this->pseudo = $data['pseudo'];
        $this->email = $data['email'];
        $this->password = $data['password'];
        $this->role = $data['role'];
    }

    public function getId(): int { return $this->id; }
    public function getPseudo(): string { return $this->pseudo; }
    public function getEmail(): string { return $this->email; }
    public function getPassword(): string { return $this->password; }
    public function getRole(): string { return $this->role; }

    public function isAdmin(): bool
    {
        return $this->role === 'ROLE_ADMIN';
    }
}
