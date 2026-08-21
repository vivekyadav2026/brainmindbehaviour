<?php
// admin/dashboard.php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: index.php");
    exit;
}
require_once '../includes/db.php';

// Fetch all statistic counts
$total_stmt = $pdo->query("SELECT COUNT(*) FROM appointments");
$total_count = $total_stmt->fetchColumn();

$pending_stmt = $pdo->query("SELECT COUNT(*) FROM appointments WHERE status = 'pending'");
$pending_count = $pending_stmt->fetchColumn();

$confirmed_stmt = $pdo->query("SELECT COUNT(*) FROM appointments WHERE status = 'confirmed'");
$confirmed_count = $confirmed_stmt->fetchColumn();

$leads_stmt = $pdo->query("SELECT COUNT(*) FROM popup_leads");
$leads_count = $leads_stmt->fetchColumn();

$inquiries_stmt = $pdo->query("SELECT COUNT(*) FROM contact_inquiries");
$inquiries_count = $inquiries_stmt->fetchColumn();

// Fetch 5 most recent appointments
$recent_stmt = $pdo->query("SELECT * FROM appointments ORDER BY created_at DESC LIMIT 5");
$recent_appointments = $recent_stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Brain Mind Behaviour</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="admin.css" rel="stylesheet">
</head>
<body>

<div class="d-flex flex-column flex-lg-row">
    <!-- Collapsible Sidebar -->
    <?php include_once 'sidebar.php'; ?>
    
    <!-- Main Content Container -->
    <div class="content-wrapper flex-grow-1 p-3 p-md-4 bg-light overflow-hidden" style="min-height: 100vh;">
        
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold text-dark mb-1">Dashboard Overview</h2>
                <p class="text-muted small mb-0">Welcome back, Administrator</p>
            </div>
            <div class="d-none d-sm-block">
                <span class="badge bg-white text-dark shadow-sm border px-3 py-2 text-muted fw-normal">
                    <i class="far fa-clock me-1"></i> Local time: <?php echo date('h:i A'); ?>
                </span>
            </div>
        </div>

        <!-- Statistics Row -->
        <div class="row g-3 mb-4">
            
            <!-- Card 1: Pending Appointments -->
            <div class="col-sm-6 col-xl-3">
                <div class="card stat-card p-3 bg-white border-start border-warning border-4" style="border-left-width: 4px !important;">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <h6 class="text-muted small fw-bold mb-1">Pending Bookings</h6>
                            <h3 class="fw-bold mb-0 text-dark"><?php echo $pending_count; ?></h3>
                        </div>
                        <div class="icon-box bg-warning-subtle text-warning">
                            <i class="fas fa-hourglass-half fs-4"></i>
                        </div>
                    </div>
                    <div class="mt-2">
                        <a href="appointments.php?status=pending" class="small text-warning text-decoration-none fw-semibold">Review Pending <i class="fas fa-arrow-right ms-1"></i></a>
                    </div>
                </div>
            </div>

            <!-- Card 2: Confirmed Appointments -->
            <div class="col-sm-6 col-xl-3">
                <div class="card stat-card p-3 bg-white border-start border-success border-4" style="border-left-width: 4px !important;">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <h6 class="text-muted small fw-bold mb-1">Confirmed Bookings</h6>
                            <h3 class="fw-bold mb-0 text-dark"><?php echo $confirmed_count; ?></h3>
                        </div>
                        <div class="icon-box bg-success-subtle text-success">
                            <i class="fas fa-calendar-check fs-4"></i>
                        </div>
                    </div>
                    <div class="mt-2">
                        <a href="appointments.php?status=confirmed" class="small text-success text-decoration-none fw-semibold">View Calendar <i class="fas fa-arrow-right ms-1"></i></a>
                    </div>
                </div>
            </div>

            <!-- Card 3: Popup Leads -->
            <div class="col-sm-6 col-xl-3">
                <div class="card stat-card p-3 bg-white border-start border-info border-4" style="border-left-width: 4px !important;">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <h6 class="text-muted small fw-bold mb-1">Popup Leads</h6>
                            <h3 class="fw-bold mb-0 text-dark"><?php echo $leads_count; ?></h3>
                        </div>
                        <div class="icon-box bg-info-subtle text-info">
                            <i class="fas fa-bullhorn fs-4"></i>
                        </div>
                    </div>
                    <div class="mt-2">
                        <a href="leads.php" class="small text-info text-decoration-none fw-semibold">Manage Leads <i class="fas fa-arrow-right ms-1"></i></a>
                    </div>
                </div>
            </div>

            <!-- Card 4: Contact Inquiries -->
            <div class="col-sm-6 col-xl-3">
                <div class="card stat-card p-3 bg-white border-start border-primary border-4" style="border-left-width: 4px !important;">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <h6 class="text-muted small fw-bold mb-1">Contact Messages</h6>
                            <h3 class="fw-bold mb-0 text-dark"><?php echo $inquiries_count; ?></h3>
                        </div>
                        <div class="icon-box bg-primary-subtle text-primary">
                            <i class="fas fa-envelope-open-text fs-4"></i>
                        </div>
                    </div>
                    <div class="mt-2">
                        <a href="inquiries.php" class="small text-primary text-decoration-none fw-semibold">Read Messages <i class="fas fa-arrow-right ms-1"></i></a>
                    </div>
                </div>
            </div>

        </div>

        <!-- Recent Activities & Quick Navigation -->
        <div class="row g-4">
            <!-- Recent Bookings Table -->
            <div class="col-12 col-xl-8">
                <div class="card border-0 shadow-sm rounded-3 p-4 bg-white">
                    <h5 class="fw-bold text-dark mb-4"><i class="fas fa-history text-muted me-2"></i>Recent Booking Activities</h5>
                    
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Patient</th>
                                    <th>Consultation</th>
                                    <th>Schedule</th>
                                    <th>Status</th>
                                    <th>Details</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (count($recent_appointments) > 0): ?>
                                    <?php foreach ($recent_appointments as $app): ?>
                                    <tr>
                                        <td>
                                            <div class="fw-bold text-dark"><?php echo htmlspecialchars($app['patient_name']); ?></div>
                                            <small class="text-muted"><?php echo htmlspecialchars($app['patient_phone']); ?></small>
                                        </td>
                                        <td>
                                            <span class="badge bg-info-subtle text-info fw-semibold px-2 py-1">
                                                <?php echo ucfirst($app['appointment_type']); ?>
                                            </span>
                                        </td>
                                        <td>
                                            <div class="small fw-semibold"><?php echo $app['appointment_date']; ?></div>
                                            <small class="text-muted"><?php echo $app['appointment_time']; ?></small>
                                        </td>
                                        <td>
                                            <?php if ($app['status'] === 'confirmed'): ?>
                                                <span class="badge bg-success">Confirmed</span>
                                            <?php elseif ($app['status'] === 'cancelled'): ?>
                                                <span class="badge bg-danger">Cancelled</span>
                                            <?php else: ?>
                                                <span class="badge bg-warning text-dark">Pending</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <a href="appointments.php" class="btn btn-sm btn-outline-secondary py-1 px-3 rounded-pill fw-semibold" style="font-size:12px;">Manage</a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="5" class="text-center py-4 text-muted">No appointments found.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Quick Navigation Panel -->
            <div class="col-12 col-xl-4">
                <div class="card border-0 shadow-sm rounded-3 p-4 bg-white h-100">
                    <h5 class="fw-bold text-dark mb-3"><i class="fas fa-tools text-muted me-2"></i>Quick Actions</h5>
                    
                    <div class="d-grid gap-2">
                        <a href="appointments.php?status=pending" class="btn btn-warning text-dark rounded-pill py-2.5 fw-bold text-start ps-4">
                            <i class="fas fa-tasks me-2"></i> Verify Pending Payments
                        </a>
                        <a href="settings.php" class="btn btn-outline-primary rounded-pill py-2.5 fw-bold text-start ps-4">
                            <i class="fas fa-sliders-h me-2"></i> Edit Clinic UPI/WhatsApp
                        </a>
                        <a href="settings.php#security" class="btn btn-outline-dark rounded-pill py-2.5 fw-bold text-start ps-4">
                            <i class="fas fa-user-shield me-2"></i> Change Admin Password
                        </a>
                        <a href="../book-appointment.php" target="_blank" class="btn btn-outline-secondary rounded-pill py-2.5 fw-bold text-start ps-4">
                            <i class="fas fa-external-link-alt me-2"></i> Open Booking Page
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
