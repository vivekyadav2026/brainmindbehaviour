<?php
// admin/sidebar.php
$currentAdminPage = basename($_SERVER['PHP_SELF']);
?>
<!-- Mobile Header Bar -->
<nav class="navbar navbar-dark d-lg-none px-3 w-100 border-bottom" style="background-color: #0f172a; border-color: rgba(255,255,255,0.05) !important;">
  <button class="navbar-toggler border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <span class="navbar-brand mb-0 h1 fs-5 fw-bold text-white">Brain Mind Behaviour</span>
</nav>

<!-- Collapsible Sidebar menu -->
<div class="offcanvas-lg offcanvas-start text-white border-end-0 flex-shrink-0" id="sidebarMenu" style="width: 260px; min-height: 100vh;">
  <div class="offcanvas-header d-lg-none text-white border-bottom" style="background-color: #0f172a; border-color: rgba(255,255,255,0.05) !important;">
    <h5 class="offcanvas-title fw-bold" id="sidebarMenuLabel">Brain Mind Behaviour</h5>
  </div>
  
  <div class="offcanvas-body d-flex flex-column p-0 h-100 w-100">
    <div class="p-4 text-center d-none d-lg-block border-bottom" style="border-color: rgba(255,255,255,0.05) !important;">
        <h5 class="fw-bold mb-0 tracking-wide text-white" style="letter-spacing: 0.8px;">Brain Mind Behaviour</h5>
    </div>
    
    <div class="list-group list-group-flush w-100 flex-grow-1 py-3 px-2">
        <a href="dashboard.php" class="list-group-item list-group-item-action text-white rounded-3 border-0 bg-transparent py-3 px-4 mb-1 d-flex align-items-center <?php echo $currentAdminPage == 'dashboard.php' ? 'active-link' : ''; ?>">
            <i class="fas fa-tachometer-alt me-3 fs-5"></i> Dashboard
        </a>
        <a href="appointments.php" class="list-group-item list-group-item-action text-white rounded-3 border-0 bg-transparent py-3 px-4 mb-1 d-flex align-items-center <?php echo $currentAdminPage == 'appointments.php' ? 'active-link' : ''; ?>">
            <i class="fas fa-calendar-check me-3 fs-5"></i> Appointments
        </a>
        <a href="leads.php" class="list-group-item list-group-item-action text-white rounded-3 border-0 bg-transparent py-3 px-4 mb-1 d-flex align-items-center <?php echo $currentAdminPage == 'leads.php' ? 'active-link' : ''; ?>">
            <i class="fas fa-bullhorn me-3 fs-5"></i> Popup Leads
        </a>
        <a href="inquiries.php" class="list-group-item list-group-item-action text-white rounded-3 border-0 bg-transparent py-3 px-4 mb-1 d-flex align-items-center <?php echo $currentAdminPage == 'inquiries.php' ? 'active-link' : ''; ?>">
            <i class="fas fa-envelope-open-text me-3 fs-5"></i> Contact Log
        </a>
        <a href="settings.php" class="list-group-item list-group-item-action text-white rounded-3 border-0 bg-transparent py-3 px-4 mb-1 d-flex align-items-center <?php echo $currentAdminPage == 'settings.php' ? 'active-link' : ''; ?>">
            <i class="fas fa-sliders-h me-3 fs-5"></i> Settings
        </a>
        <a href="logout.php" class="list-group-item list-group-item-action text-white rounded-3 border-0 bg-transparent py-3 px-4 mt-4 d-flex align-items-center">
            <i class="fas fa-sign-out-alt me-3 fs-5 text-danger-light" style="color: #fca5a5 !important;"></i> Logout
        </a>
    </div>
  </div>
</div>
