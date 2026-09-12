<?php
require_once __DIR__ . '/../includes/db.php';
$pdo->exec("DELETE FROM popup_leads WHERE name = 'Test Patient'");
echo "Test lead cleaned up successfully.\n";
?>
