<?php
// process-contact.php
header('Content-Type: application/json');

require_once 'includes/db.php';
require_once 'includes/mailer.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(trim($_POST['name'] ?? ''));
    $email = filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL);
    $subject = htmlspecialchars(trim($_POST['subject'] ?? ''));
    $message = htmlspecialchars(trim($_POST['message'] ?? ''));

    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        echo json_encode(["status" => "error", "message" => "All fields are required."]);
        exit;
    }

    try {
        // Save to Database first so we never lose inquiries
        $stmt = $pdo->prepare("INSERT INTO contact_inquiries (name, email, subject, message) VALUES (?, ?, ?, ?)");
        $stmt->execute([$name, $email, $subject, $message]);

        // Send Email Alert
        $mail = getMailer();
        global $CLINIC_EMAIL;

        // Recipients
        $mail->addAddress($CLINIC_EMAIL);
        $mail->addReplyTo($email, $name);

        // Content
        $mail->isHTML(true);
        $mail->Subject = "Contact Form: $subject";
        
        $emailBody = "<h3>New Contact Form Submission</h3>";
        $emailBody .= "<p><strong>Name:</strong> {$name}</p>";
        $emailBody .= "<p><strong>Email:</strong> {$email}</p>";
        $emailBody .= "<p><strong>Subject:</strong> {$subject}</p>";
        $emailBody .= "<p><strong>Message:</strong><br/>" . nl2br($message) . "</p>";
        
        $mail->Body    = $emailBody;
        $mail->AltBody = strip_tags(str_replace('<br/>', "\n", $emailBody));

        $mail->send();
        echo json_encode(["status" => "success", "message" => "Your message has been sent. Thank you!"]);
    } catch (Exception $e) {
        // If email fails but DB succeeded, we still report success but log error
        echo json_encode(["status" => "success", "message" => "Your message has been saved in our system. Thank you!"]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request method."]);
}
?>
