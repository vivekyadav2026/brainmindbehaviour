<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: index.php");
    exit;
}
require_once '../includes/db.php';

// Handle status updates
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && isset($_POST['appointment_id'])) {
    $appointment_id = (int)$_POST['appointment_id'];
    $action = $_POST['action'];
    
    if ($action === 'confirm') {
        $stmt = $pdo->prepare("UPDATE appointments SET status = 'confirmed' WHERE id = ?");
        $stmt->execute([$appointment_id]);
    } elseif ($action === 'cancel') {
        $stmt = $pdo->prepare("UPDATE appointments SET status = 'cancelled' WHERE id = ?");
        $stmt->execute([$appointment_id]);
    }
    // Refresh to avoid form resubmission
    header("Location: appointments.php");
    exit;
}

$stmt = $pdo->query("SELECT * FROM appointments ORDER BY appointment_date DESC, appointment_time DESC");
$appointments = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Appointments - Brain Mind Behaviour</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .sidebar { min-height: 100vh; background-color: #2E5C9A; }
        .sidebar a { color: #fff; text-decoration: none; padding: 15px; display: block; border-bottom: 1px solid rgba(255,255,255,0.1); }
        .sidebar a:hover, .sidebar a.active { background-color: #1a3c6b; }
        .content { padding: 30px; }
    </style>
</head>
<body>
    <div class="d-flex">
        <div class="sidebar text-white" style="width: 250px;">
            <div class="p-3 text-center">
                <h5>Clinic Admin</h5>
            </div>
            <a href="dashboard.php">Dashboard</a>
            <a href="appointments.php" class="active">Appointments</a>
            <a href="logout.php">Logout</a>
        </div>
        <div class="content flex-grow-1 bg-light">
            <h2 class="mb-4">Appointments</h2>
            
            <div class="bg-white p-4 rounded shadow-sm">
                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Patient</th>
                            <th>Contact</th>
                            <th>Type</th>
                            <th>Date & Time</th>
                            <th>Status</th>
                            <th>Payment</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($appointments as $app): ?>
                        <tr>
                            <td><?php echo $app['id']; ?></td>
                            <td><?php echo htmlspecialchars($app['patient_name']); ?></td>
                            <td><?php echo htmlspecialchars($app['patient_phone']); ?><br><small><?php echo htmlspecialchars($app['patient_email']); ?></small></td>
                            <td><span class="badge bg-info text-dark"><?php echo ucfirst($app['appointment_type']); ?></span></td>
                            <td><?php echo $app['appointment_date']; ?> at <?php echo $app['appointment_time']; ?></td>
                            <td>
                                <?php if($app['status'] == 'confirmed'): ?>
                                    <span class="badge bg-success">Confirmed</span>
                                <?php elseif($app['status'] == 'cancelled'): ?>
                                    <span class="badge bg-danger">Cancelled</span>
                                <?php else: ?>
                                    <span class="badge bg-warning text-dark">Pending</span>
                                <?php endif; ?>
                            </td>
                            <td><?php echo ucfirst($app['payment_status']); ?></td>
                            <td>
                                <?php if($app['status'] == 'pending'): ?>
                                <form method="post" style="display:inline;">
                                    <input type="hidden" name="appointment_id" value="<?php echo $app['id']; ?>">
                                    <input type="hidden" name="action" value="confirm">
                                    <button type="submit" class="btn btn-sm btn-success">Confirm</button>
                                </form>
                                <form method="post" style="display:inline;">
                                    <input type="hidden" name="appointment_id" value="<?php echo $app['id']; ?>">
                                    <input type="hidden" name="action" value="cancel">
                                    <button type="submit" class="btn btn-sm btn-danger">Cancel</button>
                                </form>
                                <?php else: ?>
                                    -
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
