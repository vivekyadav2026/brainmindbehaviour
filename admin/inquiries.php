<?php
// admin/inquiries.php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: index.php");
    exit;
}
require_once '../includes/db.php';

// Handle Action Updates (POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && isset($_POST['inquiry_id'])) {
    $inquiry_id = (int)$_POST['inquiry_id'];
    $action = $_POST['action'];
    
    if ($action === 'delete') {
        $stmt = $pdo->prepare("DELETE FROM contact_inquiries WHERE id = ?");
        $stmt->execute([$inquiry_id]);
    }
    header("Location: inquiries.php");
    exit;
}

// Search Setup
$searchQuery = $_GET['search'] ?? '';
$sql = "SELECT * FROM contact_inquiries WHERE 1=1";
$params = [];

if (!empty($searchQuery)) {
    $sql .= " AND (name LIKE ? OR email LIKE ? OR subject LIKE ? OR message LIKE ?)";
    $searchWildcard = "%$searchQuery%";
    $params[] = $searchWildcard;
    $params[] = $searchWildcard;
    $params[] = $searchWildcard;
    $params[] = $searchWildcard;
}

// Count total records matching search filters
$count_sql = "SELECT COUNT(*) FROM contact_inquiries WHERE 1=1";
if (!empty($searchQuery)) {
    $count_sql .= " AND (name LIKE ? OR email LIKE ? OR subject LIKE ? OR message LIKE ?)";
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
$inquiries = $stmt->fetchAll();

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
    <title>Contact Log - Brain Mind Behaviour</title>
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
                <h2 class="fw-bold text-dark mb-1">Contact Messages Log</h2>
                <p class="text-muted small">Viewing logs of contact forms submitted by patients from the Contact Us page.</p>
            </div>
            
            <!-- Search Bar -->
            <div class="card border-0 shadow-sm rounded-3 p-3 mb-4 bg-white">
                <form method="GET" action="" class="row g-2">
                    <div class="col-sm-9 col-md-10">
                        <div class="input-group input-group-sm mb-0">
                            <span class="input-group-text bg-light text-muted border-end-0"><i class="fas fa-search"></i></span>
                            <input type="text" name="search" class="form-control bg-light border-start-0" placeholder="Search by name, email, subject, content..." value="<?php echo htmlspecialchars($searchQuery); ?>">
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
                                <th>Log ID</th>
                                <th>Name & Email</th>
                                <th>Subject</th>
                                <th>Message Snippet</th>
                                <th>Received Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (count($inquiries) > 0): ?>
                                <?php foreach ($inquiries as $inq): ?>
                                <tr>
                                    <td class="fw-bold text-muted">#<?php echo $inq['id']; ?></td>
                                    <td>
                                        <div class="fw-bold text-dark"><?php echo htmlspecialchars($inq['name']); ?></div>
                                        <small class="text-muted"><a href="mailto:<?php echo htmlspecialchars($inq['email']); ?>" class="text-decoration-none text-muted"><i class="far fa-envelope me-1"></i><?php echo htmlspecialchars($inq['email']); ?></a></small>
                                    </td>
                                    <td><span class="fw-semibold text-dark"><?php echo htmlspecialchars($inq['subject']); ?></span></td>
                                    <td>
                                        <!-- Clickable message trigger modal -->
                                        <div class="msg-text small text-muted" data-bs-toggle="modal" data-bs-target="#viewMessageModal" data-name="<?php echo htmlspecialchars($inq['name']); ?>" data-subject="<?php echo htmlspecialchars($inq['subject']); ?>" data-msg="<?php echo htmlspecialchars($inq['message']); ?>" data-date="<?php echo date('Y-m-d h:i A', strtotime($inq['created_at'])); ?>">
                                            <?php echo htmlspecialchars($inq['message']); ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="small fw-semibold"><?php echo date('Y-m-d', strtotime($inq['created_at'])); ?></div>
                                        <small class="text-muted"><?php echo date('h:i A', strtotime($inq['created_at'])); ?></small>
                                    </td>
                                    <td>
                                        <!-- Open full message modal button -->
                                        <button type="button" class="btn btn-sm btn-outline-primary rounded-pill px-3 py-1 me-1 fw-semibold" style="font-size:12px;" data-bs-toggle="modal" data-bs-target="#viewMessageModal" data-name="<?php echo htmlspecialchars($inq['name']); ?>" data-subject="<?php echo htmlspecialchars($inq['subject']); ?>" data-msg="<?php echo htmlspecialchars($inq['message']); ?>" data-date="<?php echo date('Y-m-d h:i A', strtotime($inq['created_at'])); ?>">
                                            <i class="far fa-eye me-1"></i>Read
                                        </button>
                                        <!-- Delete action -->
                                        <form method="POST" onsubmit="return confirm('Are you sure you want to permanently delete this message log?');" style="display:inline;">
                                            <input type="hidden" name="inquiry_id" value="<?php echo $inq['id']; ?>">
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
                                    <td colspan="6" class="text-center py-4 text-muted">No contact messages found.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                
                <!-- Premium Pagination Controls -->
                <?php if ($total_pages > 1): ?>
                <nav aria-label="Inquiries Page Navigation" class="mt-4">
                    <div class="d-flex flex-column flex-sm-row justify-content-between align-items-center gap-3">
                        <div class="text-muted small">
                            Showing <strong><?php echo $offset + 1; ?></strong> to <strong><?php echo min($offset + $limit, $total_count); ?></strong> of <strong><?php echo $total_count; ?></strong> messages
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
                    Showing all <strong><?php echo $total_count; ?></strong> messages.
                </div>
                <?php endif; ?>
            </div>

        </div>
    </div>

    <!-- View Message Modal -->
    <div class="modal fade" id="viewMessageModal" tabindex="-1" aria-labelledby="viewMessageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow">
                <div class="modal-header bg-light">
                    <h5 class="modal-title fw-bold text-dark" id="viewMessageModalLabel">Read Contact Message</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-dark">
                    <div class="mb-3 border-bottom pb-2">
                        <div class="small text-muted fw-bold mb-1">From Patient:</div>
                        <h6 class="fw-bold mb-1" id="msg_modal_name"></h6>
                        <small class="text-muted" id="msg_modal_date"></small>
                    </div>
                    <div class="mb-3 border-bottom pb-2">
                        <div class="small text-muted fw-bold mb-1">Subject:</div>
                        <h6 class="fw-bold mb-0 text-primary" id="msg_modal_subject"></h6>
                    </div>
                    <div class="mb-0">
                        <div class="small text-muted fw-bold mb-2">Message Body:</div>
                        <p class="small bg-light p-3 rounded text-muted" style="white-space: pre-wrap; line-height: 1.6;" id="msg_modal_body"></p>
                    </div>
                </div>
                <div class="modal-footer border-top-0">
                    <button type="button" class="btn btn-sm btn-secondary rounded-pill px-4" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Modal Data Binder
        var viewMessageModal = document.getElementById('viewMessageModal');
        viewMessageModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var name = button.getAttribute('data-name');
            var subject = button.getAttribute('data-subject');
            var msg = button.getAttribute('data-msg');
            var date = button.getAttribute('data-date');
            
            document.getElementById('msg_modal_name').textContent = name;
            document.getElementById('msg_modal_subject').textContent = subject;
            document.getElementById('msg_modal_body').textContent = msg;
            document.getElementById('msg_modal_date').textContent = date;
        });
    </script>
</body>
</html>
