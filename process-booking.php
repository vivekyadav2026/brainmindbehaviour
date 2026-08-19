<?php
require_once 'includes/db.php';

// Hardcoded Consultation Fee (e.g., 1000 INR)
$consultation_fee = 1000;
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

    // Razorpay Keys (Replace with your actual keys)
    $keyId = 'rzp_test_YOUR_KEY_HERE';
    
    // Normally, here we would call Razorpay Order API to create an order and get an order_id.
    // For this implementation, we will use the standard checkout flow which creates the order on the fly (or you can use Razorpay's API).
    // Let's generate a dummy order ID for demonstration.
    $order_id = "order_" . uniqid();
    
    // Update appointment with order ID
    $stmt = $pdo->prepare("UPDATE appointments SET razorpay_order_id = ? WHERE id = ?");
    $stmt->execute([$order_id, $appointment_id]);
} else {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Processing Payment - Brain Mind Behaviour</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center justify-content-center" style="height: 100vh;">
    <div class="card p-5 text-center shadow-sm" style="max-width: 500px;">
        <h3 class="mb-4">Redirecting to Payment...</h3>
        <p class="text-muted">Please do not refresh or close this page.</p>
        <div class="spinner-border text-primary mx-auto mb-4" role="status"></div>
        
        <!-- Razorpay Checkout Form -->
        <form action="payment-success.php" method="POST" id="razorpay-form">
            <input type="hidden" name="appointment_id" value="<?php echo $appointment_id; ?>">
            <script
                src="https://checkout.razorpay.com/v1/checkout.js"
                data-key="<?php echo $keyId; ?>"
                data-amount="<?php echo $fee_in_paise; ?>"
                data-currency="INR"
                data-order_id=""
                data-buttontext="Pay with Razorpay"
                data-name="Brain Mind Behaviour"
                data-description="Consultation Booking"
                data-image="assets/img/logo.png"
                data-prefill.name="<?php echo htmlspecialchars($patient_name); ?>"
                data-prefill.email="<?php echo htmlspecialchars($patient_email); ?>"
                data-prefill.contact="<?php echo htmlspecialchars($patient_phone); ?>"
                data-theme.color="#2E5C9A"
            ></script>
            <input type="hidden" custom="Hidden Element" name="hidden">
        </form>
    </div>
    
    <script>
        // Auto-click the Razorpay button after a brief delay
        setTimeout(function() {
            document.querySelector('.razorpay-payment-button').click();
            document.querySelector('.razorpay-payment-button').style.display = 'none';
        }, 1500);
    </script>
</body>
</html>
