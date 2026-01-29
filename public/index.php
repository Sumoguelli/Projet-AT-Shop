<?php
session_start();

require_once __DIR__ . '/../autoload.php';
require_once __DIR__ . '/../config/database.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>AT Shop</title>
</head>
<body>

<h1>Bienvenue sur AT Shop</h1>

<?php if (isset($_SESSION['user'])): ?>
    <p>Connecté en tant que <?= htmlspecialchars($_SESSION['user']['pseudo']) ?></p>
    <a href="logout.php">Déconnexion</a>
<?php else: ?>
    <a href="login.php">Connexion</a> |
    <a href="register.php">Inscription</a>
<?php endif; ?>

<br><br>
<a href="shop.php">Accéder à la boutique</a>

</body>
</html>
