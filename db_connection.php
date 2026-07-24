<?php
define('DB_HOST', 'sql202.infinityfree.com');
define('DB_USER', 'if0_42486678');
define('DB_PASS', 'IZ4zY6l9C1Mp9');
define('DB_NAME', 'if0_42486678_portfolio_db');

try {
    $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

session_start();
?>