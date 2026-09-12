<?php
// process-lead.php
header('Content-Type: application/json');

// Catch any unhandled errors cleanly as JSON
set_exception_handler(function($e) {
    echo json_encode(["status" => "error", "message" => "Database / Server Error: " . $e->getMessage()]);
    exit;
});

require_once 'includes/db.php';
require_once 'includes/mailer.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(trim($_POST['name'] ?? ''));
    $phone = htmlspecialchars(trim($_POST['phone'] ?? ''));
    $email = filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL);
    $consultation_type = htmlspecialchars(trim($_POST['consultation_type'] ?? ''));
    $location = htmlspecialchars(trim($_POST['location'] ?? ''));
    $specialist = htmlspecialchars(trim($_POST['specialist'] ?? ''));
    $rawMessage = htmlspecialchars(trim($_POST['message'] ?? ''));

    if (empty($name) || empty($phone)) {
        echo json_encode(["status" => "error", "message" => "Name and Phone number are required."]);
        exit;
    }

    // Auto-create table if not existing on live database
    try {
        $pdo->exec("CREATE TABLE IF NOT EXISTS popup_leads (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(100) NOT NULL,
            phone VARCHAR(20) NOT NULL,
            email VARCHAR(100) NULL,
            consultation_type VARCHAR(100) NULL,
            location VARCHAR(100) NULL,
            specialist VARCHAR(100) NULL,
            message TEXT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )");
    } catch (\Throwable $t) {
        // Table creation attempt failed or ignored
    }

    // Auto-ensure columns exist in popup_leads table
    $columns = ['consultation_type', 'location', 'specialist'];
    foreach ($columns as $col) {
        try {
            $pdo->exec("ALTER TABLE popup_leads ADD COLUMN $col VARCHAR(100) NULL");
        } catch (\Throwable $t) {
            // Column already exists or ignore
        }
    }

    // Construct comprehensive message text
    $combinedDetails = [];
    if (!empty($consultation_type)) $combinedDetails[] = "Type: $consultation_type";
    if (!empty($location)) $combinedDetails[] = "Location: $location";
    if (!empty($specialist)) $combinedDetails[] = "Specialist: $specialist";
    if (!empty($rawMessage)) $combinedDetails[] = "Note: $rawMessage";
    $formattedMessage = implode(" | ", $combinedDetails);

    $dbSaved = false;
    $dbError = "";

    // Step 1: Save to Database
    try {
        $stmt = $pdo->prepare("INSERT INTO popup_leads (name, phone, email, consultation_type, location, specialist, message) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$name, $phone, $email, $consultation_type, $location, $specialist, $formattedMessage]);
        $dbSaved = true;
    } catch (\Throwable $e) {
        // Fallback to basic columns if schema differs
        try {
            $stmt = $pdo->prepare("INSERT INTO popup_leads (name, phone, email, message) VALUES (?, ?, ?, ?)");
            $stmt->execute([$name, $phone, $email, $formattedMessage]);
            $dbSaved = true;
        } catch (\Throwable $ex) {
            $dbError = $ex->getMessage();
        }
    }

    // Step 2: Send Email Notification
    $mailSent = false;
    $mailError = "";
    try {
        $mail = getMailer();
        global $CLINIC_EMAIL;

        $targetEmail = !empty($CLINIC_EMAIL) ? $CLINIC_EMAIL : 'contact@brainmindbehaviour.com';
        $mail->addAddress($targetEmail);

        if (!empty($email)) {
            $mail->addReplyTo($email, $name);
        }

        $mail->isHTML(true);
        $mail->Subject = "New Appointment Lead: $name";
        
        $emailBody = "<h3>New Appointment Lead Received</h3>";
        $emailBody .= "<p><strong>Name:</strong> {$name}</p>";
        $emailBody .= "<p><strong>Phone:</strong> {$phone}</p>";
        if (!empty($consultation_type)) {
            $emailBody .= "<p><strong>Consultation Type:</strong> {$consultation_type}</p>";
        }
        if (!empty($location)) {
            $emailBody .= "<p><strong>Preferred Location:</strong> {$location}</p>";
        }
        if (!empty($specialist)) {
            $emailBody .= "<p><strong>Consult Specialist:</strong> {$specialist}</p>";
        }
        if (!empty($email)) {
            $emailBody .= "<p><strong>Email:</strong> {$email}</p>";
        }
        if (!empty($rawMessage)) {
            $emailBody .= "<p><strong>Message:</strong> {$rawMessage}</p>";
        }
        
        $mail->Body    = $emailBody;
        $mail->AltBody = strip_tags($emailBody);

        $mail->send();
        $mailSent = true;
    } catch (\Throwable $e) {
        $mailError = $e->getMessage();
    }

    if ($dbSaved) {
        echo json_encode([
            "status" => "success",
            "message" => "Thank you! Your appointment request has been submitted successfully.",
            "mail_sent" => $mailSent,
            "mail_error" => $mailError
        ]);
    } else {
        echo json_encode([
            "status" => "error",
            "message" => "Unable to save appointment request: " . $dbError
        ]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request method."]);
}
?>
