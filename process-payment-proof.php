<?php
// process-payment-proof.php
require_once 'includes/db.php';
require_once 'includes/mailer.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $appointment_id = (int)($_POST['appointment_id'] ?? 0);
    $transaction_id = htmlspecialchars(trim($_POST['transaction_id'] ?? ''));
    
    if ($appointment_id <= 0 || empty($transaction_id)) {
        die("Invalid request parameters.");
    }

    // Handle File Upload
    if (!isset($_FILES['payment_screenshot']) || $_FILES['payment_screenshot']['error'] !== UPLOAD_ERR_OK) {
        die("Error uploading payment screenshot. Please try again.");
    }

    $fileTmpPath = $_FILES['payment_screenshot']['tmp_name'];
    $fileName = $_FILES['payment_screenshot']['name'];
    $fileSize = $_FILES['payment_screenshot']['size'];
    $fileType = $_FILES['payment_screenshot']['type'];
    
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));
    
    // Sanitize file name
    $newFileName = "screenshot_" . $appointment_id . "_" . time() . "." . $fileExtension;
    
    // Allowed file extensions
    $allowedExtensions = array('jpg', 'jpeg', 'png');
    
    if (in_array($fileExtension, $allowedExtensions)) {
        // Directory where uploaded screenshots will be saved
        $uploadFileDir = './uploads/screenshots/';
        
        // Create directory if not exists
        if (!is_dir($uploadFileDir)) {
            mkdir($uploadFileDir, 0755, true);
        }
        
        $dest_path = $uploadFileDir . $newFileName;
        
        if (move_uploaded_file($fileTmpPath, $dest_path)) {
            // Update database with transaction details and screenshot path
            $stmt = $pdo->prepare("UPDATE appointments SET transaction_id = ?, screenshot_path = ?, status = 'pending', payment_status = 'pending' WHERE id = ?");
            $stmt->execute([$transaction_id, $dest_path, $appointment_id]);
            
            // Fetch appointment details for the email alert
            $fetch_stmt = $pdo->prepare("SELECT * FROM appointments WHERE id = ?");
            $fetch_stmt->execute([$appointment_id]);
            $app = $fetch_stmt->fetch();
            
            if ($app) {
                // Send email alert to clinic admin using PHPMailer
                try {
                    $mail = getMailer();
                    global $CLINIC_EMAIL;
                    
                    $mail->addAddress($CLINIC_EMAIL);
                    if (!empty($app['patient_email'])) {
                        $mail->addReplyTo($app['patient_email'], $app['patient_name']);
                    }
                    
                    $mail->isHTML(true);
                    $mail->Subject = "Payment Verification Pending - Appointment ID: #{$appointment_id}";
                    
                    $emailBody = "<h3>Payment Verification Pending (QR Code Pay)</h3>";
                    $emailBody .= "<p>A patient has uploaded payment proof for verification.</p>";
                    $emailBody .= "<hr/>";
                    $emailBody .= "<p><strong>Appointment ID:</strong> #{$app['id']}</p>";
                    $emailBody .= "<p><strong>Patient Name:</strong> {$app['patient_name']}</p>";
                    $emailBody .= "<p><strong>Patient Phone:</strong> {$app['patient_phone']}</p>";
                    $emailBody .= "<p><strong>Date & Time:</strong> {$app['appointment_date']} at {$app['appointment_time']}</p>";
                    $emailBody .= "<p><strong>Consultation Type:</strong> " . ucfirst($app['appointment_type']) . "</p>";
                    $emailBody .= "<p><strong>Transaction UTR / Ref ID:</strong> <span style='font-size:16px; color:#0d6efd; font-weight:bold;'>{$transaction_id}</span></p>";
                    $emailBody .= "<p><strong>Payment Status:</strong> Pending Admin Verification</p>";
                    
                    $mail->Body    = $emailBody;
                    $mail->AltBody = strip_tags($emailBody);
                    
                    // Attach the uploaded screenshot
                    $mail->addAttachment($dest_path, "Payment_Screenshot_{$appointment_id}.{$fileExtension}");
                    
                    $mail->send();
                } catch (Exception $e) {
                    // Silently ignore mail failure to ensure redirect completes
                }
            }
            
            // Redirect to success/review screen
            header("Location: payment-review.php?id=" . $appointment_id);
            exit;
        } else {
            die("There was an error moving the uploaded file. Please check folder permissions.");
        }
    } else {
        die("Invalid file type. Only JPG, JPEG, and PNG files are allowed.");
    }
} else {
    header("Location: index.php");
    exit;
}
?>
