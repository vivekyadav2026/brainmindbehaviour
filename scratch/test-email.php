<?php
// scratch/test-email.php
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/mailer.php';

try {
    $mail = getMailer();
    // Enable verbose debug output
    $mail->SMTPDebug = 3; 
    $mail->Debugoutput = 'echo';

    // Add recipient
    $mail->addAddress($CLINIC_EMAIL);
    $mail->Subject = "SMTP Test Connection Check";
    $mail->Body    = "This is a test email to verify SMTP configuration on local XAMPP.";
    
    echo "Initiating SMTP Connection...\n";
    if ($mail->send()) {
        echo "\nSUCCESS: Email sent successfully!\n";
    } else {
        echo "\nFAIL: Email failed to send.\n";
    }
} catch (Exception $e) {
    echo "\nEXCEPTION ERROR: " . $e->getMessage() . "\n";
    echo "Mailer Error Info: " . $mail->ErrorInfo . "\n";
}
?>
