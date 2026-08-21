<?php
// smtp_config.sample.php
// This is a template file. DO NOT put real passwords here!
// Rename this file to smtp_config.php on your server and enter your real credentials.

$SMTP_HOST = 'smtp.gmail.com';
$SMTP_USER = 'YOUR_EMAIL@gmail.com';
$SMTP_PASS = 'YOUR_APP_PASSWORD'; // Use a 16-digit App Password, not your real login password!
$SMTP_PORT = 465;

// The email address where you want to receive the alerts
$CLINIC_EMAIL = 'ranjeetsatapathy12@gmail.com';

// Payment & Contact configuration
$CLINIC_UPI_ID = 'YOUR_UPI_ID@okaxis';  // Replace with your clinic UPI ID for QR codes
$CLINIC_PHONE = '919160366716';         // Clinic WhatsApp number (with country code, no +)
?>
