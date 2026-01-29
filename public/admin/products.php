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

<h1>Produits (Admin)</h1>

<a href="add_product.php">➕ Ajouter un produit</a>
<br><br>

<table border="1" cellpadding="5">
    <tr>
        <th>Nom</th>
        <th>Prix</th>
        <th>Stock</th>
        <th>Actions</th>
    </tr>

    <?php foreach ($products as $product): ?>
        <tr>
            <td><?= htmlspecialchars($product->getName()) ?></td>
            <td><?= $product->getPrice() ?> €</td>
            <td><?= $product->getStock() ?></td>
            <td>
                <a href="edit_product.php?id=<?= $product->getId() ?>">✏️</a>
                <a href="delete_product.php?id=<?= $product->getId() ?>"
                   onclick="return confirm('Supprimer ?')">🗑️</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
