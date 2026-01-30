<?php
session_start();

require_once __DIR__ . '/../autoload.php';
require_once __DIR__ . '/../config/database.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>AT Shop</title>
    <link rel="stylesheet" href="/Projet-AT-Shop/public/assets/css/style.css">
</head>
<body>

<header>
    <h1>AT Shop</h1>
</header>

<div class="container">
    <p>Bienvenue sur AT Shop</p>

    <?php if (!isset($_SESSION['user'])): ?>

        <a href="login.php">Se connecter</a> |
        <a href="register.php">S’inscrire</a>

    <?php else: ?>

        <a href="shop.php">Accéder à la boutique</a>

        <?php if ($_SESSION['user']['role'] === 'ROLE_ADMIN'): ?>
            | <a href="admin/dashboard.php">Admin</a>
        <?php endif; ?>

        | <a href="logout.php">Déconnexion</a>

    <?php endif; ?>
</div>

</body>
</html>
