<?php
require_once 'includes/db.php';
require_once 'includes/mailer.php';

$appointment_id = $_GET['id'] ?? null;
$appointment = null;

if ($appointment_id) {
    $stmt = $pdo->prepare("SELECT * FROM appointments WHERE id = ?");
    $stmt->execute([$appointment_id]);
    $appointment = $stmt->fetch();
}

if (!$appointment || $appointment['appointment_type'] !== 'onsite') {
    header("Location: index.php");
    exit;
}

$siteTitle = 'Booking Confirmed - Brain Mind Behaviour';
$metaDescription = 'Your onsite clinic consultation appointment has been successfully booked.';
$bodyClass = 'service-details-page';
include_once 'includes/header.php';
?>

<main class="main booking-light-theme" style="min-height: 90vh;">
    <div class="container py-5 mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center bg-white p-5 rounded-4 shadow-sm border border-light">
                <div class="text-success mb-4">
                    <svg class="mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="width: 80px; height: 80px;">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                
                <h2 class="fw-bold text-dark mb-3">Appointment Booked!</h2>
                <p class="text-muted mb-5">Your onsite consultation at our Visakhapatnam clinic has been successfully scheduled.</p>
                
                <div class="row justify-content-center text-start mb-5">
                    <div class="col-md-8 bg-light p-4 rounded-3 border border-light">
                        <h5 class="fw-bold text-dark mb-3 border-bottom pb-2">Booking Details</h5>
                        <div class="row g-2 small text-muted">
                            <div class="col-6"><strong>Appointment ID:</strong></div>
                            <div class="col-6 text-dark">#<?php echo htmlspecialchars($appointment['id']); ?></div>
                            
                            <div class="col-6"><strong>Patient Name:</strong></div>
                            <div class="col-6 text-dark"><?php echo htmlspecialchars($appointment['patient_name']); ?></div>
                            
                            <div class="col-6"><strong>Consultation Type:</strong></div>
                            <div class="col-6 text-dark">On-Site (At Clinic)</div>
                            
                            <div class="col-6"><strong>Date:</strong></div>
                            <div class="col-6 text-dark"><?php echo htmlspecialchars($appointment['appointment_date']); ?></div>
                            
                            <div class="col-6"><strong>Time:</strong></div>
                            <div class="col-6 text-dark"><?php echo htmlspecialchars($appointment['appointment_time']); ?></div>
                            
                            <div class="col-6"><strong>Payment Status:</strong></div>
                            <div class="col-6 text-primary fw-bold">Pay at Clinic (₹1,000)</div>
                        </div>
                    </div>
                </div>

                <div class="p-4 rounded-3 bg-light text-start mb-5 border-start border-primary border-4" style="border-left-width: 4px !important;">
                    <h6 class="fw-bold text-dark mb-2">Clinic Address & Directions</h6>
                    <p class="text-muted small mb-0">101, Coastal Park Apartments, Coastal Battery Road, Opposite Naval Coastal Battery, Maharani Peta, Visakhapatnam, Andhra Pradesh – 530002</p>
                </div>
                
                <p class="text-muted mb-4">A confirmation email has been sent to your registered address. Our team will contact you shortly to confirm the timings.</p>
                
                <div class="d-flex justify-content-center gap-3">
                    <a href="index.php" class="btn btn-primary rounded-pill px-4 py-2 fw-bold">Return to Home</a>
                    <a href="https://maps.google.com/?q=Brain+Mind+Behaviour+Neurosciences+Research+Institute+Visakhapatnam" target="_blank" class="btn btn-outline-secondary rounded-pill px-4 py-2 fw-bold">Get Directions</a>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include_once 'includes/footer.php'; ?>
