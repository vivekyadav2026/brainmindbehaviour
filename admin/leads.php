<?php
// admin/leads.php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: index.php");
    exit;
}
require_once '../includes/db.php';

// Handle Action Updates (POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && isset($_POST['lead_id'])) {
    $lead_id = (int)$_POST['lead_id'];
    $action = $_POST['action'];
    
    if ($action === 'delete') {
        $stmt = $pdo->prepare("DELETE FROM popup_leads WHERE id = ?");
        $stmt->execute([$lead_id]);
    }
    header("Location: leads.php");
    exit;
}

// Search Setup
$searchQuery = $_GET['search'] ?? '';
$sql = "SELECT * FROM popup_leads WHERE 1=1";
$params = [];

if (!empty($searchQuery)) {
    $sql .= " AND (name LIKE ? OR phone LIKE ? OR email LIKE ? OR message LIKE ?)";
    $searchWildcard = "%$searchQuery%";
    $params[] = $searchWildcard;
    $params[] = $searchWildcard;
    $params[] = $searchWildcard;
    $params[] = $searchWildcard;
}

// Count total records matching search filters
$count_sql = "SELECT COUNT(*) FROM popup_leads WHERE 1=1";
if (!empty($searchQuery)) {
    $count_sql .= " AND (name LIKE ? OR phone LIKE ? OR email LIKE ? OR message LIKE ?)";
    $count_stmt = $pdo->prepare($count_sql);
    $count_stmt->execute([$searchWildcard, $searchWildcard, $searchWildcard, $searchWildcard]);
} else {
    $count_stmt = $pdo->query($count_sql);
}
$total_count = $count_stmt->fetchColumn();

// Pagination Parameters
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($page < 1) $page = 1;
$limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 10;
$total_pages = ceil($total_count / $limit);
if ($total_pages < 1) $total_pages = 1;
if ($page > $total_pages) $page = $total_pages;
$offset = ($page - 1) * $limit;

$sql .= " ORDER BY created_at DESC LIMIT $limit OFFSET $offset";
$stmt = $pdo->prepare($sql);
$stmt->execute($params);
$leads = $stmt->fetchAll();

// Build query parameter string for pagination links
$queryParams = '';
if (!empty($searchQuery)) $queryParams .= '&search=' . urlencode($searchQuery);
if ($limit != 10) $queryParams .= '&limit=' . $limit;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Popup Leads Manager - Brain Mind Behaviour</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="admin.css" rel="stylesheet">
</head>
<body>
    <div class="d-flex flex-column flex-lg-row">
        <!-- Sidebar Navigation -->
        <?php include_once 'sidebar.php'; ?>
        
        <!-- Main Content -->
        <div class="content-wrapper flex-grow-1 p-3 p-md-4 bg-light overflow-hidden" style="min-height: 100vh;">
            
            <div class="mb-4">
                <h2 class="fw-bold text-dark mb-1">Popup Lead Captures</h2>
                <p class="text-muted small">Tracking leads collected from the website's auto-popup callbacks form.</p>
            </div>
            
            <!-- Search Bar -->
            <div class="card border-0 shadow-sm rounded-3 p-3 mb-4 bg-white">
                <form method="GET" action="" class="row g-2">
                    <div class="col-sm-9 col-md-10">
                        <div class="input-group input-group-sm mb-0">
                            <span class="input-group-text bg-light text-muted border-end-0"><i class="fas fa-search"></i></span>
                            <input type="text" name="search" class="form-control bg-light border-start-0" placeholder="Search by name, phone, email, query..." value="<?php echo htmlspecialchars($searchQuery); ?>">
                        </div>
                    </div>
                    <div class="col-sm-3 col-md-2 d-grid">
                        <button type="submit" class="btn btn-sm btn-primary rounded-3 fw-bold">Search</button>
                    </div>
                </form>
            </div>

            <!-- Table Card -->
            <div class="card table-card p-4 bg-white shadow-sm">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Lead ID</th>
                                <th>Name</th>
                                <th>Contact details</th>
                                <th>Message / Inquiry Details</th>
                                <th>Recieved Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (count($leads) > 0): ?>
                                <?php foreach ($leads as $lead): ?>
                                <tr>
                                    <td class="fw-bold text-muted">#<?php echo $lead['id']; ?></td>
                                    <td class="fw-bold text-dark"><?php echo htmlspecialchars($lead['name']); ?></td>
                                    <td>
                                        <div class="text-dark"><i class="fas fa-phone-alt me-1 text-muted small"></i><?php echo htmlspecialchars($lead['phone']); ?></div>
                                        <?php if (!empty($lead['email'])): ?>
                                            <div class="small text-muted"><i class="fas fa-envelope me-1 text-muted small"></i><?php echo htmlspecialchars($lead['email']); ?></div>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <div class="small text-muted text-wrap" style="max-width: 300px;">
                                            <?php echo !empty($lead['message']) ? htmlspecialchars($lead['message']) : '<i>No query submitted (Request Callback)</i>'; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="small fw-semibold"><?php echo date('Y-m-d', strtotime($lead['created_at'])); ?></div>
                                        <small class="text-muted"><?php echo date('h:i A', strtotime($lead['created_at'])); ?></small>
                                    </td>
                                    <td>
                                        <!-- WhatsApp direct chat -->
                                        <a href="https://wa.me/<?php echo preg_replace('/[^0-9]/', '', $lead['phone']); ?>" target="_blank" class="btn btn-sm btn-success rounded-pill px-3 py-1 me-1 fw-semibold text-white" style="font-size:12px;">
                                            <i class="fab fa-whatsapp me-1"></i>Chat
                                        </a>
                                        <!-- Delete action -->
                                        <form method="POST" onsubmit="return confirm('Are you sure you want to permanently delete this lead?');" style="display:inline;">
                                            <input type="hidden" name="lead_id" value="<?php echo $lead['id']; ?>">
                                            <input type="hidden" name="action" value="delete">
                                            <button type="submit" class="btn btn-sm btn-outline-danger rounded-pill px-3 py-1 fw-semibold" style="font-size:12px;">
                                                <i class="fas fa-trash me-1"></i>Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="6" class="text-center py-4 text-muted">No popup leads found.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                
                <!-- Premium Pagination Controls -->
                <?php if ($total_pages > 1): ?>
                <nav aria-label="Popup Leads Page Navigation" class="mt-4">
                    <div class="d-flex flex-column flex-sm-row justify-content-between align-items-center gap-3">
                        <div class="text-muted small">
                            Showing <strong><?php echo $offset + 1; ?></strong> to <strong><?php echo min($offset + $limit, $total_count); ?></strong> of <strong><?php echo $total_count; ?></strong> leads
                        </div>
                        <ul class="pagination pagination-sm mb-0">
                            <li class="page-item <?php echo $page <= 1 ? 'disabled' : ''; ?>">
                                <a class="page-link" href="?page=<?php echo $page - 1; ?><?php echo $queryParams; ?>" tabindex="-1">Previous</a>
                            </li>
                            
                            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                                <li class="page-item <?php echo $page == $i ? 'active' : ''; ?>">
                                    <a class="page-link" href="?page=<?php echo $i; ?><?php echo $queryParams; ?>"><?php echo $i; ?></a>
                                </li>
                            <?php endfor; ?>
                            
                            <li class="page-item <?php echo $page >= $total_pages ? 'disabled' : ''; ?>">
                                <a class="page-link" href="?page=<?php echo $page + 1; ?><?php echo $queryParams; ?>">Next</a>
                            </li>
                        </ul>
                    </div>
                </nav>
                <?php else: ?>
                <div class="mt-3 text-muted small">
                    Showing all <strong><?php echo $total_count; ?></strong> leads.
                </div>
                <?php endif; ?>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
