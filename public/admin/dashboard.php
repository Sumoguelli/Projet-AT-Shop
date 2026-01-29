<?php
session_start();

require_once __DIR__ . '/../../autoload.php';
require_once __DIR__ . '/../../config/database.php';

use Security\Auth;
Auth::requireAdmin();
?>

<h1>Dashboard Admin</h1>

<ul>
    <li><a href="products.php">Gérer les produits</a></li>
    <li><a href="../index.php">Retour au site</a></li>
</ul>
