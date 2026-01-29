<?php
session_start();

require_once __DIR__ . '/../autoload.php';
require_once __DIR__ . '/../config/database.php';

use Repository\ProductRepository;
use Controller\ShopController;

$repo = new ProductRepository($pdo);
$controller = new ShopController($repo);

$products = $controller->listProducts();
?>

<h1>Boutique</h1>

<?php foreach ($products as $product): ?>
    <div style="border:1px solid #ccc; padding:10px; margin:10px;">
        <h3><?= htmlspecialchars($product->getName()) ?></h3>
        <p><?= htmlspecialchars($product->getDescription()) ?></p>
        <strong><?= $product->getPrice() ?> €</strong><br>
        <a href="product.php?id=<?= $product->getId() ?>">Voir</a>
    </div>
<?php endforeach; ?>
