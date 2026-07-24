<?php
require_once '../db_connection.php';

if (isset($_SESSION['admin_logged_in'])) {
    header('Location: index.php');
    exit;
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    
    // Simple check without password hashing
    if ($username == 'admin' && $password == 'admin123') {
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_username'] = 'admin';
        header('Location: index.php');
        exit;
    } else {
        $error = 'Invalid username or password!';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <style>
        body { background: #0a0a0a; display: flex; justify-content: center; align-items: center; height: 100vh; font-family: Arial; margin: 0; }
        .login-box { background: #141414; padding: 40px; border-radius: 10px; border: 1px solid #333; width: 320px; }
        .login-box h2 { color: #fff; text-align: center; margin-bottom: 30px; }
        .login-box input { width: 100%; padding: 12px; margin: 10px 0; background: #1a1a1a; border: 1px solid #333; color: #fff; border-radius: 5px; box-sizing: border-box; }
        .login-box input:focus { outline: none; border-color: #ff6b35; }
        .login-box button { width: 100%; padding: 12px; background: #ff6b35; color: #fff; border: none; border-radius: 5px; cursor: pointer; font-size: 16px; }
        .login-box button:hover { background: #ff8555; }
        .error { color: #ff4444; text-align: center; background: rgba(255,0,0,0.1); padding: 10px; border-radius: 5px; margin-bottom: 15px; border: 1px solid #ff4444; }
        .back-link { text-align: center; margin-top: 15px; }
        .back-link a { color: #888; text-decoration: none; font-size: 14px; }
        .back-link a:hover { color: #ff6b35; }
    </style>
</head>
<body>
    <div class="login-box">
        <h2>🔐 Admin Login</h2>
        
        <?php if ($error): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>
        
        <form method="POST">
            <input type="text" name="username" placeholder="Username" value="admin" required>
            <input type="password" name="password" placeholder="Password" value="admin123" required>
            <button type="submit">Login</button>
        </form>
        
        <div class="back-link">
            <a href="../index.php">← Back to Website</a>
        </div>
    </div>
</body>
</html>