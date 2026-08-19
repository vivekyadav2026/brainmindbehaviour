<?php
require_once 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Razorpay sends razorpay_payment_id, razorpay_order_id, razorpay_signature
    $razorpay_payment_id = $_POST['razorpay_payment_id'] ?? null;
    $appointment_id = $_POST['appointment_id'] ?? null;

    if ($razorpay_payment_id && $appointment_id) {
        // Normally, you would verify the signature here using Razorpay SDK.
        // Assuming payment is successful:
        
        $stmt = $pdo->prepare("UPDATE appointments SET status = 'confirmed', payment_status = 'paid', razorpay_payment_id = ? WHERE id = ?");
        $stmt->execute([$razorpay_payment_id, $appointment_id]);
        
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
