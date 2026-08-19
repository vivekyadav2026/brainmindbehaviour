<?php
$siteTitle = 'Our Doctors | Brain Mind Behaviour Neurosciences Research Institute';
$metaDescription = 'Meet the expert psychiatrists and psychologists at Brain Mind Behaviour Neurosciences Research Institute.';
$bodyClass = 'doctors-page';
include_once 'includes/header.php';
?>

  <main class="main">

    <!-- Page Title -->
    <div class="page-title">
      <div class="heading">
        <div class="container">
          <div class="row d-flex justify-content-center text-center">
            <div class="col-lg-8">
              <h1 class="heading-title">Clinical Specialists</h1>
              <p class="mb-0">
                Meet our distinguished team of psychiatrists and psychologists dedicated to your well-being.
              </p>
            </div>
          </div>
        </div>
      </div>
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="index.php">Home</a></li>
            <li class="current">Doctors</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Page Title -->

    <!-- Doctors Section -->
    <section id="doctors" class="doctors section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4 justify-content-center">

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="doctor-card">
              <div class="doctor-image">
                <img src="assets/img/doctor_ramanand.png" alt="Dr. Ramanand Satapathy" class="img-fluid" style="width: 100%; height: 400px; object-fit: cover; object-position: top;">
                <div class="doctor-overlay">
                  <div class="social-links">
                    <a href="#!"><i class="bi bi-linkedin"></i></a>
                    <a href="#!"><i class="bi bi-envelope"></i></a>
                    <a href="#!"><i class="bi bi-phone"></i></a>
                  </div>
                </div>
              </div>
              <div class="doctor-content">
                <h4>Dr. Ramanand Satapathy</h4>
                <span class="specialty">Medical Director & Chief Psychiatrist</span>
                <p>MBBS, MD (Psychiatry). Former Professor of Psychiatry and Superintendent of the Govt Hospital for Mental Care, Visakhapatnam.</p>
                <div class="doctor-meta">
                  <div class="experience">
                    <i class="bi bi-award"></i>
                    <span>30+ Years Experience</span>
                  </div>
                  <div class="department">
                    <i class="bi bi-building"></i>
                    <span>Psychiatry</span>
                  </div>
                </div>
                <a href="contact.php" class="btn-appointment">Book Appointment</a>
              </div>
            </div>
          </div><!-- End Doctor Card -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="doctor-card">
              <div class="doctor-image">
                <img src="assets/img/doctor_suprriya.png" alt="Dr. Suprriya Satapathy" class="img-fluid" style="width: 100%; height: 400px; object-fit: cover; object-position: top;">
                <div class="doctor-overlay">
                  <div class="social-links">
                    <a href="#!"><i class="bi bi-linkedin"></i></a>
                    <a href="#!"><i class="bi bi-envelope"></i></a>
                    <a href="#!"><i class="bi bi-phone"></i></a>
                  </div>
                </div>
              </div>
              <div class="doctor-content">
                <h4>Dr. Suprriya Satapathy</h4>
                <span class="specialty">Consultant Psychiatrist</span>
                <p>MBBS, MD (Psychiatry). Specializes in adult psychiatry, mood disorders, anxiety, and women's mental health issues.</p>
                <div class="doctor-meta">
                  <div class="experience">
                    <i class="bi bi-award"></i>
                    <span>Expert Care</span>
                  </div>
                  <div class="department">
                    <i class="bi bi-building"></i>
                    <span>Psychiatry</span>
                  </div>
                </div>
                <a href="contact.php" class="btn-appointment">Book Appointment</a>
              </div>
            </div>
          </div><!-- End Doctor Card -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="doctor-card">
              <div class="doctor-image">
                <img src="assets/img/mr_dev.png" alt="Mr. Dev Satapathy" class="img-fluid" style="width: 100%; height: 400px; object-fit: cover; object-position: top;">
                <div class="doctor-overlay">
                  <div class="social-links">
                    <a href="#!"><i class="bi bi-linkedin"></i></a>
                    <a href="#!"><i class="bi bi-envelope"></i></a>
                    <a href="#!"><i class="bi bi-phone"></i></a>
                  </div>
                </div>
              </div>
              <div class="doctor-content">
                <h4>Mr. Dev Satapathy</h4>
                <span class="specialty">Counselor</span>
                <p>M.Sc. Psychology. Specializes in psychometric assessments, CBT, and individual counseling.</p>
                <div class="doctor-meta">
                  <div class="experience">
                    <i class="bi bi-award"></i>
                    <span>Psychology</span>
                  </div>
                  <div class="department">
                    <i class="bi bi-building"></i>
                    <span>Psychology</span>
                  </div>
                </div>
                <a href="contact.php" class="btn-appointment">Book Appointment</a>
              </div>
            </div>
          </div><!-- End Doctor Card -->

        </div>

      </div>

    </section><!-- /Doctors Section -->

  </main>

<?php include_once 'includes/footer.php'; ?>
