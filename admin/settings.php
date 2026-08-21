<?php
// admin/settings.php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: index.php");
    exit;
}
require_once '../includes/db.php';

// Fetch current configurations from settings table
$stmt = $pdo->query("SELECT * FROM settings");
$config = [];
while ($row = $stmt->fetch()) {
    $config[$row['key']] = $row['value'];
}

$settingsSuccess = '';
$settingsError = '';
$passwordSuccess = '';
$passwordError = '';

// Handle Settings Update (POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $action = $_POST['action'];
    
    if ($action === 'update_settings') {
        $upi_id = htmlspecialchars(trim($_POST['upi_id'] ?? ''));
        $whatsapp_phone = htmlspecialchars(trim($_POST['whatsapp_phone'] ?? ''));
        $clinic_email = filter_var(trim($_POST['clinic_email'] ?? ''), FILTER_SANITIZE_EMAIL);
        $consultation_fee = (int)($_POST['consultation_fee'] ?? 0);
        
        if (empty($upi_id) || empty($whatsapp_phone) || empty($clinic_email) || $consultation_fee <= 0) {
            $settingsError = "All fields are required and consultation fee must be greater than zero.";
        } else {
            try {
                $stmt = $pdo->prepare("UPDATE settings SET value = ? WHERE `key` = ?");
                $stmt->execute([$upi_id, 'upi_id']);
                $stmt->execute([$whatsapp_phone, 'whatsapp_phone']);
                $stmt->execute([$clinic_email, 'clinic_email']);
                $stmt->execute([$consultation_fee, 'consultation_fee']);
                
                $settingsSuccess = "Settings updated successfully!";
                
                // Refresh memory configs
                $config['upi_id'] = $upi_id;
                $config['whatsapp_phone'] = $whatsapp_phone;
                $config['clinic_email'] = $clinic_email;
                $config['consultation_fee'] = $consultation_fee;
            } catch (PDOException $e) {
                $settingsError = "Failed to update configurations: " . $e->getMessage();
            }
        }
    }
    
    // Handle Password Change (POST)
    if ($action === 'change_password') {
        $current_password = $_POST['current_password'] ?? '';
        $new_password = $_POST['new_password'] ?? '';
        $confirm_password = $_POST['confirm_password'] ?? '';
        
        if (empty($current_password) || empty($new_password) || empty($confirm_password)) {
            $passwordError = "All password fields are required.";
        } elseif ($new_password !== $confirm_password) {
            $passwordError = "New passwords do not match.";
        } else {
            // Fetch admin account (username is 'admin')
            $stmt = $pdo->prepare("SELECT * FROM admin_users WHERE username = 'admin' LIMIT 1");
            $stmt->execute();
            $admin = $stmt->fetch();
            
            if ($admin && password_verify($current_password, $admin['password_hash'])) {
                // Update hashed password
                $newHash = password_hash($new_password, PASSWORD_BCRYPT);
                $updateStmt = $pdo->prepare("UPDATE admin_users SET password_hash = ? WHERE username = 'admin'");
                $updateStmt->execute([$newHash]);
                $passwordSuccess = "Password updated successfully!";
            } else {
                $passwordError = "Incorrect current password.";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clinic Settings - Brain Mind Behaviour</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="admin.css" rel="stylesheet">
</head>
<body>
    <div class="d-flex flex-column flex-lg-row">
        <!-- Sidebar Navigation -->
        <?php include_once 'sidebar.php'; ?>
        
        <!-- Main Content -->
        <div class="content-wrapper flex-grow-1 p-3 p-md-4 bg-light overflow-hidden" style="min-height: 100vh;">
            
            <div class="mb-4">
                <h2 class="fw-bold text-dark mb-1">Settings & Security</h2>
                <p class="text-muted small">Manage UPI configurations, WhatsApp numbers, alert emails, and credentials.</p>
            </div>
            
            <div class="row g-4">
                
                <!-- Left: Clinic configurations -->
                <div class="col-12 col-xl-6">
                    <div class="card config-card p-4 p-md-5 bg-white shadow-sm">
                        <h4 class="fw-bold text-dark mb-4"><i class="fas fa-sliders-h text-primary me-2"></i>Clinic Settings</h4>
                        
                        <?php if(!empty($settingsSuccess)): ?>
                            <div class="alert alert-success small"><?php echo $settingsSuccess; ?></div>
                        <?php endif; ?>
                        <?php if(!empty($settingsError)): ?>
                            <div class="alert alert-danger small"><?php echo $settingsError; ?></div>
                        <?php endif; ?>
                        
                        <form method="POST" action="">
                            <input type="hidden" name="action" value="update_settings">
                            
                            <div class="mb-3">
                                <label class="form-label small fw-bold text-muted">Clinic UPI ID (for QR Payments) *</label>
                                <input type="text" class="form-control" name="upi_id" value="<?php echo htmlspecialchars($config['upi_id'] ?? ''); ?>" required>
                                <div class="form-text small text-muted">All online payments scanned via QR code will route to this address.</div>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label small fw-bold text-muted">WhatsApp Contact Number *</label>
                                <input type="text" class="form-control" name="whatsapp_phone" value="<?php echo htmlspecialchars($config['whatsapp_phone'] ?? ''); ?>" required>
                                <div class="form-text small text-muted">Include country code without '+', spaces, or symbols (e.g. <code>919160366716</code>).</div>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label small fw-bold text-muted">Notification Alerts Email *</label>
                                <input type="email" class="form-control" name="clinic_email" value="<?php echo htmlspecialchars($config['clinic_email'] ?? ''); ?>" required>
                                <div class="form-text small text-muted">New booking and message notifications will be emailed here.</div>
                            </div>
                            
                            <div class="mb-4">
                                <label class="form-label small fw-bold text-muted">Consultation Fee (INR) *</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light text-muted">₹</span>
                                    <input type="number" class="form-control" name="consultation_fee" value="<?php echo htmlspecialchars($config['consultation_fee'] ?? '1000'); ?>" required>
                                </div>
                            </div>
                            
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary rounded-pill py-2.5 fw-bold">Save Settings</button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Right: Password change -->
                <div class="col-12 col-xl-6" id="security">
                    <div class="card config-card p-4 p-md-5 bg-white shadow-sm">
                        <h4 class="fw-bold text-dark mb-4"><i class="fas fa-user-shield text-dark me-2"></i>Change Admin Password</h4>
                        
                        <?php if(!empty($passwordSuccess)): ?>
                            <div class="alert alert-success small"><?php echo $passwordSuccess; ?></div>
                        <?php endif; ?>
                        <?php if(!empty($passwordError)): ?>
                            <div class="alert alert-danger small"><?php echo $passwordError; ?></div>
                        <?php endif; ?>
                        
                        <form method="POST" action="">
                            <input type="hidden" name="action" value="change_password">
                            
                            <div class="mb-3">
                                <label class="form-label small fw-bold text-muted">Current Admin Password *</label>
                                <input type="password" class="form-control" name="current_password" required>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label small fw-bold text-muted">New Admin Password *</label>
                                <input type="password" class="form-control" name="new_password" required minlength="6">
                            </div>
                            
                            <div class="mb-4">
                                <label class="form-label small fw-bold text-muted">Confirm New Password *</label>
                                <input type="password" class="form-control" name="confirm_password" required minlength="6">
                            </div>
                            
                            <div class="d-grid">
                                <button type="submit" class="btn btn-dark rounded-pill py-2.5 fw-bold">Update Password</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
