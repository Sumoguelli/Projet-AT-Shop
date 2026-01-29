<?php
session_start();

require_once __DIR__ . '/../../autoload.php';
require_once __DIR__ . '/../../config/database.php';

use Security\Auth;
use Controller\AdminController;
use Repository\ProductRepository;

Auth::requireAdmin();

$controller = new AdminController($pdo, new ProductRepository($pdo));

if ($_POST) {
    $controller->add($_POST);
    header('Location: products.php');
    exit;
}
?>

<h1>Ajouter un produit</h1>

<form method="post">
    <input name="name" placeholder="Nom" required><br>
    <textarea name="description" placeholder="Description"></textarea><br>
    <input name="price" type="number" step="0.01" placeholder="Prix" required><br>
    <input name="stock" type="number" placeholder="Stock" required><br>
    <input name="type" placeholder="Type (Weapon / Grade)" required><br>
    <input name="category_id" type="number" placeholder="ID Catégorie" required><br>
    <button>Ajouter</button>
</form>
