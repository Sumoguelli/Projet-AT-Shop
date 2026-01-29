<?php

$host = 'localhost';
$dbname = 'projet_at_shop';
$user = 'root';        // à adapter si besoin
$pass = '';            // à adapter si besoin

try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
        $user,
        $pass,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
    );
} catch (PDOException $e) {
    die('Erreur de connexion à la base de données');
}
