<?php
session_start();
if (isset($_SESSION['admin_logged_in'])) {
    header("Location: dashboard.php");
    exit;
}

require_once '../includes/db.php';

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    
    $stmt = $pdo->prepare("SELECT id, password_hash FROM admin_users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();
    
    if ($user && password_verify($password, $user['password_hash'])) {
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_id'] = $user['id'];
        header("Location: dashboard.php");
        exit;
    } else {
        $error = 'Invalid username or password.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Brain Mind Behaviour</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="admin.css" rel="stylesheet">
    <style>
        body {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
        }
        .login-card {
            width: 100%;
            max-width: 420px;
            border-radius: 20px !important;
            border: 1px solid rgba(0,0,0,0.05);
            background: #ffffff;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.05) !important;
        }
    </style>
</head>
<body>
    <div class="card login-card p-4 p-md-5">
        <div class="text-center mb-4">
            <h3 class="fw-extrabold text-dark mb-1">Brain Mind Behaviour</h3>
            <p class="text-muted small">Sign in to manage appointments & leads</p>
        </div>
        
        <?php if ($error): ?>
            <div class="alert alert-danger py-2 px-3 small border-0"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>
        
        <form method="post" action="">
            <div class="mb-3">
                <label class="form-label small fw-bold text-muted">Username</label>
                <input type="text" name="username" class="form-control" placeholder="Enter username" required autocomplete="username">
            </div>
            <div class="mb-4">
                <label class="form-label small fw-bold text-muted">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter password" required autocomplete="current-password">
            </div>
            <button type="submit" class="btn btn-primary w-100 py-2.5 rounded-pill fw-bold text-white">
                Sign In
            </button>
        </form>
    </div>
</body>
</html>
