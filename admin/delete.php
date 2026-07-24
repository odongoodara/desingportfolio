<?php
require_once '../db_connection.php';

if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: login.php');
    exit;
}

$id = $_GET['id'] ?? 0;

$stmt = $pdo->prepare("SELECT * FROM uploaded_images WHERE id = ?");
$stmt->execute([$id]);
$img = $stmt->fetch();

if ($img) {
    $file = '../' . $img['image_path'];
    if (file_exists($file)) unlink($file);
    
    $stmt = $pdo->prepare("DELETE FROM uploaded_images WHERE id = ?");
    $stmt->execute([$id]);
}

header('Location: index.php');
exit;
?>