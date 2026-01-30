<?php
session_start();
require_once __DIR__ . '/../autoload.php';
require_once __DIR__ . '/../config/database.php';

use Entity\User;
use Repository\UserRepository;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $repo = new UserRepository($pdo);

    $user = new User(
            null,
            $_POST['pseudo'],
            $_POST['email'],
            password_hash($_POST['password'], PASSWORD_DEFAULT),
            'user'
    );

    $repo->create($user);
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    <link rel="stylesheet" href="/Projet-AT-Shop/public/assets/css/style.css">
</head>
<body>

<header>
    <h1>Inscription</h1>
</header>

<div class="container">
    <form method="post">
        Pseudo
        <input name="pseudo" required>

        Email
        <input type="email" name="email" required>

        Mot de passe
        <input type="password" name="password" required>

        <button>S’inscrire</button>
    </form>
</div>

</body>
</html>
