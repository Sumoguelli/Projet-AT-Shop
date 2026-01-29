<?php
session_start();

require_once __DIR__ . '/../../autoload.php';
require_once __DIR__ . '/../../config/database.php';

use Security\Auth;
use Controller\AdminController;
use Repository\ProductRepository;

Auth::requireAdmin();

if (isset($_GET['id'])) {
    $controller = new AdminController($pdo, new ProductRepository($pdo));
    $controller->delete((int)$_GET['id']);
}

header('Location: products.php');
exit;
