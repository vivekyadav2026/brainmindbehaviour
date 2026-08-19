<?php
// includes/navbar.php
$currentPage = basename($_SERVER['PHP_SELF']);
?>
<header id="header" class="header fixed-top">
    <div class="topbar d-flex align-items-center dark-background">
      <div class="container d-flex justify-content-center justify-content-md-between">
        <div class="contact-info d-flex align-items-center">
          <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:contact@brainmindbehaviour.com">contact@brainmindbehaviour.com</a></i>
          <i class="bi bi-phone d-flex align-items-center ms-4"><span>+91 91603 66716</span></i>
        </div>
        <div class="social-links d-none d-md-flex align-items-center">
          <!-- We can add social links here if needed -->
        </div>
      </div>
    </div><!-- End Top Bar -->

    <div class="branding d-flex align-items-center">
      <div class="container position-relative d-flex align-items-center justify-content-between">
        <a href="index.php" class="logo d-flex align-items-center">
          <img src="assets/img/logo.png" alt="Brain Mind Behaviour Logo" style="max-height: 40px; margin-right: 10px;">
          <h1 class="sitename" style="font-size: 24px; margin: 0;">Brain Mind Behaviour</h1>
        </a>

        <nav id="navmenu" class="navmenu">
          <ul>
            <li><a href="index.php" class="<?php echo $currentPage == 'index.php' ? 'active' : ''; ?>">Home</a></li>
            <li><a href="about.php" class="<?php echo $currentPage == 'about.php' ? 'active' : ''; ?>">About</a></li>
            <li><a href="doctors.php" class="<?php echo $currentPage == 'doctors.php' ? 'active' : ''; ?>">Doctors</a></li>
            <li class="dropdown"><a href="services.php" class="<?php echo ($currentPage == 'services.php' || in_array($currentPage, ['psychiatry.php', 'neuropsychiatry.php', 'counselling.php', 'depression.php', 'anxiety.php', 'bipolar-disorder.php', 'schizophrenia.php', 'addiction.php', 'dementia.php'])) ? 'active' : ''; ?>"><span>Services</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
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
            <li><a href="knowledge-centre.php" class="<?php echo $currentPage == 'knowledge-centre.php' ? 'active' : ''; ?>">Knowledge Centre</a></li>
            <li><a href="contact.php" class="<?php echo $currentPage == 'contact.php' ? 'active' : ''; ?>">Contact</a></li>
          </ul>
          <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>
      </div>
    </div>
</header>
