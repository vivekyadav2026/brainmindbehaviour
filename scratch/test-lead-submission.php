<?php
// scratch/test-lead-submission.php
require_once __DIR__ . '/../includes/db.php';

$_POST = [
    'name' => 'Test Patient',
    'phone' => '9876543210',
    'consultation_type' => 'Online Consultation',
    'location' => 'Online (Video Call)',
    'specialist' => 'Dr. Ramanand Satapathy (Psychiatrist)',
    'message' => 'Automated test booking'
];
$_SERVER['REQUEST_METHOD'] = 'POST';

ob_start();
include __DIR__ . '/../process-lead.php';
$response = ob_get_clean();

echo "Response from process-lead.php:\n" . $response . "\n\n";

$stmt = $pdo->query("SELECT * FROM popup_leads ORDER BY id DESC LIMIT 1");
$latest = $stmt->fetch();
echo "Latest inserted lead in DB:\n";
print_r($latest);
?>
