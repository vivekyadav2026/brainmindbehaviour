<?php
require_once 'includes/db.php';

function sendAppointmentEmail($app) {
    $admin_email = 'admin@brainmindbehaviour.com'; // Clinic Admin Email
    
    // Subject lines
    $subject_admin = "New Appointment Booking Confirmed - ID: #" . $app['id'];
    $subject_patient = "Appointment Booking Confirmed - Brain Mind Behaviour Institute";
    
    // HTML Headers
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: Brain Mind Behaviour Institute <no-reply@brainmindbehaviour.com>" . "\r\n";
    
    // HTML Body Content
    $message = "
    <html>
    <head>
        <title>Appointment Confirmed</title>
        <style>
            body { font-family: Arial, sans-serif; line-height: 1.6; color: #333333; }
            .container { max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #e1dfec; border-radius: 8px; }
            .header { background: #7c62f9; color: #ffffff; padding: 15px; text-align: center; border-radius: 8px 8px 0 0; }
            .content { padding: 20px; }
            .details-table { width: 100%; border-collapse: collapse; margin-top: 15px; }
            .details-table th, .details-table td { padding: 10px; border-bottom: 1px solid #e1dfec; text-align: left; }
            .details-table th { background-color: #f8f7fd; color: #7c62f9; }
            .footer { margin-top: 20px; text-align: center; font-size: 12px; color: #777777; }
        </style>
    </head>
    <body>
        <div class='container'>
            <div class='header'>
                <h2 style='margin:0;'>Brain Mind Behaviour Institute</h2>
            </div>
            <div class='content'>
                <h3>Hello " . htmlspecialchars($app['patient_name']) . ",</h3>
                <p>Your appointment has been successfully booked and confirmed. Below are the details:</p>
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
                        <th>Email Address</th>
                        <td>" . htmlspecialchars($app['patient_email']) . "</td>
                    </tr>
                    <tr>
                        <th>Payment Status</th>
                        <td>Paid</td>
                    </tr>
                    <tr>
                        <th>Razorpay Payment ID</th>
                        <td>" . htmlspecialchars($app['razorpay_payment_id']) . "</td>
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
    
    // Send email to admin
    @mail($admin_email, $subject_admin, $message, $headers);
    
    // Send email to patient if email is provided
    if (!empty($app['patient_email'])) {
        @mail($app['patient_email'], $subject_patient, $message, $headers);
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Razorpay sends razorpay_payment_id, razorpay_order_id, razorpay_signature
    $razorpay_payment_id = $_POST['razorpay_payment_id'] ?? null;
    $appointment_id = $_POST['appointment_id'] ?? null;

    if ($razorpay_payment_id && $appointment_id) {
        // Update database with confirmed payment status
        $stmt = $pdo->prepare("UPDATE appointments SET status = 'confirmed', payment_status = 'paid', razorpay_payment_id = ? WHERE id = ?");
        $stmt->execute([$razorpay_payment_id, $appointment_id]);
        
        // Fetch full details to trigger email notification
        $fetch_stmt = $pdo->prepare("SELECT * FROM appointments WHERE id = ?");
        $fetch_stmt->execute([$appointment_id]);
        $appointment = $fetch_stmt->fetch();
        
        if ($appointment) {
            sendAppointmentEmail($appointment);
        }
        
        $success = true;
    } else {
        $success = false;
    }
} else {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payment Status - Brain Mind Behaviour</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <?php include_once 'includes/header.php'; ?>
    
    <div class="container py-5 mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center bg-white p-5 rounded shadow-sm">
                <?php if ($success): ?>
                    <div class="text-success mb-4">
                        <svg class="w-20 h-20 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="width: 80px; height: 80px;">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h2 class="mb-3">Booking Confirmed!</h2>
                    <p class="text-muted mb-4">Your payment was successful and your appointment is confirmed.</p>
                    <p><strong>Payment ID:</strong> <?php echo htmlspecialchars($razorpay_payment_id); ?></p>
                    <p>Our team will contact you shortly with further details.</p>
                <?php else: ?>
                    <div class="text-danger mb-4">
                        <svg class="w-20 h-20 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="width: 80px; height: 80px;">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h2 class="mb-3">Payment Failed</h2>
                    <p class="text-muted mb-4">There was an issue processing your payment.</p>
                    <a href="index.php" class="btn btn-outline-primary">Try Again</a>
                <?php endif; ?>
                
                <div class="mt-5">
                    <a href="index.php" class="btn btn-primary">Return to Home</a>
                </div>
            </div>
        </div>
    </div>
    
    <?php include_once 'includes/footer.php'; ?>
</body>
</html>
