<?php
$siteTitle = 'About Us | Brain Mind Behaviour Neurosciences Research Institute';
$metaDescription = 'Learn about our philosophy, clinical specialists, vision, and mission at Brain Mind Behaviour Neurosciences Research Institute in Visakhapatnam.';
$bodyClass = 'about-page';
include_once 'includes/header.php';
?>

  <main class="main">

    <!-- Page Title -->
    <div class="page-title">
      <div class="heading">
        <div class="container">
          <div class="row d-flex justify-content-center text-center">
            <div class="col-lg-8">
              <h1 class="heading-title">About The Institute</h1>
              <p class="mb-0">
                Dedicated to advancing mental healthcare through clinical excellence, compassion, and innovation in Visakhapatnam.
              </p>
            </div>
          </div>
        </div>
      </div>
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="index.php">Home</a></li>
            <li class="current">About Us</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Page Title -->

    <!-- About Section -->
    <section id="about" class="about section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <!-- Intro Block: Editorial Split-Column Layout -->
        <div class="row g-5 align-items-start mb-5">
          <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
            <div class="about-hero-text">
              <span class="sub-label">OUR PHILOSOPHY</span>
              <h2 class="mt-2 mb-4">Redefining mental healthcare through evidence-based <span class="text-highlight">clinical excellence</span>.</h2>
              <img src="assets/img/consultation_room.png" class="img-fluid rounded-4 shadow-sm mt-3" alt="Consultation Room" style="width: 100%; object-fit: cover; aspect-ratio: 16/10;">
            </div>
          </div>
          
          <div class="col-lg-6" data-aos="fade-left" data-aos-delay="200">
            <div class="about-content-body ps-lg-4">
              <p class="lead mb-4">At Brain Mind Behaviour Neurosciences Research Institute, we believe that mental health is the foundation of a fulfilling life. Founded with a vision to provide world-class psychiatric and psychological care in Visakhapatnam, our institute brings together decades of clinical experience and cutting-edge medical knowledge.</p>
              
              <p class="mb-4">Mental health challenges are deeply personal and uniquely complex. Our approach is fundamentally patient-centric. We do not just treat symptoms; we strive to understand the entire individual — their biology, psychology, and social environment.</p>
              
              <p class="mb-4">Whether dealing with severe neuropsychiatric conditions, mood disorders, or seeking psychological counseling for life's challenges, our team ensures complete confidentiality, respect, and the highest standard of medical ethics.</p>

              <div class="mt-4 pt-2">
                <a href="contact.php" class="btn btn-primary btn-lg rounded-pill px-4 shadow-sm">
                  <span>Book a Consultation</span>
                  <i class="bi bi-arrow-right ms-2"></i>
                </a>
              </div>
            </div>
          </div>
        </div>

        <!-- Premium Immersive Stats Bar -->
        <div class="stats-banner-wrapper my-5 py-4 px-4 px-md-5 rounded-4 shadow-sm" data-aos="fade-up" data-aos-delay="200">
          <div class="row text-center text-md-start gy-4 justify-content-between align-items-center">
            <div class="col-md-3">
              <div class="stat-banner-item">
                <h3 class="stat-number mb-1"><span data-purecounter-start="0" data-purecounter-end="35" data-purecounter-duration="2" class="purecounter"></span>+</h3>
                <p class="stat-label mb-0">Years of Experience</p>
              </div>
            </div>
            <div class="col-md-1 d-none d-md-block text-center text-muted">
              <div class="vertical-divider"></div>
            </div>
            <div class="col-md-3">
              <div class="stat-banner-item">
                <h3 class="stat-number mb-1"><span data-purecounter-start="0" data-purecounter-end="10" data-purecounter-duration="2" class="purecounter"></span>k+</h3>
                <p class="stat-label mb-0">Patients Helped</p>
              </div>
            </div>
            <div class="col-md-1 d-none d-md-block text-center text-muted">
              <div class="vertical-divider"></div>
            </div>
            <div class="col-md-3">
              <div class="stat-banner-item">
                <h3 class="stat-number mb-1">100%</h3>
                <p class="stat-label mb-0">Confidential Care</p>
              </div>
            </div>
          </div>
        </div>

        <!-- Vision, Mission & Excellence: Elegant Card Grid -->
        <div class="values-section mt-5" data-aos="fade-up" data-aos-delay="300">
          <div class="row mb-5">
            <div class="col-lg-8 mx-auto text-center">
              <h3>Core Pillars of the Institute</h3>
              <p class="section-description">Guiding principles that drive our commitment to medical excellence</p>
            </div>
          </div>

          <div class="row g-4 justify-content-center">
            <!-- Pillar 1: Clinical Excellence -->
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
              <div class="pillar-card h-100">
                <div class="pillar-icon">
                  <i class="fas fa-brain"></i>
                </div>
                <h4>Clinical Excellence</h4>
                <p>Integrating the latest neuropsychiatric research, biological assessments, and modern psychotherapy to deliver international standards of healthcare.</p>
              </div>
            </div>

            <!-- Pillar 2: Vision -->
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
              <div class="pillar-card h-100">
                <div class="pillar-icon">
                  <i class="fas fa-eye"></i>
                </div>
                <h4>Our Vision</h4>
                <p>To be the premier center for neuroscience and mental health research and clinical care in the region, destigmatizing mental illness and promoting holistic well-being.</p>
              </div>
            </div>

            <!-- Pillar 3: Mission -->
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
              <div class="pillar-card h-100">
                <div class="pillar-icon">
                  <i class="fas fa-bullseye"></i>
                </div>
                <h4>Our Mission</h4>
                <p>To provide evidence-based, compassionate, and personalized psychiatric and psychological care, integrating the latest advancements in neurosciences to improve lives.</p>
              </div>
            </div>

          </div><!-- End Cards Row -->
        </div><!-- End Values Section -->

      </div>

    </section><!-- /About Section -->

  </main>

<?php include_once 'includes/footer.php'; ?>
