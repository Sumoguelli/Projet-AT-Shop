<?php

namespace Repository;

use Entity\User;
use PDO;

class UserRepository
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function findByEmail(string $email): ?User
    {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $data = $stmt->fetch();

        return $data ? new User($data) : null;
    }

    public function create(string $pseudo, string $email, string $password): void
    {
        $stmt = $this->pdo->prepare(
            "INSERT INTO users (pseudo, email, password, role) VALUES (?, ?, ?, 'ROLE_USER')"
        );
        $stmt->execute([$pseudo, $email, $password]);
    }
}
