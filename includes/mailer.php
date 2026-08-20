<?php
// includes/mailer.php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require_once __DIR__ . '/PHPMailer/Exception.php';
require_once __DIR__ . '/PHPMailer/PHPMailer.php';
require_once __DIR__ . '/PHPMailer/SMTP.php';

// Include the excluded credentials file safely
if (!file_exists(__DIR__ . '/../smtp_config.php')) {
    die(json_encode(["status" => "error", "message" => "Configuration error: smtp_config.php is missing. Please contact admin."]));
}
require_once __DIR__ . '/../smtp_config.php';

function getMailer() {
    global $SMTP_HOST, $SMTP_USER, $SMTP_PASS, $SMTP_PORT, $CLINIC_EMAIL;
    $mail = new PHPMailer(true);
    
    // Only configure SMTP if a real password is provided
    if ($SMTP_PASS !== 'YOUR_APP_PASSWORD_HERE' && !empty($SMTP_PASS)) {
        $mail->isSMTP();
        $mail->Host       = $SMTP_HOST;
        $mail->SMTPAuth   = true;
        $mail->Username   = $SMTP_USER;
        $mail->Password   = $SMTP_PASS;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = $SMTP_PORT;
    }
    
    $mail->setFrom('noreply@brainmindbehaviour.com', 'BMB Clinic Alerts');
    return $mail;
}
?>
