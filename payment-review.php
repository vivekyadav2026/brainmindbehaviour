<?php
require_once 'includes/db.php';
global $CLINIC_PHONE;

$appointment_id = $_GET['id'] ?? null;
$appointment = null;

if ($appointment_id) {
    $stmt = $pdo->prepare("SELECT * FROM appointments WHERE id = ?");
    $stmt->execute([$appointment_id]);
    $appointment = $stmt->fetch();
}

if (!$appointment || $appointment['appointment_type'] !== 'online') {
    header("Location: index.php");
    exit;
}

$siteTitle = 'Payment Verification Pending - Brain Mind Behaviour';
$metaDescription = 'Your booking is pending payment verification. Our team will verify and confirm shortly.';
$bodyClass = 'service-details-page';
include_once 'includes/header.php';

// Prefill WhatsApp text
$whatsappMessage = "Hello, I just uploaded my payment proof for my online appointment. " . 
                   "Appointment ID: #" . $appointment['id'] . ", " .
                   "Patient Name: " . $appointment['patient_name'] . ", " .
                   "Transaction UTR: " . $appointment['transaction_id'] . ". " .
                   "Please confirm my booking.";
$whatsappUrl = "https://wa.me/" . $CLINIC_PHONE . "?text=" . urlencode($whatsappMessage);
?>

<main class="main booking-light-theme" style="min-height: 90vh;">
    <div class="container py-5 mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center bg-white p-5 rounded-4 shadow-sm border border-light">
                
                <div class="text-warning mb-4">
                    <svg class="mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="width: 80px; height: 80px;">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                
                <h2 class="fw-bold text-dark mb-3">Verification Pending!</h2>
                <p class="text-muted mb-5">We have received your payment details. Our team is verifying your transaction.</p>
                
                <div class="row justify-content-center text-start mb-5">
                    <div class="col-md-8 bg-light p-4 rounded-3 border border-light">
                        <h5 class="fw-bold text-dark mb-3 border-bottom pb-2">Booking Status</h5>
                        <div class="row g-2 small text-muted">
                            <div class="col-6"><strong>Appointment ID:</strong></div>
                            <div class="col-6 text-dark">#<?php echo htmlspecialchars($appointment['id']); ?></div>
                            
                            <div class="col-6"><strong>Patient Name:</strong></div>
                            <div class="col-6 text-dark"><?php echo htmlspecialchars($appointment['patient_name']); ?></div>
                            
                            <div class="col-6"><strong>Consultation Type:</strong></div>
                            <div class="col-6 text-dark">Online (Video Call)</div>
                            
                            <div class="col-6"><strong>Transaction ID / UTR:</strong></div>
                            <div class="col-6 text-primary fw-bold"><?php echo htmlspecialchars($appointment['transaction_id']); ?></div>
                            
                            <div class="col-6"><strong>Booking Status:</strong></div>
                            <div class="col-6"><span class="badge bg-warning text-dark">Pending Verification</span></div>
                        </div>
                    </div>
                </div>

                <!-- WhatsApp Notification Option to Speed Up Confirmation -->
                <div class="p-4 rounded-3 text-start mb-5 border border-success border-2 bg-success-light" style="background-color: #f4fbf7;">
                    <h6 class="fw-bold text-success mb-2"><i class="fab fa-whatsapp me-2"></i>Speed Up Confirmation:</h6>
                    <p class="text-muted small mb-3">Click below to send your details and UTR to our team directly on WhatsApp. This will help us confirm your appointment instantly!</p>
                    <a href="<?php echo $whatsappUrl; ?>" target="_blank" class="btn btn-success w-100 fw-bold py-2 rounded-pill">
                        <i class="fab fa-whatsapp me-2"></i> Share Payment Details on WhatsApp
                    </a>
                </div>
                
                <p class="text-muted mb-4">You will receive an email confirmation containing the consultation link once the payment is verified.</p>
                
                <div class="d-flex justify-content-center gap-3">
                    <a href="index.php" class="btn btn-primary rounded-pill px-4 py-2 fw-bold">Return to Home</a>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include_once 'includes/footer.php'; ?>
