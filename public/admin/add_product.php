<?php
session_start();

require_once __DIR__ . '/../../autoload.php';
require_once __DIR__ . '/../../config/database.php';

use Security\Auth;
use Entity\Product;
use Repository\ProductRepository;

Auth::requireAdmin();

$repo = new ProductRepository($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product = new Product(
            null,
            $_POST['name'],
            $_POST['description'],
            (float) $_POST['price'],
            (int) $_POST['category_id'],
            (int) $_POST['stock']
    );

    $repo->create($product);
    header('Location: dashboard.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Admin - Ajouter produit</title>
    <link rel="stylesheet" href="/Projet-AT-Shop/public/assets/css/style.css">
</head>
<body>

<header>
    <h1>Ajouter un produit</h1>
</header>

<div class="container">

    <a href="dashboard.php">⬅ Retour dashboard</a>

    <br><br>

    <form method="post">
        Nom
        <input name="name" required>

        Description
        <textarea name="description"></textarea>

        Prix
        <input type="number" step="0.01" name="price" required>

        Catégorie ID
        <input type="number" name="category_id" required>

        Stock
        <input type="number" name="stock" min="0" required>

        <button>Ajouter</button>
    </form>

</div>

</body>
</html>
