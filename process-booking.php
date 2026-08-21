<?php
require_once 'includes/db.php';

// Dynamic Consultation Fee from database
$consultation_fee = $CONSULTATION_FEE;
$fee_in_paise = $consultation_fee * 100;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $patient_name = $_POST['patient_name'] ?? '';
    $patient_phone = $_POST['patient_phone'] ?? '';
    $patient_email = $_POST['patient_email'] ?? '';
    $appointment_type = $_POST['appointment_type'] ?? '';
    $appointment_date = $_POST['appointment_date'] ?? '';
    $appointment_time = $_POST['appointment_time'] ?? '';

    // Insert pending appointment
    $stmt = $pdo->prepare("INSERT INTO appointments (patient_name, patient_phone, patient_email, appointment_type, appointment_date, appointment_time, status, payment_status) VALUES (?, ?, ?, ?, ?, ?, 'pending', 'pending')");
    $stmt->execute([$patient_name, $patient_phone, $patient_email, $appointment_type, $appointment_date, $appointment_time]);
    
    $appointment_id = $pdo->lastInsertId();

    // If On-Site consultation, confirm immediately and bypass online payment
    if ($appointment_type === 'onsite') {
        $stmt = $pdo->prepare("UPDATE appointments SET status = 'confirmed', payment_status = 'pay_at_clinic' WHERE id = ?");
        $stmt->execute([$appointment_id]);

        // Send Email Confirmation
        require_once 'includes/mailer.php';
        try {
            $mail = getMailer();
            global $CLINIC_EMAIL;

            $mail->addAddress($CLINIC_EMAIL);
            if (!empty($patient_email)) {
                $mail->addAddress($patient_email);
                $mail->addReplyTo($patient_email, $patient_name);
            }

            $mail->isHTML(true);
            $mail->Subject = "Appointment Confirmed (On-Site): $patient_name";

            $emailBody = "<h3>Appointment Booking Confirmed (On-Site)</h3>";
            $emailBody .= "<p><strong>Appointment ID:</strong> #{$appointment_id}</p>";
            $emailBody .= "<p><strong>Patient Name:</strong> {$patient_name}</p>";
            $emailBody .= "<p><strong>Phone:</strong> {$patient_phone}</p>";
            if (!empty($patient_email)) {
                $emailBody .= "<p><strong>Email:</strong> {$patient_email}</p>";
            }
            $emailBody .= "<p><strong>Consultation Type:</strong> On-Site (At Clinic)</p>";
            $emailBody .= "<p><strong>Date:</strong> {$appointment_date}</p>";
            $emailBody .= "<p><strong>Time:</strong> {$appointment_time}</p>";
            $emailBody .= "<p><strong>Payment Status:</strong> Pay at Clinic (₹2,000)</p>";

            $mail->Body    = $emailBody;
            $mail->AltBody = strip_tags($emailBody);
            $mail->send();
        } catch (Exception $e) {
            // Silently ignore email failures
        }

        header("Location: booking-success.php?id=" . $appointment_id);
        exit;
    }

    // --- Otherwise (Online Video Call), Send Email Notification for Initiation ---
    require_once 'includes/mailer.php';
    try {
        $mail = getMailer();
        global $CLINIC_EMAIL;
        
        $mail->addAddress($CLINIC_EMAIL);
        if (!empty($patient_email)) {
            $mail->addReplyTo($patient_email, $patient_name);
        }
        
        $mail->isHTML(true);
        $mail->Subject = "New Online Appointment Booking Initiated: $patient_name";
        
        $emailBody = "<h3>New Online Appointment Booking Started</h3>";
        $emailBody .= "<p><strong>Patient Name:</strong> {$patient_name}</p>";
        $emailBody .= "<p><strong>Phone:</strong> {$patient_phone}</p>";
        $emailBody .= "<p><strong>Email:</strong> {$patient_email}</p>";
        $emailBody .= "<p><strong>Consultation Type:</strong> Online (Video Call)</p>";
        $emailBody .= "<p><strong>Date:</strong> {$appointment_date}</p>";
        $emailBody .= "<p><strong>Time:</strong> {$appointment_time}</p>";
        $emailBody .= "<p><strong>Status:</strong> Pending Payment (Checkout Initiated)</p>";
        
        $mail->Body    = $emailBody;
        $mail->AltBody = strip_tags($emailBody);
        $mail->send();
    } catch (Exception $e) {
        // Silently ignore
    }
    // -----------------------------------------------------------------------------

    // Fetch UPI ID and Phone Number from database configuration
    global $CLINIC_UPI_ID, $CLINIC_PHONE;
    
    // Generate static-aligned UPI URL for mobile intent-taps (Matches owner of 9848212220@hdfc)
    $payeeName = "Ramanand Satapathy";
    $upiString = "upi://pay?pa=" . $CLINIC_UPI_ID . "&pn=" . urlencode($payeeName) . "&am=" . $consultation_fee . "&cu=INR";
} else {
    header("Location: index.php");
    exit;
}

$siteTitle = 'Secure Payment - Brain Mind Behaviour';
$metaDescription = 'Scan QR code to pay consultation fee and upload proof.';
$bodyClass = 'service-details-page';
include_once 'includes/header.php';
?>

<main class="main booking-light-theme" style="min-height: 90vh;">
    <div class="container py-5 mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="bg-white p-4 p-md-5 rounded-4 shadow-sm border border-light text-center">
                    
                    <h2 class="fw-bold text-dark mb-3">Secure Payment</h2>
                    <p class="text-muted mb-4">Complete your booking by paying the consultation fee of <strong>₹2,000</strong> via UPI QR Code.</p>
                    
                    <div class="row justify-content-center align-items-center g-4 mb-5">
                        <!-- Left: QR Code -->
                        <div class="col-md-5">
                            <div class="p-3 bg-light rounded-4 border border-light d-inline-block shadow-sm">
                                <a href="<?php echo $upiString; ?>">
                                    <img src="assets/img/clinic_qr.jpg" alt="UPI QR Code" class="img-fluid" style="max-width: 220px; border-radius: 8px;">
                                </a>
                                <div class="mt-2 text-dark fw-bold small">
                                    Scan or Tap to Pay ₹2,000
                                </div>
                            </div>
                        </div>
                        
                        <!-- Right: Scan details -->
                        <div class="col-md-7 text-start">
                            <div class="p-3 bg-light rounded-3 border-start border-primary border-4" style="border-left-width: 4px !important;">
                                <h6 class="fw-bold text-dark mb-3"><i class="fas fa-info-circle text-primary me-2"></i>Payment Instructions:</h6>
                                <ol class="small text-muted ps-3 mb-0" style="line-height: 1.6;">
                                    <li class="mb-2">Open GPay, PhonePe, Paytm, or any UPI app on your phone.</li>
                                    <li class="mb-2">Scan the QR code on the left and complete the payment of <strong>₹2,000</strong>.</li>
                                    <li class="mb-2">Enter <code><?php echo htmlspecialchars($CLINIC_UPI_ID); ?></code> manually if you are booking on mobile and can't scan.</li>
                                    <li class="mb-2">Save the payment confirmation screenshot on your device.</li>
                                </ol>
                            </div>
                        </div>
                    </div>

                    <!-- Payment Proof Form -->
                    <div class="border-top pt-4 text-start">
                        <h4 class="fw-bold text-dark mb-4">Submit Payment Proof</h4>
                        
                        <form action="process-payment-proof.php" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="appointment_id" value="<?php echo $appointment_id; ?>">
                            
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label fw-bold small text-muted">Transaction ID / UTR (12-digit number) *</label>
                                    <input type="text" class="form-control" name="transaction_id" placeholder="E.g. 312894567210" required pattern="\d{12,}" title="Please enter a valid Transaction UTR (at least 12 digits)">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold small text-muted">Upload Payment Screenshot *</label>
                                    <input type="file" class="form-control" name="payment_screenshot" accept="image/*" required>
                                </div>
                                
                                <div class="col-12 mt-4">
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary rounded-pill py-3 fw-bold" style="background-color: #0d6efd; border-color: #0d6efd; box-shadow: 0 4px 15px rgba(13, 110, 253, 0.3);">
                                            <i class="fas fa-check-circle me-2"></i> Submit Payment Details
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Alternative WhatsApp Contact -->
                    <div class="mt-4 pt-3 border-top text-center">
                        <p class="text-muted small mb-3">Facing issues? Book directly or share proof via WhatsApp:</p>
                        <a href="https://wa.me/<?php echo $CLINIC_PHONE; ?>?text=<?php echo urlencode("Hello, I am trying to book an appointment (ID: #".$appointment_id."). Need assistance with payment."); ?>" target="_blank" class="btn btn-success rounded-pill px-4 py-2 fw-bold" style="box-shadow: 0 4px 12px rgba(40, 167, 69, 0.3);">
                            <i class="fab fa-whatsapp me-2"></i> Chat with Clinic on WhatsApp
                        </a>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</main>

<?php include_once 'includes/footer.php'; ?>
