<?php
$serviceName = 'Psychiatry';
$siteTitle = 'Psychiatry Services | Brain Mind Behaviour Neurosciences Research Institute';
$metaDescription = 'Professional psychiatric assessment and personalized medical care at Brain Mind Behaviour Neurosciences Research Institute, Visakhapatnam.';
$bodyClass = 'service-details-page';
include_once 'includes/header.php';
?>

  <main class="main">

    <!-- Page Title -->
    <div class="page-title">
      <div class="heading">
        <div class="container">
          <div class="row d-flex justify-content-center text-center">
            <div class="col-lg-8">
              <h1 class="heading-title"><?php echo htmlspecialchars($serviceName); ?></h1>
              <p class="mb-0">Professional psychiatric assessment, diagnosis, and medical care.</p>
            </div>
          </div>
        </div>
      </div>
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="index.php">Home</a></li>
            <li><a href="services.php">Services</a></li>
            <li class="current"><?php echo htmlspecialchars($serviceName); ?></li>
          </ol>
        </div>
      </nav>
    </div><!-- End Page Title -->

    <section class="section py-5">
      <div class="container">
        <div class="row g-5">
          
          <!-- Left Content Column -->
          <div class="col-lg-8" data-aos="fade-up" data-aos-delay="100">
            <div class="service-details-content">
              <h2 class="mb-4 fw-bold">Comprehensive Psychiatric Care</h2>
              <p class="lead text-muted mb-4">
                We combine biological and medical diagnostic frameworks with deeply compassionate care to manage complex mental health conditions.
              </p>
              <p class="mb-4">
                Psychiatry is a specialized medical discipline focused on the diagnosis, treatment, and prevention of mental, emotional, and behavioral disorders. Our approach is strictly evidence-based, focusing on identifying the underlying neurochemical, genetic, and environmental factors contributing to a patient's condition.
              </p>
              
              <h3 class="mt-5 mb-3 fw-semibold">Core Clinical Focus Areas</h3>
              <div class="row mb-4">
                <div class="col-md-6 mb-3">
                  <div class="d-flex align-items-start gap-2">
                    <i class="bi bi-patch-check text-primary fs-5"></i>
                    <div>
                      <h5 class="mb-1 fw-bold">Mood Disorders</h5>
                      <p class="text-muted small">Specialized diagnosis and long-term care plans for Clinical Depression and Bipolar Disorder.</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 mb-3">
                  <div class="d-flex align-items-start gap-2">
                    <i class="bi bi-patch-check text-primary fs-5"></i>
                    <div>
                      <h5 class="mb-1 fw-bold">Anxiety & Panic</h5>
                      <p class="text-muted small">Medical management of generalized anxiety, panic attacks, OCD, and phobias.</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 mb-3">
                  <div class="d-flex align-items-start gap-2">
                    <i class="bi bi-patch-check text-primary fs-5"></i>
                    <div>
                      <h5 class="mb-1 fw-bold">Psychotic Disorders</h5>
                      <p class="text-muted small">Comprehensive pharmacological management and rehabilitation for Schizophrenia.</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 mb-3">
                  <div class="d-flex align-items-start gap-2">
                    <i class="bi bi-patch-check text-primary fs-5"></i>
                    <div>
                      <h5 class="mb-1 fw-bold">Geriatric Psychiatry</h5>
                      <p class="text-muted small">Specialized evaluations for late-life depression, sleep issues, and memory-linked anxiety.</p>
                    </div>
                  </div>
                </div>
              </div>

              <div class="bg-light p-4 rounded-3 border-start border-4 border-primary mb-4">
                <h4 class="fw-bold mb-2">Our Treatment Approach</h4>
                <p class="mb-0 text-muted">
                  We formulate customized treatment strategies that typically combine targeted pharmacotherapy (medication management) with psychological support, lifestyle adjustments, and regular progress monitoring in a completely confidential clinical environment.
                </p>
              </div>
            </div>
          </div>

          <!-- Right Sidebar Column -->
          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
            <div class="sticky-sidebar">
              
              <!-- Quick Booking Card -->
              <div class="card border-0 shadow-sm rounded-3 p-4 mb-4" style="background: var(--surface-color); border: 1px solid color-mix(in srgb, var(--default-color), transparent 95%) !important;">
                <h4 class="fw-bold mb-3">Book Appointment</h4>
                <p class="text-muted small mb-4">Schedule an onsite visit or secure online consultation with our specialists.</p>
                <div class="d-grid gap-3">
                  <a href="onsite-consultation.php" class="btn btn-primary justify-content-center">Book Onsite Visit</a>
                  <a href="online-consultation.php" class="btn btn-outline justify-content-center">Online Video Consultation</a>
                </div>
              </div>

              <!-- Specialized Doctors Card -->
              <div class="card border-0 shadow-sm rounded-3 p-4" style="background: var(--surface-color); border: 1px solid color-mix(in srgb, var(--default-color), transparent 95%) !important;">
                <h4 class="fw-bold mb-3">Specialists</h4>
                <hr class="my-2 text-muted opacity-25">
                
                <div class="d-flex align-items-center gap-3 my-3">
                  <img src="assets/img/doctor_ramanand.png" alt="Dr. Ramanand Satapathy" class="rounded-circle" style="width: 50px; height: 50px; object-fit: cover;">
                  <div>
                    <h6 class="mb-0 fw-bold">Dr. Ramanand Satapathy</h6>
                    <span class="text-muted small">MD Psychiatry & Neuropsychiatrist</span>
                  </div>
                </div>

                <div class="d-flex align-items-center gap-3 my-3">
                  <img src="assets/img/doctor_suprriya.png" alt="Dr. Suprriya Satapathy" class="rounded-circle" style="width: 50px; height: 50px; object-fit: cover;">
                  <div>
                    <h6 class="mb-0 fw-bold">Dr. Suprriya Satapathy</h6>
                    <span class="text-muted small">MD Psychiatry</span>
                  </div>
                </div>

              </div>

            </div>
          </div>

        </div>
      </div>
    </section>

  </main>

<?php include_once 'includes/footer.php'; ?>
