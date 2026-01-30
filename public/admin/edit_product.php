<?php
session_start();

require_once __DIR__ . '/../../autoload.php';
require_once __DIR__ . '/../../config/database.php';

use Security\Auth;
use Repository\ProductRepository;
use Entity\Product;

Auth::requireAdmin();

$repo = new ProductRepository($pdo);
$product = $repo->find((int) $_GET['id']);

if (!$product) die('Produit introuvable');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $updated = new Product(
            $product->getId(),
            $_POST['name'],
            $_POST['description'],
            (float) $_POST['price'],
            (int) $_POST['category_id'],
            (int) $_POST['stock']
    );

    $repo->update($updated);
    header('Location: dashboard.php');
    exit;
}
?>
