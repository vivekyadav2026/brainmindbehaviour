<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: index.php");
    exit;
}
require_once '../includes/db.php';

// Get counts
$pending_stmt = $pdo->query("SELECT COUNT(*) FROM appointments WHERE status = 'pending'");
$pending_count = $pending_stmt->fetchColumn();

$confirmed_stmt = $pdo->query("SELECT COUNT(*) FROM appointments WHERE status = 'confirmed'");
$confirmed_count = $confirmed_stmt->fetchColumn();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard - Brain Mind Behaviour</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .sidebar { min-height: 100vh; background-color: #2E5C9A; }
        .sidebar a { color: #fff; text-decoration: none; padding: 15px; display: block; border-bottom: 1px solid rgba(255,255,255,0.1); }
        .sidebar a:hover, .sidebar a.active { background-color: #1a3c6b; }
        .content { padding: 30px; }
        .card-stat { background-color: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.05); border-left: 5px solid #2E5C9A; }
    </style>
</head>
<body>
    <div class="d-flex">
        <div class="sidebar text-white" style="width: 250px;">
            <div class="p-3 text-center">
                <h5>Clinic Admin</h5>
            </div>
            <a href="dashboard.php" class="active">Dashboard</a>
            <a href="appointments.php">Appointments</a>
            <a href="logout.php">Logout</a>
        </div>
        <div class="content flex-grow-1 bg-light">
            <h2 class="mb-4">Dashboard</h2>
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="card-stat">
                        <h5 class="text-muted">Pending Appointments</h5>
                        <h3><?php echo $pending_count; ?></h3>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card-stat">
                        <h5 class="text-muted">Confirmed Appointments</h5>
                        <h3><?php echo $confirmed_count; ?></h3>
                    </div>
                </div>
            </div>
            <p>Welcome to the admin panel. Use the sidebar to navigate to manage appointments.</p>
        </div>
    </div>
</body>
</html>
