<?php
// process-lead.php
header('Content-Type: application/json');

require_once 'includes/db.php';
require_once 'includes/mailer.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(trim($_POST['name'] ?? ''));
    $phone = htmlspecialchars(trim($_POST['phone'] ?? ''));
    $email = filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars(trim($_POST['message'] ?? ''));

    if (empty($name) || empty($phone)) {
        echo json_encode(["status" => "error", "message" => "Name and Phone number are required."]);
        exit;
    }

    try {
        // Save to Database first
        $stmt = $pdo->prepare("INSERT INTO popup_leads (name, phone, email, message) VALUES (?, ?, ?, ?)");
        $stmt->execute([$name, $phone, $email, $message]);

        $mail = getMailer();
        global $CLINIC_EMAIL;

        // Recipients
        $mail->addAddress($CLINIC_EMAIL);

        if (!empty($email)) {
            $mail->addReplyTo($email, $name);
        }

        // Content
        $mail->isHTML(true);
        $mail->Subject = "New Website Lead: $name";
        
        $emailBody = "<h3>New Website Lead Received</h3>";
        $emailBody .= "<p><strong>Name:</strong> {$name}</p>";
        $emailBody .= "<p><strong>Phone:</strong> {$phone}</p>";
        if (!empty($email)) {
            $emailBody .= "<p><strong>Email:</strong> {$email}</p>";
        }
        if (!empty($message)) {
            $emailBody .= "<p><strong>Message:</strong> {$message}</p>";
        }
        
        $mail->Body    = $emailBody;
        $mail->AltBody = strip_tags($emailBody);

        $mail->send();
        echo json_encode(["status" => "success", "message" => "Thank you! We have received your details and will contact you shortly."]);
    } catch (Exception $e) {
        // If email fails but DB succeeded, we still report success
        echo json_encode(["status" => "success", "message" => "Thank you! Your details have been saved in our system."]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request method."]);
}
?>
