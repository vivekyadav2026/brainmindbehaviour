<?php
$siteTitle = 'About Us | Brain Mind Behaviour Neurosciences Research Institute';
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

        <div class="row align-items-center">
          <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
            <div class="about-content">
              <h2>Our Philosophy</h2>
              <p class="lead">At Brain Mind Behaviour Neurosciences Research Institute, we believe that mental health is the foundation of a fulfilling life. Founded with a vision to provide world-class psychiatric and psychological care in Visakhapatnam, our institute brings together decades of clinical experience and cutting-edge medical knowledge.</p>

              <p>Mental health challenges are deeply personal and uniquely complex. Our approach is fundamentally patient-centric. We do not just treat symptoms; we strive to understand the entire individual — their biology, psychology, and social environment.</p>

              <p>Whether dealing with severe neuropsychiatric conditions, mood disorders, or seeking psychological counseling for life's challenges, our team ensures complete confidentiality, respect, and the highest standard of medical ethics.</p>

              <div class="stats-grid">
                <div class="stat-item">
                  <span class="stat-number" data-purecounter-start="0" data-purecounter-end="10000"
                    data-purecounter-duration="2">10000</span>
                  <span class="stat-label">Lives Touched</span>
                </div>
                <div class="stat-item">
                  <span class="stat-number" data-purecounter-start="0" data-purecounter-end="35"
                    data-purecounter-duration="2">35</span>
                  <span class="stat-label">Years Experience</span>
                </div>
                <div class="stat-item">
                  <span class="stat-number" data-purecounter-start="0" data-purecounter-end="3"
                    data-purecounter-duration="2">3</span>
                  <span class="stat-label">Clinical Specialists</span>
                </div>
              </div><!-- End Stats Grid -->
            </div><!-- End About Content -->
          </div>

          <div class="col-lg-6" data-aos="fade-left" data-aos-delay="200">
            <div class="image-wrapper" style="border-radius: 2rem;">
              <img src="assets/img/consultation_room.png" class="img-fluid main-image" alt="Consultation Room">
              <div class="floating-image" data-aos="zoom-in" data-aos-delay="400">
                <img src="assets/img/clinic_exterior.jpg" class="img-fluid" alt="Clinic Exterior">
              </div>
            </div><!-- End Image Wrapper -->
          </div>
        </div>

        <div class="values-section" data-aos="fade-up" data-aos-delay="300">
          <div class="row">
            <div class="col-lg-12 text-center">
              <h3>Vision & Mission</h3>
              <p class="section-description">Guiding principles that drive our commitment to excellence</p>
            </div>
          </div>

          <div class="row justify-content-center">
            <!-- Vision -->
            <div class="col-lg-6 col-md-6" data-aos="fade-up" data-aos-delay="100">
              <div class="value-item" style="height: 100%;">
                <div class="value-icon">
                  <i class="bi bi-eye"></i>
                </div>
                <h4>Our Vision</h4>
                <p>To be the premier center for neuroscience and mental health research and clinical care in the region, destigmatizing mental illness and promoting holistic well-being for all individuals.</p>
              </div>
            </div>

            <!-- Mission -->
            <div class="col-lg-6 col-md-6" data-aos="fade-up" data-aos-delay="200">
              <div class="value-item" style="height: 100%;">
                <div class="value-icon">
                  <i class="bi bi-bullseye"></i>
                </div>
                <h4>Our Mission</h4>
                <p>To provide evidence-based, compassionate, and personalized psychiatric and psychological care, integrating the latest advancements in neurosciences to significantly improve the quality of life of our patients.</p>
              </div>
            </div>

          </div><!-- End Values Row -->
        </div><!-- End Values Section -->

      </div>

    </section><!-- /About Section -->

  </main>

<?php include_once 'includes/footer.php'; ?>
