<?php
session_start();

require_once __DIR__ . '/../autoload.php';
require_once __DIR__ . '/../config/database.php';

use Repository\UserRepository;
use Controller\AuthController;

$repo = new UserRepository($pdo);
$auth = new AuthController($repo);

$error = false;

if ($_POST) {
    if ($auth->login($_POST['email'], $_POST['password'])) {
        header('Location: index.php');
        exit;
    } else {
        $error = true;
    }
}
?>

<?php if ($error): ?>
    <p style="color:red;">Email ou mot de passe incorrect</p>
<?php endif; ?>

<form method="post">
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Mot de passe" required>
    <button type="submit">Connexion</button>
</form>
