<?php

session_start();

require_once __DIR__ . '/../../autoload.php';
require_once __DIR__ . '/../../config/database.php';

use Security\Auth;
use Repository\ProductRepository;

Auth::requireAdmin();

$repo = new ProductRepository($pdo);
$repo->delete((int) $_GET['id']);

header('Location: dashboard.php');
exit;
