<?php
session_start();

require_once __DIR__ . '/../../autoload.php';
require_once __DIR__ . '/../../config/database.php';

use Security\Auth;
use Repository\ProductRepository;

Auth::requireAdmin();

$repo = new ProductRepository($pdo);
$products = $repo->findAll();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Admin - Dashboard</title>
    <link rel="stylesheet" href="/Projet-AT-Shop/public/assets/css/style.css">
</head>
<body>

<header>
    <h1>Admin - AT Shop</h1>
</header>

<div class="container">

    <a href="/Projet-AT-Shop/public/index.php">Accueil</a> |
    <a href="/Projet-AT-Shop/public/logout.php">Déconnexion</a>

    <br><br>

    <a href="add_product.php">Ajouter un produit</a>

    <br><br>

    <?php foreach ($products as $product): ?>
        <div class="product-card">
            <strong><?= htmlspecialchars($product->getName()) ?></strong><br>
            Prix : <?= $product->getPrice() ?> €<br>
            Stock : <?= $product->getStock() ?><br><br>

            <a href="edit_product.php?id=<?= $product->getId() ?>">Modifier</a> |
            <a href="delete_product.php?id=<?= $product->getId() ?>"
               onclick="return confirm('Supprimer ?')">Supprimer</a>
        </div>
    <?php endforeach; ?>

</div>

</body>
</html>
