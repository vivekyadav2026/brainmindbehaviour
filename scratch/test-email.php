<?php
// scratch/test-email.php
// This is a test script to debug email sending issues.
// Open this in your browser: http://localhost/brainmindbehaviour/scratch/test-email.php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once '../includes/mailer.php';

echo "<h3>SMTP Email Tester</h3>";
echo "Loading configuration...<br/>";
echo "SMTP Host: " . $SMTP_HOST . "<br/>";
echo "SMTP User: " . $SMTP_USER . "<br/>";
echo "SMTP Pass: " . (empty($SMTP_PASS) || $SMTP_PASS === 'YOUR_APP_PASSWORD_HERE' ? '<span style="color:red;">NOT SET</span>' : '<span style="color:green;">SET</span>') . "<br/>";
echo "SMTP Port: " . $SMTP_PORT . "<br/>";
echo "Clinic Email: " . $CLINIC_EMAIL . "<br/><br/>";

if (empty($SMTP_PASS) || $SMTP_PASS === 'YOUR_APP_PASSWORD_HERE') {
    echo "<p style='color:red;'><strong>Warning:</strong> You have not set your real Gmail App Password in <code>smtp_config.php</code> yet! XAMPP cannot send emails without it.</p>";
}

echo "Attempting to send test email...<br/>";

try {
    $mail = getMailer();
    
    // Force SMTP debugging to see raw connection log
    $mail->SMTPDebug = 3; 
    $mail->Debugoutput = function($str, $level) {
        echo "<pre style='background:#f4f4f4; padding:5px; border:1px solid #ddd; font-size:11px;'>" . htmlspecialchars($str) . "</pre>";
    };

    $mail->addAddress($CLINIC_EMAIL);
    $mail->isHTML(true);
    $mail->Subject = "SMTP Test Email";
    $mail->Body    = "This is a test email to verify that your SMTP credentials in <code>smtp_config.php</code> are working correctly.";
    $mail->AltBody = "This is a test email to verify SMTP credentials.";

    if ($mail->send()) {
        echo "<p style='color:green; font-weight:bold;'>Success! Test email sent successfully to $CLINIC_EMAIL!</p>";
    }
} catch (Exception $e) {
    echo "<p style='color:red; font-weight:bold;'>Failed! Mailer Error: " . $mail->ErrorInfo . "</p>";
}
?>
