<?php

namespace Security;

class Auth
{
    public static function isLogged(): bool
    {
        return isset($_SESSION['user']);
    }

    public static function isAdmin(): bool
    {
        return self::isLogged() && $_SESSION['user']['role'] === 'ROLE_ADMIN';
    }

    public static function requireLogin(): void
    {
        if (!self::isLogged()) {
            header('Location: login.php');
            exit;
        }
    }

    public static function requireAdmin(): void
    {
        if (!self::isAdmin()) {
            header('Location: ../index.php');
            exit;
        }
    }
}
