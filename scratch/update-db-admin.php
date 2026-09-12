<?php
// scratch/update-db-admin.php
require_once __DIR__ . '/../includes/db.php';

try {
    // 1. Create settings table
    $pdo->exec("CREATE TABLE IF NOT EXISTS settings (
        `key` VARCHAR(50) PRIMARY KEY,
        `value` TEXT NOT NULL
    )");
    echo "Table 'settings' verified/created.\n";

    // Seed default settings
    $defaultSettings = [
        'upi_id' => 'ranjeetsatapathy12@okaxis',
        'whatsapp_phone' => '919160366716',
        'clinic_email' => 'ranjeetsatapathy12@gmail.com',
        'consultation_fee' => '1000'
    ];

    $stmt = $pdo->prepare("INSERT INTO settings (`key`, `value`) VALUES (?, ?) ON DUPLICATE KEY UPDATE `key`=`key`");
    foreach ($defaultSettings as $key => $val) {
        $stmt->execute([$key, $val]);
    }
    echo "Default settings seeded.\n";

    // 2. Create contact_inquiries table
    $pdo->exec("CREATE TABLE IF NOT EXISTS contact_inquiries (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100) NOT NULL,
        email VARCHAR(100) NOT NULL,
        subject VARCHAR(150) NOT NULL,
        message TEXT NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )");
    echo "Table 'contact_inquiries' verified/created.\n";

    // 3. Create popup_leads table
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
    
    // Add columns if table already exists without them
    $columns = ['consultation_type', 'location', 'specialist'];
    foreach ($columns as $col) {
        try {
            $pdo->exec("ALTER TABLE popup_leads ADD COLUMN $col VARCHAR(100) NULL");
        } catch (PDOException $e) {
            // Column may already exist
        }
    }
    echo "Table 'popup_leads' verified/updated.\n";

} catch (PDOException $e) {
    echo "Migration failed: " . $e->getMessage() . "\n";
}
?>
