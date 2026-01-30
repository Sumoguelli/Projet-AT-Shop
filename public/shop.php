<?php
session_start();

require_once __DIR__ . '/../autoload.php';
require_once __DIR__ . '/../config/database.php';

use Security\Auth;
use Repository\ProductRepository;

Auth::requireLogin();

$repo = new ProductRepository($pdo);
$products = $repo->findAll();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Boutique</title>
    <link rel="stylesheet" href="/Projet-AT-Shop/public/assets/css/style.css">
</head>
<body>

<header>
    <h1>Boutique</h1>
</header>

<div class="container">
    <a href="index.php">🏠 Accueil</a> |
    <a href="logout.php">🚪 Déconnexion</a>

    <br><br>

    <?php foreach ($products as $product): ?>
        <div class="product-card">
            <strong><?= htmlspecialchars($product->getName()) ?></strong><br>
            <?= htmlspecialchars($product->getDescription()) ?><br>
            Prix : <?= $product->getPrice() ?> €<br>

            <?php if ($product->getStock() > 0): ?>
                Stock : <span class="stock-ok"><?= $product->getStock() ?></span>
            <?php else: ?>
                <span class="stock-zero">Rupture</span>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
</div>

</body>
</html>
