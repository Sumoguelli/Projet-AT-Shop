<?php
session_start();

require_once __DIR__ . '/../autoload.php';
require_once __DIR__ . '/../config/database.php';

use Repository\UserRepository;
use Security\Auth;

$error = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $repo = new UserRepository($pdo);
    $user = $repo->findByEmail($_POST['email']);

    if ($user && password_verify($_POST['password'], $user->getPassword())) {
        Auth::login($user);
        header('Location: index.php');
        exit;
    }

    $error = "Identifiants incorrects";
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="/Projet-AT-Shop/public/assets/css/style.css">
</head>
<body>

<header>
    <h1>Connexion</h1>
</header>

<div class="container">
    <?php if ($error): ?>
        <p><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <form method="post">
        Email
        <input type="email" name="email" required>

        Mot de passe
        <input type="password" name="password" required>

        <button>Se connecter</button>
    </form>
</div>

</body>
</html>
