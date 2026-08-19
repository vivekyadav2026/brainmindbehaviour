<?php
$serviceName = 'Depression';
$siteTitle = $serviceName . ' Treatment | Brain Mind Behaviour Neurosciences Research Institute';
$metaDescription = 'Comprehensive assessment, medical management, and therapy for clinical depression in Visakhapatnam.';
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
              <p class="mb-0">Comprehensive evaluation, medical management, and therapy for clinical depression.</p>
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
              <img src="https://images.unsplash.com/photo-1576091160550-2173dba999ef?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80" alt="<?php echo htmlspecialchars($serviceName); ?>" class="img-fluid rounded-4 mb-4 shadow-sm" style="width: 100%; object-fit: cover; aspect-ratio: 16/9;">

              <h2 class="mb-4 fw-bold">Understanding Clinical Depression</h2>
              <p class="lead text-muted mb-4">
                Depression is more than just feeling sad or going through a temporary rough patch. It is a serious, medically recognized health condition that affects how you feel, think, and handle daily activities.
              </p>
              <p class="mb-4">
                At Brain Mind Behaviour Neurosciences Research Institute, we treat clinical depression (Major Depressive Disorder) with a scientifically validated, patient-centric approach. We focus on identifying the biological neurochemical changes, psychological traits, and social environments unique to each individual to ensure a complete and lasting recovery.
              </p>
              
              <h3 class="mt-5 mb-3 fw-semibold">Our Comprehensive Treatment Approach</h3>
              <div class="row mb-4">
                <div class="col-md-6 mb-3">
                  <div class="d-flex align-items-start gap-2">
                    <i class="bi bi-patch-check text-primary fs-5"></i>
                    <div>
                      <h5 class="mb-1 fw-bold">Clinical Diagnosis</h5>
                      <p class="text-muted small">Thorough psychiatric evaluation to determine type and severity of depression.</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 mb-3">
                  <div class="d-flex align-items-start gap-2">
                    <i class="bi bi-patch-check text-primary fs-5"></i>
                    <div>
                      <h5 class="mb-1 fw-bold">Pharmacotherapy</h5>
                      <p class="text-muted small">Evidence-based medication management tailored to your biological profile.</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 mb-3">
                  <div class="d-flex align-items-start gap-2">
                    <i class="bi bi-patch-check text-primary fs-5"></i>
                    <div>
                      <h5 class="mb-1 fw-bold">Psychological Support</h5>
                      <p class="text-muted small">Referrals and integration with Cognitive Behavioral Therapy (CBT) and counseling.</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 mb-3">
                  <div class="d-flex align-items-start gap-2">
                    <i class="bi bi-patch-check text-primary fs-5"></i>
                    <div>
                      <h5 class="mb-1 fw-bold">Relapse Prevention</h5>
                      <p class="text-muted small">Continuous monitoring, lifestyle adjustments, and wellness support for long-term health.</p>
                    </div>
                  </div>
                </div>
              </div>

              <div class="bg-light p-4 rounded-3 border-start border-4 border-primary mb-4">
                <h4 class="fw-bold mb-2">A Holistic Path to Recovery</h4>
                <p class="mb-0 text-muted">
                  Mental health recovery requires patience and precise medical guidance. Our psychiatrists and therapists work collaboratively to design customizable strategies that help patients restore their lifestyle and regain emotional balance in a secure, confidential clinical setting.
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
