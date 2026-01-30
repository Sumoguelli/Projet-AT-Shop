<?php
session_start();

require_once __DIR__ . '/../autoload.php';
require_once __DIR__ . '/../config/database.php';

use Repository\ProductRepository;

$repo = new ProductRepository($pdo);
$products = $repo->findAll();
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Boutique – AT Shop</title>
    <link rel="stylesheet" href="/Projet-AT-Shop/public/assets/css/style.css">
</head>
<body>

<header>
    <h1>AT Shop</h1>
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

<div class="container">
    <div class="products">
        <?php foreach ($products as $product): ?>
            <div class="product">
                <h3><?= htmlspecialchars($product->getName()) ?></h3>
                <p><?= htmlspecialchars($product->getDescription()) ?></p>
                <p class="price"><?= $product->getPrice() ?> €</p>
                <p class="stock">Stock : <?= $product->getStock() ?></p>

                <?php if (isset($_SESSION['user'])): ?>
                    <a class="buy-btn" href="#">Acheter</a>
                <?php else: ?>
                    <a class="buy-btn disabled" href="/Projet-AT-Shop/public/login.php">
                        Connexion requise
                    </a>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<footer>
    © <?= date('Y') ?> Alexis et Tetsuô Shop
</footer>

</body>
</html>
