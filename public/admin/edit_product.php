<?php
session_start();

require_once __DIR__ . '/../../autoload.php';
require_once __DIR__ . '/../../config/database.php';

use Security\Auth;
use Controller\AdminController;
use Repository\ProductRepository;

Auth::requireAdmin();

$repo = new ProductRepository($pdo);
$controller = new AdminController($pdo, $repo);

if (!isset($_GET['id'])) {
    header('Location: products.php');
    exit;
}

$product = $repo->find((int)$_GET['id']);

if ($_POST) {
    $controller->update($product->getId(), $_POST);
    header('Location: products.php');
    exit;
}
?>

<h1>Modifier produit</h1>

<form method="post">
    <input name="name" value="<?= htmlspecialchars($product->getName()) ?>"><br>
    <textarea name="description"><?= htmlspecialchars($product->getDescription()) ?></textarea><br>
    <input name="price" type="number" step="0.01" value="<?= $product->getPrice() ?>"><br>
    <input name="stock" type="number" value="<?= $product->getStock() ?>"><br>
    <input name="type" value="<?= $product->getType() ?>"><br>
    <input name="category_id" type="number" value="<?= $product->getCategoryId() ?>"><br>
    <button>Modifier</button>
</form>
