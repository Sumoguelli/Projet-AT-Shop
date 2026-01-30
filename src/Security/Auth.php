<?php

namespace Security;

use Entity\User;

class Auth
{
    public static function login(User $user): void
    {
        $_SESSION['user'] = [
            'id' => $user->getId(),
            'pseudo' => $user->getPseudo(),
            'email' => $user->getEmail(),
            'role' => $user->getRole()
        ];
    }

    public static function isLogged(): bool
    {
        return isset($_SESSION['user']);
    }

    public static function requireLogin(): void
    {
        if (!self::isLogged()) {
            header('Location: /Projet-AT-Shop/public/login.php');
            exit;
        }
    }

    public static function requireAdmin(): void
    {
        self::requireLogin();

        if ($_SESSION['user']['role'] !== 'ROLE_ADMIN') {
            header('Location: /Projet-AT-Shop/public/index.php');
            exit;
        }
    }
}
