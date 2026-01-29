<?php

namespace Controller;

use Repository\UserRepository;

class AuthController
{
    private UserRepository $repo;

    public function __construct(UserRepository $repo)
    {
        $this->repo = $repo;
    }

    public function login(string $email, string $password): bool
    {
        $user = $this->repo->findByEmail($email);

        if ($user && password_verify($password, $user->getPassword())) {
            $_SESSION['user'] = [
                'id' => $user->getId(),
                'pseudo' => $user->getPseudo(),
                'email' => $user->getEmail(),
                'role' => $user->getRole()
            ];
            return true;
        }
        return false;
    }

    public function register(string $pseudo, string $email, string $password): void
    {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $this->repo->create($pseudo, $email, $hash);
    }
}
