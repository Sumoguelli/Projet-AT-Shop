<?php
session_start();

require_once __DIR__ . '/../autoload.php';
require_once __DIR__ . '/../config/database.php';

use Repository\UserRepository;
use Controller\AuthController;

$repo = new UserRepository($pdo);
$auth = new AuthController($repo);

if ($_POST) {
    $auth->register($_POST['pseudo'], $_POST['email'], $_POST['password']);
    header('Location: login.php');
    exit;
}
?>

<form method="post">
    <input type="text" name="pseudo" placeholder="Pseudo" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Mot de passe" required>
    <button type="submit">Inscription</button>
</form>
