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
    <title>Admin – AT Shop</title>
    <link rel="stylesheet" href="/Projet-AT-Shop/public/assets/css/style.css">
</head>
<body>

<header>
    <h1>🛠 Admin – AT Shop</h1>
    <nav>
        <a href="/Projet-AT-Shop/public/index.php">Accueil</a>
        <a href="/Projet-AT-Shop/public/shop.php">Boutique</a>
        <a href="/Projet-AT-Shop/public/logout.php">Déconnexion</a>
    </nav>
</header>

<div class="container">

    <h2>Gestion des produits</h2>

    <a class="btn" href="add_product.php">Ajouter un produit</a>

    <div class="products">
        <?php foreach ($products as $product): ?>
            <div class="product">
                <h3><?= htmlspecialchars($product->getName()) ?></h3>
                <p><?= htmlspecialchars($product->getDescription()) ?></p>
                <p><strong><?= $product->getPrice() ?> €</strong></p>
                <p>Stock : <?= $product->getStock() ?></p>

                <a class="btn-edit" href="edit_product.php?id=<?= $product->getId() ?>">Modifier</a>
                <a class="btn-delete"
                   href="delete_product.php?id=<?= $product->getId() ?>"
                   onclick="return confirm('Supprimer ce produit ?')">
                    Supprimer
                </a>
            </div>
        <?php endforeach; ?>
    </div>

</div>

<footer>
    © <?= date('Y') ?> AT Shop – Admin
</footer>

</body>
</html>
