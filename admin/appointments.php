<?php
// admin/appointments.php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: index.php");
    exit;
}
require_once '../includes/db.php';

// Handle Action Updates (POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && isset($_POST['appointment_id'])) {
    $appointment_id = (int)$_POST['appointment_id'];
    $action = $_POST['action'];
    
    if ($action === 'confirm') {
        $stmt = $pdo->prepare("UPDATE appointments SET status = 'confirmed', payment_status = 'paid' WHERE id = ?");
        $stmt->execute([$appointment_id]);

        // Fetch details to trigger SMTP email notification to patient
        $fetch_stmt = $pdo->prepare("SELECT * FROM appointments WHERE id = ?");
        $fetch_stmt->execute([$appointment_id]);
        $app = $fetch_stmt->fetch();
        
        if ($app && !empty($app['patient_email'])) {
            require_once '../includes/mailer.php';
            try {
                $mail = getMailer();
                $mail->addAddress($app['patient_email']);
                
                $message = "
                <html>
                <head>
                    <title>Appointment Confirmed</title>
                    <style>
                        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333333; }
                        .container { max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #e1dfec; border-radius: 8px; }
                        .header { background: #0d6efd; color: #ffffff; padding: 15px; text-align: center; border-radius: 8px 8px 0 0; }
                        .content { padding: 20px; }
                        .details-table { width: 100%; border-collapse: collapse; margin-top: 15px; }
                        .details-table th, .details-table td { padding: 10px; border-bottom: 1px solid #e1dfec; text-align: left; }
                        .details-table th { background-color: #f8fafc; color: #0d6efd; }
                        .footer { margin-top: 20px; text-align: center; font-size: 12px; color: #777777; }
                    </style>
                </head>
                <body>
                    <div class='container'>
                        <div class='header'>
                            <h2 style='margin:0; color:#ffffff;'>Brain Mind Behaviour Institute</h2>
                        </div>
                        <div class='content'>
                            <h3>Hello " . htmlspecialchars($app['patient_name']) . ",</h3>
                            <p>Your appointment has been successfully verified and confirmed. Below are the details:</p>
                            <table class='details-table'>
                                <tr>
                                    <th>Appointment ID</th>
                                    <td>#" . htmlspecialchars($app['id']) . "</td>
                                </tr>
                                <tr>
                                    <th>Consultation Type</th>
                                    <td>" . ucfirst(htmlspecialchars($app['appointment_type'])) . " Consultation</td>
                                </tr>
                                <tr>
                                    <th>Preferred Date</th>
                                    <td>" . htmlspecialchars($app['appointment_date']) . "</td>
                                </tr>
                                <tr>
                                    <th>Preferred Time</th>
                                    <td>" . htmlspecialchars($app['appointment_time']) . "</td>
                                </tr>
                                <tr>
                                    <th>Phone Number</th>
                                    <td>" . htmlspecialchars($app['patient_phone']) . "</td>
                                </tr>
                                <tr>
                                    <th>Payment Status</th>
                                    <td>Paid (Verified via QR Code UTR: " . htmlspecialchars($app['transaction_id']) . ")</td>
                                </tr>
                            </table>
                            <p style='margin-top: 20px;'>If you need to make any changes or have questions, please call us directly at <strong>+91 91603 66716</strong> or message us on WhatsApp.</p>
                        </div>
                        <div class='footer'>
                            <p>&copy; " . date('Y') . " Brain Mind Behaviour Neurosciences Research Institute, Visakhapatnam.</p>
                        </div>
                    </div>
                </body>
                </html>
                ";
                
                $mail->isHTML(true);
                $mail->Subject = "Appointment Confirmed: " . $app['patient_name'];
                $mail->Body    = $message;
                $mail->AltBody = strip_tags($message);
                $mail->send();
            } catch (Exception $e) {
                // Silently ignore mail failures
            }
        }
    } elseif ($action === 'cancel') {
        $stmt = $pdo->prepare("UPDATE appointments SET status = 'cancelled' WHERE id = ?");
        $stmt->execute([$appointment_id]);
    } elseif ($action === 'reschedule') {
        $new_date = $_POST['new_date'] ?? '';
        $new_time = $_POST['new_time'] ?? '';
        if (!empty($new_date) && !empty($new_time)) {
            $stmt = $pdo->prepare("UPDATE appointments SET appointment_date = ?, appointment_time = ? WHERE id = ?");
            $stmt->execute([$new_date, $new_time, $appointment_id]);
            
            // Fetch patient details to notify reschedule
            $fetch_stmt = $pdo->prepare("SELECT * FROM appointments WHERE id = ?");
            $fetch_stmt->execute([$appointment_id]);
            $app = $fetch_stmt->fetch();
            
            if ($app && !empty($app['patient_email'])) {
                require_once '../includes/mailer.php';
                try {
                    $mail = getMailer();
                    $mail->addAddress($app['patient_email']);
                    $mail->isHTML(true);
                    $mail->Subject = "Appointment Rescheduled - ID: #{$appointment_id}";
                    
                    $message = "<h3>Your Appointment has been Rescheduled</h3>";
                    $message .= "<p>Hello " . htmlspecialchars($app['patient_name']) . ",</p>";
                    $message .= "<p>Please note that your appointment has been updated to the following date and time:</p>";
                    $message .= "<ul>";
                    $message .= "<li><strong>New Date:</strong> {$new_date}</li>";
                    $message .= "<li><strong>New Time:</strong> {$new_time}</li>";
                    $message .= "<li><strong>Consultation Type:</strong> " . ucfirst($app['appointment_type']) . "</li>";
                    $message .= "</ul>";
                    $message .= "<p>If you have any issues with this timing, please contact us immediately.</p>";
                    
                    $mail->Body = $message;
                    $mail->AltBody = strip_tags($message);
                    $mail->send();
                } catch (Exception $e) {
                    // Ignore mail error
                }
            }
        }
    } elseif ($action === 'delete') {
        $stmt = $pdo->prepare("DELETE FROM appointments WHERE id = ?");
        $stmt->execute([$appointment_id]);
    }

    header("Location: appointments.php");
    exit;
}

// Filters & Search Setup
$statusFilter = $_GET['status'] ?? '';
$typeFilter = $_GET['type'] ?? '';
$searchQuery = $_GET['search'] ?? '';

$sql = "SELECT * FROM appointments WHERE 1=1";
$params = [];

if (!empty($statusFilter)) {
    $sql .= " AND status = ?";
    $params[] = $statusFilter;
}
if (!empty($typeFilter)) {
    $sql .= " AND appointment_type = ?";
    $params[] = $typeFilter;
}
if (!empty($searchQuery)) {
    $sql .= " AND (patient_name LIKE ? OR patient_phone LIKE ? OR patient_email LIKE ? OR transaction_id LIKE ?)";
    $searchWildcard = "%$searchQuery%";
    $params[] = $searchWildcard;
    $params[] = $searchWildcard;
    $params[] = $searchWildcard;
    $params[] = $searchWildcard;
}

// Count total records matching search filters
$count_sql = "SELECT COUNT(*) FROM appointments WHERE 1=1";
if (!empty($statusFilter)) {
    $count_sql .= " AND status = '" . $statusFilter . "'";
}
if (!empty($typeFilter)) {
    $count_sql .= " AND appointment_type = '" . $typeFilter . "'";
}
if (!empty($searchQuery)) {
    $count_sql .= " AND (patient_name LIKE ? OR patient_phone LIKE ? OR patient_email LIKE ? OR transaction_id LIKE ?)";
    $count_stmt = $pdo->prepare($count_sql);
    $count_stmt->execute([$searchWildcard, $searchWildcard, $searchWildcard, $searchWildcard]);
} else {
    $count_stmt = $pdo->query($count_sql);
}
$total_count = $count_stmt->fetchColumn();

// Pagination Parameters
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($page < 1) $page = 1;
$limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 10;
$total_pages = ceil($total_count / $limit);
if ($total_pages < 1) $total_pages = 1;
if ($page > $total_pages) $page = $total_pages;
$offset = ($page - 1) * $limit;

$sql .= " ORDER BY appointment_date DESC, appointment_time DESC LIMIT $limit OFFSET $offset";
$stmt = $pdo->prepare($sql);
$stmt->execute($params);
$appointments = $stmt->fetchAll();

// Build query parameter string for pagination links
$queryParams = '';
if (!empty($statusFilter)) $queryParams .= '&status=' . urlencode($statusFilter);
if (!empty($typeFilter)) $queryParams .= '&type=' . urlencode($typeFilter);
if (!empty($searchQuery)) $queryParams .= '&search=' . urlencode($searchQuery);
if ($limit != 10) $queryParams .= '&limit=' . $limit;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Appointments - Brain Mind Behaviour</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="admin.css" rel="stylesheet">
</head>
<body>
    <div class="d-flex flex-column flex-lg-row">
        <!-- Responsive Sidebar -->
        <?php include_once 'sidebar.php'; ?>
        
        <!-- Main Content -->
        <div class="content-wrapper flex-grow-1 p-3 p-md-4 bg-light overflow-hidden" style="min-height: 100vh;">
            
            <div class="mb-4">
                <h2 class="fw-bold text-dark mb-1">Appointments Management</h2>
                <p class="text-muted small">Verify payments, reschedule slots, and update statuses.</p>
            </div>
            
            <!-- Filters Bar -->
            <div class="card border-0 shadow-sm rounded-3 p-3 mb-4 bg-white">
                <form method="GET" action="" class="row g-2">
                    <div class="col-md-4">
                        <div class="input-group input-group-sm">
                            <span class="input-group-text bg-light text-muted border-end-0"><i class="fas fa-search"></i></span>
                            <input type="text" name="search" class="form-control bg-light border-start-0" placeholder="Search by name, phone, email, UTR..." value="<?php echo htmlspecialchars($searchQuery); ?>">
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <select name="status" class="form-select form-select-sm bg-light">
                            <option value="">All Statuses</option>
                            <option value="pending" <?php echo $statusFilter === 'pending' ? 'selected' : ''; ?>>Pending</option>
                            <option value="confirmed" <?php echo $statusFilter === 'confirmed' ? 'selected' : ''; ?>>Confirmed</option>
                            <option value="cancelled" <?php echo $statusFilter === 'cancelled' ? 'selected' : ''; ?>>Cancelled</option>
                        </select>
                    </div>
                    <div class="col-6 col-md-3">
                        <select name="type" class="form-select form-select-sm bg-light">
                            <option value="">All Types</option>
                            <option value="online" <?php echo $typeFilter === 'online' ? 'selected' : ''; ?>>Online (Video)</option>
                            <option value="onsite" <?php echo $typeFilter === 'onsite' ? 'selected' : ''; ?>>On-Site (Clinic)</option>
                        </select>
                    </div>
                    <div class="col-12 col-md-2 d-grid">
                        <button type="submit" class="btn btn-sm btn-primary rounded-3 fw-bold">Apply Filters</button>
                    </div>
                </form>
            </div>

            <!-- Table Card -->
            <div class="card table-card p-4 bg-white shadow-sm">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>ID</th>
                                <th>Patient Details</th>
                                <th>Consultation</th>
                                <th>Date & Time</th>
                                <th>Status</th>
                                <th>Payment Verification</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (count($appointments) > 0): ?>
                                <?php foreach ($appointments as $app): ?>
                                    <?php
                                    // Sanitize patient phone for WhatsApp
                                    $cleanPhone = preg_replace('/[^0-9]/', '', $app['patient_phone']);
                                    if (strlen($cleanPhone) === 10) {
                                        $cleanPhone = "91" . $cleanPhone;
                                    }

                                    // WhatsApp Message Text
                                    $waConfirmMsg = "Hello " . $app['patient_name'] . ",\n\n"
                                                  . "Your appointment with Brain Mind Behaviour Clinic is successfully confirmed! Here are the details:\n\n"
                                                  . "📅 Date: " . $app['appointment_date'] . "\n"
                                                  . "⏰ Time Slot: " . $app['appointment_time'] . "\n"
                                                  . "🏥 Consultation: " . ucfirst($app['appointment_type']) . "\n"
                                                  . "📍 Location: 101, Coastal Park Apartments, Coastal Battery Road, Maharani Peta, Visakhapatnam.\n\n"
                                                  . "If you have any questions, feel free to ask. See you at the clinic!";
                                    ?>
                                <tr>
                                    <td class="fw-bold">#<?php echo $app['id']; ?></td>
                                    <td>
                                        <div class="fw-bold text-dark"><?php echo htmlspecialchars($app['patient_name']); ?></div>
                                        <div class="small text-muted"><i class="fas fa-phone-alt me-1"></i><?php echo htmlspecialchars($app['patient_phone']); ?></div>
                                        <div class="small text-muted"><i class="fas fa-envelope me-1"></i><?php echo htmlspecialchars($app['patient_email']); ?></div>
                                    </td>
                                    <td>
                                        <span class="badge bg-info-subtle text-info fw-semibold px-2 py-1">
                                            <?php echo ucfirst($app['appointment_type']); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <div class="fw-semibold small"><?php echo $app['appointment_date']; ?></div>
                                        <div class="text-muted small"><?php echo $app['appointment_time']; ?></div>
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
                                        <?php 
                                        if ($app['payment_status'] === 'paid') {
                                            echo '<span class="badge bg-success">Paid</span>';
                                        } elseif ($app['payment_status'] === 'pay_at_clinic') {
                                            echo '<span class="badge bg-info text-dark">Pay at Clinic</span>';
                                        } else {
                                            echo '<span class="badge bg-warning text-dark text-wrap">Pending Verification</span>';
                                        }
                                        ?>
                                        <?php if (!empty($app['transaction_id'])): ?>
                                            <br/><small class="text-muted"><strong>UTR:</strong> <?php echo htmlspecialchars($app['transaction_id']); ?></small>
                                        <?php endif; ?>
                                        <?php if (!empty($app['screenshot_path'])): ?>
                                            <br/><a href="../<?php echo htmlspecialchars($app['screenshot_path']); ?>" target="_blank" class="btn btn-sm btn-outline-primary px-2 py-0 mt-1" style="font-size:10px; font-weight:600;"><i class="fas fa-receipt me-1"></i>View Proof</a>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                Manage
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end shadow border-0">
                                                <?php if($app['status'] === 'pending'): ?>
                                                    <li>
                                                        <form method="POST" style="display:inline;">
                                                            <input type="hidden" name="appointment_id" value="<?php echo $app['id']; ?>">
                                                            <input type="hidden" name="action" value="confirm">
                                                            <button type="submit" class="dropdown-item text-success fw-bold"><i class="fas fa-check-circle me-2"></i>Verify & Confirm</button>
                                                        </form>
                                                    </li>
                                                    <li>
                                                        <form method="POST" style="display:inline;">
                                                            <input type="hidden" name="appointment_id" value="<?php echo $app['id']; ?>">
                                                            <input type="hidden" name="action" value="cancel">
                                                            <button type="submit" class="dropdown-item text-danger"><i class="fas fa-ban me-2"></i>Cancel Slot</button>
                                                        </form>
                                                    </li>
                                                <?php endif; ?>
                                                <?php if ($app['status'] === 'confirmed'): ?>
                                                    <li>
                                                        <a class="dropdown-item text-success fw-bold" href="https://wa.me/<?php echo $cleanPhone; ?>?text=<?php echo urlencode($waConfirmMsg); ?>" target="_blank">
                                                            <i class="fab fa-whatsapp me-2"></i>Send WA Confirm
                                                        </a>
                                                    </li>
                                                <?php else: ?>
                                                    <li>
                                                        <a class="dropdown-item text-muted" href="https://wa.me/<?php echo $cleanPhone; ?>?text=<?php echo urlencode("Hello " . $app['patient_name'] . ", regarding your appointment ID #" . $app['id'] . " at Brain Mind Behaviour Clinic..."); ?>" target="_blank">
                                                            <i class="fab fa-whatsapp me-2"></i>Chat on WA
                                                        </a>
                                                    </li>
                                                <?php endif; ?>
                                                <li>
                                                    <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#rescheduleModal" data-id="<?php echo $app['id']; ?>" data-date="<?php echo $app['appointment_date']; ?>" data-time="<?php echo $app['appointment_time']; ?>"><i class="fas fa-clock me-2"></i>Reschedule</button>
                                                </li>
                                                <li><hr class="dropdown-divider"></li>
                                                <li>
                                                    <form method="POST" onsubmit="return confirm('Are you sure you want to permanently delete this record?');" style="display:inline;">
                                                        <input type="hidden" name="appointment_id" value="<?php echo $app['id']; ?>">
                                                        <input type="hidden" name="action" value="delete">
                                                        <button type="submit" class="dropdown-item text-danger"><i class="fas fa-trash me-2"></i>Delete Record</button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="7" class="text-center py-4 text-muted">No appointments matching filters found.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                
                <!-- Premium Pagination Controls -->
                <?php if ($total_pages > 1): ?>
                <nav aria-label="Appointments Page Navigation" class="mt-4">
                    <div class="d-flex flex-column flex-sm-row justify-content-between align-items-center gap-3">
                        <div class="text-muted small">
                            Showing <strong><?php echo $offset + 1; ?></strong> to <strong><?php echo min($offset + $limit, $total_count); ?></strong> of <strong><?php echo $total_count; ?></strong> appointments
                        </div>
                        <ul class="pagination pagination-sm mb-0">
                            <li class="page-item <?php echo $page <= 1 ? 'disabled' : ''; ?>">
                                <a class="page-link" href="?page=<?php echo $page - 1; ?><?php echo $queryParams; ?>" tabindex="-1">Previous</a>
                            </li>
                            
                            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                                <li class="page-item <?php echo $page == $i ? 'active' : ''; ?>">
                                    <a class="page-link" href="?page=<?php echo $i; ?><?php echo $queryParams; ?>"><?php echo $i; ?></a>
                                </li>
                            <?php endfor; ?>
                            
                            <li class="page-item <?php echo $page >= $total_pages ? 'disabled' : ''; ?>">
                                <a class="page-link" href="?page=<?php echo $page + 1; ?><?php echo $queryParams; ?>">Next</a>
                            </li>
                        </ul>
                    </div>
                </nav>
                <?php else: ?>
                <div class="mt-3 text-muted small">
                    Showing all <strong><?php echo $total_count; ?></strong> appointments.
                </div>
                <?php endif; ?>
            </div>

        </div>
    </div>

    <!-- Reschedule Modal -->
    <div class="modal fade" id="rescheduleModal" tabindex="-1" aria-labelledby="rescheduleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow">
                <div class="modal-header bg-light">
                    <h5 class="modal-title fw-bold text-dark" id="rescheduleModalLabel">Reschedule Appointment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="">
                    <div class="modal-body">
                        <input type="hidden" name="appointment_id" id="modal_appointment_id">
                        <input type="hidden" name="action" value="reschedule">
                        
                        <div class="mb-3">
                            <label class="form-label small fw-bold text-muted">New Appointment Date</label>
                            <input type="date" class="form-control" name="new_date" id="modal_appointment_date" required>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label small fw-bold text-muted">New Time Slot</label>
                            <select class="form-select" name="new_time" id="modal_appointment_time" required>
                                <option value="10:00 AM">10:00 AM - 11:00 AM</option>
                                <option value="11:30 AM">11:30 AM - 12:30 PM</option>
                                <option value="02:00 PM">02:00 PM - 03:00 PM</option>
                                <option value="04:00 PM">04:00 PM - 05:00 PM</option>
                                <option value="06:00 PM">06:00 PM - 07:00 PM</option>
                            </select>
                        </div>
                        
                        <p class="text-muted small mb-0"><i class="fas fa-info-circle me-1"></i> Rescheduling will send an automated notification email to the patient if their email is available.</p>
                    </div>
                    <div class="modal-footer border-top-0">
                        <button type="button" class="btn btn-sm btn-secondary rounded-pill px-3" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-sm btn-primary rounded-pill px-4">Update Details</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Modal Data Binder
        var rescheduleModal = document.getElementById('rescheduleModal');
        rescheduleModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var appointmentId = button.getAttribute('data-id');
            var appointmentDate = button.getAttribute('data-date');
            var appointmentTime = button.getAttribute('data-time');
            
            document.getElementById('modal_appointment_id').value = appointmentId;
            document.getElementById('modal_appointment_date').value = appointmentDate;
            
            // Set selected time dropdown option
            var timeSelect = document.getElementById('modal_appointment_time');
            for(var i=0; i < timeSelect.options.length; i++) {
                if(timeSelect.options[i].value === appointmentTime) {
                    timeSelect.selectedIndex = i;
                    break;
                }
            }
        });
    </script>
</body>
</html>
