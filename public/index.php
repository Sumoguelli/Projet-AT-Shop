<?php
session_start();
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
    <h1>🧱 AT Shop</h1>
    <nav>
        <a href="/Projet-AT-Shop/public/index.php">Accueil</a>
        <a href="/Projet-AT-Shop/public/shop.php">Boutique</a>

        <?php if (isset($_SESSION['user']) && $_SESSION['user']['role'] === 'ROLE_ADMIN'): ?>
            <a href="/Projet-AT-Shop/public/admin/dashboard.php">Admin</a>
        <?php endif; ?>

        <?php if (isset($_SESSION['user'])): ?>
            <a href="/Projet-AT-Shop/public/logout.php">Déconnexion</a>
        <?php else: ?>
            <a href="/Projet-AT-Shop/public/login.php">Connexion</a>
        <?php endif; ?>
    </nav>

</header>

<section class="hero">
    <h2>Bienvenue sur AT Shop</h2>
    <p>Boutique Minecraft – armes, armures et grades premium</p>

    <a href="/Projet-AT-Shop/public/shop.php">Accéder à la boutique</a>
    <?php if (!isset($_SESSION['user'])): ?>
        <a href="/Projet-AT-Shop/public/login.php" class="secondary">Se connecter</a>
    <?php endif; ?>
</section>

<footer>
    © <?= date('Y') ?> AT Shop – Projet Systèmes & Réseaux
</footer>

</b
