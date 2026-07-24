<?php
require_once '../db_connection.php';

if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: login.php');
    exit;
}

$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['image'])) {
    if ($_FILES['image']['error'] == 0) {
        $allowed = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
        $ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
        
        if (in_array($ext, $allowed)) {
            $filename = time() . '.' . $ext;
            $target = '../uploads/' . $filename;
            
            if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                $stmt = $pdo->prepare("INSERT INTO uploaded_images (image_name, image_path) VALUES (?, ?)");
                $stmt->execute([$filename, 'uploads/' . $filename]);
                $message = '✅ Image uploaded!';
            }
        } else {
            $message = '❌ Invalid file type!';
        }
    }
}

$images = $pdo->query("SELECT * FROM uploaded_images ORDER BY uploaded_at DESC")->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Upload Images</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { background: #0a0a0a; color: #fff; font-family: Arial; }
        .container { max-width: 1200px; margin: 0 auto; padding: 20px; }
        .nav { background: #141414; padding: 15px 0; border-bottom: 1px solid #333; display: flex; justify-content: space-between; align-items: center; }
        .nav a { color: #ff6b35; text-decoration: none; }
        .upload-box { background: #141414; padding: 30px; border-radius: 10px; margin: 20px 0; border: 1px solid #333; }
        input[type="file"] { padding: 10px; background: #1a1a1a; border: 1px solid #333; color: #fff; }
        button { background: #ff6b35; color: #fff; padding: 10px 30px; border: none; border-radius: 5px; cursor: pointer; }
        .message { padding: 10px; margin: 10px 0; border-radius: 5px; }
        .success { background: rgba(0,255,0,0.1); color: #00ff00; border: 1px solid #00ff00; }
        .error { background: rgba(255,0,0,0.1); color: #ff4444; border: 1px solid #ff4444; }
        .grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 20px; margin-top: 20px; }
        .card { background: #141414; border: 1px solid #333; border-radius: 10px; overflow: hidden; }
        .card img { width: 100%; height: 200px; object-fit: cover; }
        .card .info { padding: 10px; }
        .card .info small { color: #666; }
        .delete { background: #ff4444; color: #fff; padding: 5px 15px; border: none; border-radius: 5px; cursor: pointer; margin-top: 10px; }
        .logout { color: #ff4444; text-decoration: none; }
    </style>
</head>
<body>
    <div class="nav">
        <div class="container" style="display:flex;justify-content:space-between;width:100%;">
            <h2>🖼️ Upload Images</h2>
            <div>
                <a href="../index.php" target="_blank" style="margin-right:20px;">View Site</a>
                <a href="logout.php" class="logout">Logout</a>
            </div>
        </div>
    </div>
    
    <div class="container">
        <div class="upload-box">
            <h3>Upload New Image</h3>
            <?php if ($message): ?>
                <div class="message <?php echo strpos($message, '✅') !== false ? 'success' : 'error'; ?>">
                    <?php echo $message; ?>
                </div>
            <?php endif; ?>
            <form method="POST" enctype="multipart/form-data">
                <input type="file" name="image" accept="image/*" required>
                <button type="submit">Upload</button>
            </form>
        </div>
        
        <h3>All Images (<?php echo count($images); ?>)</h3>
        
        <div class="grid">
            <?php if (empty($images)): ?>
                <p style="color:#666;">No images uploaded yet.</p>
            <?php else: ?>
                <?php foreach ($images as $img): ?>
                <div class="card">
                    <img src="../<?php echo $img['image_path']; ?>" alt="Image">
                    <div class="info">
                        <small><?php echo date('Y-m-d', strtotime($img['uploaded_at'])); ?></small>
                        <br>
                        <a href="delete.php?id=<?php echo $img['id']; ?>" onclick="return confirm('Delete?')">
                            <button class="delete">Delete</button>
                        </a>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>