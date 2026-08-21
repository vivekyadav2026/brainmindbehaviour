<?php
$host = '127.0.0.1';
$db   = 'brainmindbehaviour';
$user = 'root';
$pass = ''; // Default XAMPP password is empty
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

// Fetch clinic configurations dynamically from database settings table
$CLINIC_UPI_ID = 'ranjeetsatapathy12@okaxis'; // Default fallbacks
$CLINIC_PHONE = '919160366716';
$CLINIC_EMAIL = 'ranjeetsatapathy12@gmail.com';
$CONSULTATION_FEE = 1000;

try {
    $stmt = $pdo->query("SELECT * FROM settings");
    while ($row = $stmt->fetch()) {
        if ($row['key'] === 'upi_id') $CLINIC_UPI_ID = $row['value'];
        if ($row['key'] === 'whatsapp_phone') $CLINIC_PHONE = $row['value'];
        if ($row['key'] === 'clinic_email') $CLINIC_EMAIL = $row['value'];
        if ($row['key'] === 'consultation_fee') $CONSULTATION_FEE = (int)$row['value'];
    }
} catch (\PDOException $e) {
    // Ignore if table settings does not exist yet
}
?>
