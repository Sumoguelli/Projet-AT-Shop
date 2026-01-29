<?php
session_start();

require_once __DIR__ . '/../autoload.php';
require_once __DIR__ . '/../config/database.php';

use Repository\ProductRepository;
use Controller\ShopController;

$repo = new ProductRepository($pdo);
$controller = new ShopController($repo);

if (!isset($_GET['id'])) {
    header('Location: shop.php');
    exit;
}

$product = $controller->showProduct((int)$_GET['id']);

if (!$product) {
    echo "Produit introuvable";
    exit;
}
?>

<h1><?= htmlspecialchars($product->getName()) ?></h1>
<p><?= htmlspecialchars($product->getDescription()) ?></p>
<p>Prix : <?= $product->getPrice() ?> €</p>
<p>Stock : <?= $product->getStock() ?></p>

<a href="shop.php">Retour boutique</a>
