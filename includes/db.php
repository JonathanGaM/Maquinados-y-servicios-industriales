<?php

declare(strict_types=1);

/*
|--------------------------------------------------------------------------
| Conexión a Base de Datos MySQL (LOCAL)
|--------------------------------------------------------------------------
| Base de datos: bd_msi
| Uso recomendado: require_once __DIR__ . "/db.php";
*/

$DB_HOST = "localhost";
$DB_NAME = "bd_msi";
$DB_USER = "root";        // en XAMPP
$DB_PASS = "";            // en XAMPP normalmente vacío
$DB_CHARSET = "utf8mb4";

try {
    $pdo = new PDO(
        "mysql:host={$DB_HOST};dbname={$DB_NAME};charset={$DB_CHARSET}",
        $DB_USER,
        $DB_PASS,
        [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ]
    );
} catch (PDOException $e) {
    // ❗ No matar la app
    // Dejar $pdo como null para que db-safe use fallback
    $pdo = null;
}

