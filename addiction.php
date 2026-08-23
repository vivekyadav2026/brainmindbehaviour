<?php
$serviceName = 'Addiction & De-addiction';
$siteTitle = 'Addiction & De-addiction Services | Brain Mind Behaviour Neurosciences Research Institute';
$metaDescription = 'Outpatient medical detox, Gaming and Gambling de-addiction treatment, and de-addiction programs at Brain Mind Behaviour, Visakhapatnam.';
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
              <p class="mb-0">Outpatient medical detoxification, Gaming & Gambling de-addiction, and treatment programs.</p>
            </div>
          </div>
        </div>
      </div>
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="index.php">Home</a></li>
            <li><a href="services.php">Services</a></li>
            <li class="current">Addiction Care</li>
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
              <img src="assets/img/indian_counselling.jpg" alt="<?php echo htmlspecialchars($serviceName); ?>" class="img-fluid rounded-4 mb-4 shadow-sm" style="width: 100%; object-fit: cover; aspect-ratio: 16/9;">

              <h2 class="mb-4 fw-bold">Structured De-addiction & Recovery</h2>
              <p class="lead text-muted mb-4">
                Compassionate medical detoxification and psychological treatment programs designed to support long-term recovery.
              </p>
              <p class="mb-4">
                Addiction is a chronic, relapsing brain disorder characterized by compulsive seeking and use of substances or engagement in behaviors despite harmful consequences. Recovery requires a dual approach: clinical medical detoxification to manage withdrawal symptoms safely, followed by structured de-addiction treatment programs to address behavioral and psychological dependence.
              </p>
              
              <h3 class="mt-5 mb-3 fw-semibold">Clinical Services Provided</h3>
              <div class="row mb-4">
                <div class="col-md-6 mb-3">
                  <div class="d-flex align-items-start gap-2">
                    <i class="bi bi-patch-check text-primary fs-5"></i>
                    <div>
                      <h5 class="mb-1 fw-bold">Detoxification (Detox)</h5>
                      <p class="text-muted small">Safe, medically supervised detoxification protocols and withdrawal management for substance dependence.</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 mb-3">
                  <div class="d-flex align-items-start gap-2">
                    <i class="bi bi-patch-check text-primary fs-5"></i>
                    <div>
                      <h5 class="mb-1 fw-bold">Gaming & Gambling Addictions</h5>
                      <p class="text-muted small">Specialized cognitive-behavioral therapies (CBT) and counseling targeting screen time, online gaming, and compulsive gambling.</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 mb-3">
                  <div class="d-flex align-items-start gap-2">
                    <i class="bi bi-patch-check text-primary fs-5"></i>
                    <div>
                      <h5 class="mb-1 fw-bold">Alcohol & Substance De-addiction</h5>
                      <p class="text-muted small">Anti-craving medication management, supportive counseling, and relapse prevention training.</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 mb-3">
                  <div class="d-flex align-items-start gap-2">
                    <i class="bi bi-patch-check text-primary fs-5"></i>
                    <div>
                      <h5 class="mb-1 fw-bold">De-addiction Treatment Programs</h5>
                      <p class="text-muted small">Comprehensive behavioral therapies to build long-term coping mechanisms and emotional resilience.</p>
                    </div>
                  </div>
                </div>
              </div>

              <div class="bg-light p-4 rounded-3 border-start border-4 border-primary mb-4">
                <h4 class="fw-bold mb-2">Outpatient De-addiction Treatment Programs</h4>
                <p class="mb-0 text-muted">
                  We specialize in structured outpatient programs, allowing patients to undergo medical detoxification and psychotherapy while maintaining their family and professional commitments in absolute confidentiality.
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

                <div class="d-flex align-items-center gap-3 my-3">
                  <img src="assets/img/mr_dev.png" alt="Mr. Dev Satapathy" class="rounded-circle" style="width: 50px; height: 50px; object-fit: cover;">
                  <div>
                    <h6 class="mb-0 fw-bold">Mr. Dev Satapathy</h6>
                    <span class="text-muted small">Counsellor & Psychologist</span>
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
