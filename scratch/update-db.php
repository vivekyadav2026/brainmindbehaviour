<?php
// scratch/update-db.php
require_once __DIR__ . '/../includes/db.php';

try {
    // Add transaction_id column if not exists
    $stmt = $pdo->query("SHOW COLUMNS FROM appointments LIKE 'transaction_id'");
    if ($stmt->rowCount() == 0) {
        $pdo->exec("ALTER TABLE appointments ADD COLUMN transaction_id VARCHAR(100) NULL AFTER payment_status");
        echo "Column 'transaction_id' added successfully.\n";
    } else {
        echo "Column 'transaction_id' already exists.\n";
    }

    // Add screenshot_path column if not exists
    $stmt = $pdo->query("SHOW COLUMNS FROM appointments LIKE 'screenshot_path'");
    if ($stmt->rowCount() == 0) {
        $pdo->exec("ALTER TABLE appointments ADD COLUMN screenshot_path VARCHAR(255) NULL AFTER transaction_id");
        echo "Column 'screenshot_path' added successfully.\n";
    } else {
        echo "Column 'screenshot_path' already exists.\n";
    }

} catch (PDOException $e) {
    echo "Database migration failed: " . $e->getMessage() . "\n";
}
?>
