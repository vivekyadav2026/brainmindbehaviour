<?php
// includes/navbar.php
$currentPage = basename($_SERVER['PHP_SELF']);
?>
<header id="header" class="header fixed-top">
    <!-- Topbar removed to match mockup design -->

    <div class="branding d-flex align-items-center py-2 bg-dark-deep border-bottom-glow">
      <div class="container-fluid px-lg-5 position-relative d-flex align-items-center justify-content-between">
        
        <!-- Logo and Title Group -->
        <a href="index.php" class="logo d-flex align-items-center text-decoration-none">
          <img src="assets/img/logo_transparent.png" alt="Brain Mind Behavior Clinic" style="max-height: 95px; width: auto;">
        </a>

        <nav id="navmenu" class="navmenu">
          <ul>
            <li><a href="index.php" class="<?php echo $currentPage == 'index.php' ? 'active' : ''; ?>">HOME</a></li>
            <li><a href="about.php" class="<?php echo $currentPage == 'about.php' ? 'active' : ''; ?>">ABOUT US</a></li>
            <li class="dropdown"><a href="services.php" class="<?php echo ($currentPage == 'services.php' || in_array($currentPage, ['psychiatry.php', 'neuropsychiatry.php', 'counselling.php', 'depression.php', 'anxiety.php', 'bipolar-disorder.php', 'schizophrenia.php', 'addiction.php', 'dementia.php'])) ? 'active' : ''; ?>"><span>SERVICES</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
              <ul>
                <li><a href="psychiatry.php">Psychiatry</a></li>
                <li><a href="neuropsychiatry.php">Neuropsychiatry</a></li>
                <li><a href="counselling.php">Psychological Counselling</a></li>
                <li><a href="depression.php">Depression</a></li>
                <li><a href="anxiety.php">Anxiety Disorders</a></li>
                <li><a href="bipolar-disorder.php">Bipolar Disorder</a></li>
                <li><a href="schizophrenia.php">Schizophrenia</a></li>
                <li><a href="addiction.php">Addiction & De-addiction</a></li>
                <li><a href="dementia.php">Dementia & Geriatric Psychiatry</a></li>
              </ul>
            </li>
            <li><a href="doctors.php" class="<?php echo $currentPage == 'doctors.php' ? 'active' : ''; ?>">OUR TEAM</a></li>
            <li><a href="knowledge-centre.php" class="<?php echo $currentPage == 'knowledge-centre.php' ? 'active' : ''; ?>">KNOWLEDGE CENTRE</a></li>
            <li><a href="contact.php" class="<?php echo $currentPage == 'contact.php' ? 'active' : ''; ?>">CONTACT</a></li>
          </ul>
          <i class="mobile-nav-toggle d-xl-none bi bi-list text-white fs-2"></i>
        </nav>

        <a href="onsite-consultation.php" class="btn-header-cta d-none d-xl-inline-flex align-items-center">
          <i class="far fa-calendar-check me-2"></i>BOOK APPOINTMENT
        </a>
      </div>
    </div>
</header>
