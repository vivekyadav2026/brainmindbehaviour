<?php
$siteTitle = 'Home | Brain Mind Behaviour Neurosciences Research Institute';
$bodyClass = 'index-page';
include_once 'includes/header.php';
?>

    <!-- Hero Section -->
    <section id="hero" class="hero-new">
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row align-items-center">
          <div class="col-lg-6">
            <div class="hero-content text-center text-lg-start">
              
              <div class="subtitle" data-aos="fade-right" data-aos-delay="200">
                Brain Mind Behaviour<br/>
                Neurosciences Research Institute
              </div>

              <h1 data-aos="fade-right" data-aos-delay="300">
                Science for the Brain.<br/>
                Care for the Mind.<br/>
                Better Behavior. <span class="text-gradient">Better Life.</span>
              </h1>

              <p class="hero-description mx-auto mx-lg-0" data-aos="fade-right" data-aos-delay="400">
                We integrate neuroscience, psychiatry and psychology to deliver evidence-based care, advance research and promote better brain health, mental wellbeing and positive behavior.
              </p>

              <div class="hero-actions d-flex flex-column flex-sm-row justify-content-center justify-content-lg-start gap-3 mb-4" data-aos="fade-right" data-aos-delay="500">
                <a href="book-appointment.php" class="btn-glow-blue">
                  <i class="far fa-calendar-check me-2"></i>BOOK AN APPOINTMENT
                </a>
                <a href="services.php" class="btn-outline-white">
                  EXPLORE OUR SERVICES <i class="fas fa-arrow-right ms-2"></i>
                </a>
              </div>

              <!-- Google review badge inside hero section -->
              <div class="d-flex justify-content-center justify-content-lg-start mb-4" data-aos="fade-right" data-aos-delay="600">
                <a href="https://maps.app.goo.gl/Gx4TujW35ErAxg9C9" target="_blank" class="text-decoration-none">
                  <div class="d-inline-flex align-items-center bg-dark border border-secondary px-3 py-2 rounded-pill shadow banner-review-badge" style="background-color: rgba(0, 8, 28, 0.6) !important; border-color: rgba(0, 217, 255, 0.15) !important;">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/c/c1/Google_%22G%22_logo.svg" alt="Google" style="width: 20px; height: 20px; margin-right: 8px;">
                    <div class="stars text-warning fs-6 me-2" style="letter-spacing: 1px;">
                      <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                    </div>
                    <strong class="text-white me-2" style="font-size: 14px;">5.0/5</strong>
                    <span class="text-white-50 small" style="font-size: 12.5px;">based on 311 Google Reviews</span>
                  </div>
                </a>
              </div>

            </div>
          </div>

          <div class="col-lg-6">
            <div class="hero-img-container" data-aos="fade-left" data-aos-delay="400">
              <img src="assets/img/glowing_brain_hero.png" alt="Brain Mind Behaviour Neuroscience Illustration" class="img-fluid">
            </div>
          </div>
        </div>
      </div>
    </section><!-- /Hero Section -->

    <!-- Specialties Section -->
    <section id="specialties" class="specialties section">
      <div class="container" data-aos="fade-up">
        <div class="row g-4">
          
          <!-- Specialty 1: Psychiatry -->
          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
            <div class="card-specialty">
              <div class="icon-wrapper">
                <i class="fas fa-brain"></i>
              </div>
              <h4>PSYCHIATRY</h4>
              <p>Comprehensive evaluation and evidence-based treatment for a wide range of psychiatric and neuropsychiatric disorders.</p>
              <a href="psychiatry.php" class="learn-more">Learn More <i class="fas fa-arrow-right ms-1"></i></a>
            </div>
          </div>

          <!-- Specialty 2: Psychological Counselling -->
          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
            <div class="card-specialty">
              <div class="icon-wrapper">
                <i class="fas fa-comments"></i>
              </div>
              <h4>PSYCHOLOGICAL COUNSELLING</h4>
              <p>Structured counselling and behavioural interventions for individuals, couples, families and children.</p>
              <a href="counselling.php" class="learn-more">Learn More <i class="fas fa-arrow-right ms-1"></i></a>
            </div>
          </div>

          <!-- Specialty 3: Neuroscience & Brain Health -->
          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
            <div class="card-specialty">
              <div class="icon-wrapper">
                <i class="fas fa-network-wired"></i>
              </div>
              <h4>NEUROSCIENCE & BRAIN HEALTH</h4>
              <p>Science-driven approach to cognition, brain health, behavioural neuroscience and research for better outcomes.</p>
              <a href="neuroscience.php" class="learn-more">Learn More <i class="fas fa-arrow-right ms-1"></i></a>
            </div>
          </div>

        </div>
      </div>
    </section><!-- /Specialties Section -->

    <!-- Lower Split-Section: Team & Booking (Replaces standard Meet the Specialists) -->
    <section id="panel-split" class="panel-split">
      <div class="container" data-aos="fade-up">
        <div class="row g-5">
          
          <!-- Left Column: Meet Our Team -->
          <div class="col-lg-7" data-aos="fade-right" data-aos-delay="100">
            <h3 class="mb-4">Meet Our Team</h3>
            
            <div class="doctor-list mt-4">
              
              <!-- Doctor 1: Dr. Ramanand Satapathy -->
              <div class="doctor-item">
                <img src="assets/img/doctor_ramanand.png" alt="Dr. Ramanand Satapathy">
                <div class="doc-details d-flex flex-column align-items-start">
                  <h4 class="mb-1">Dr. Ramanand Satapathy, MD</h4>
                  <span class="title">Former Superintendent & Professor of Psychiatry</span>
                  <p class="desc text-muted mb-2">Neuroscience | Psychiatry | Research</p>
                  <a href="doctor-ramanand.php" class="btn-doc-profile">View Profile</a>
                </div>
              </div>

              <!-- Doctor 2: Dr. Suprriya Satapathy -->
              <div class="doctor-item">
                <img src="assets/img/doctor_suprriya.png" alt="Dr. Suprriya Satapathy">
                <div class="doc-details d-flex flex-column align-items-start">
                  <h4 class="mb-1">Dr. Suprriya Satapathy, MD</h4>
                  <span class="title">Consultant Psychiatrist</span>
                  <p class="desc text-muted mb-2">Adult Psychiatry | Mood Disorders | Psychotherapy</p>
                  <a href="doctor-suprriya.php" class="btn-doc-profile">View Profile</a>
                </div>
              </div>

              <!-- Doctor 3: Mr. Dev Satapathy -->
              <div class="doctor-item">
                <img src="assets/img/mr_dev.png" alt="Mr. Dev Satapathy">
                <div class="doc-details d-flex flex-column align-items-start">
                  <h4 class="mb-1">Mr. Dev Satapathy</h4>
                  <span class="title">M.Sc Psychology, Counselor</span>
                  <p class="desc text-muted mb-2">Counseling</p>
                  <a href="doctor-dev.php" class="btn-doc-profile">View Profile</a>
                </div>
              </div>

            </div>
          </div>

          <!-- Right Column: Book A Consultation -->
          <div class="col-lg-5" data-aos="fade-left" data-aos-delay="200">
            <h3 class="mb-4">Book A Consultation</h3>
            
            <div class="booking-box mt-4">
              
              <!-- Item 1: Psychiatric Consultation -->
              <div class="consult-item">
                <div class="consult-left">
                  <div class="consult-icon">
                    <i class="fas fa-user-check"></i>
                  </div>
                  <div class="consult-info">
                    <h5>Psychiatric Consultation</h5>
                    <span>20 minutes</span>
                  </div>
                </div>
                <div class="price">₹2,000</div>
              </div>

              <!-- Item 2: Psychological Counselling -->
              <div class="consult-item">
                <div class="consult-left">
                  <div class="consult-icon">
                    <i class="fas fa-comments"></i>
                  </div>
                  <div class="consult-info">
                    <h5>Psychological Counselling</h5>
                    <span>30 minutes</span>
                  </div>
                </div>
                <div class="price">₹2,000</div>
              </div>

              <div class="mt-4">
                <a href="onsite-consultation.php" class="btn-book-now text-decoration-none">
                  <i class="far fa-calendar-check me-2"></i>BOOK APPOINTMENT NOW
                </a>
              </div>

            </div>
          </div>

        </div>
      </div>
    </section><!-- /Lower Split-Section -->

    <!-- Home About Section -->
    <section id="home-about" class="home-about section position-relative" style="overflow: hidden; padding: 100px 0;">
      <!-- Subtle Background Glow for the section -->
      <div class="position-absolute" style="top: 20%; left: -10%; width: 400px; height: 400px; background: radial-gradient(circle, rgba(0, 217, 255, 0.05) 0%, transparent 70%); filter: blur(40px); z-index: 0;"></div>

      <div class="container position-relative z-1" data-aos="fade-up" data-aos-delay="100">
        <div class="row align-items-center g-5">
          <div class="col-lg-6 pe-lg-5" data-aos="fade-right" data-aos-delay="200">
            <div class="about-content">
              <div class="d-flex align-items-center mb-3">
                <i class="fas fa-brain me-3" style="font-size: 24px; color: #00d9ff; filter: drop-shadow(0 0 8px rgba(0, 217, 255, 0.6));"></i>
                <h6 class="text-uppercase m-0" style="color: #00d9ff; letter-spacing: 2px; font-weight: 700;">About Our Clinic</h6>
              </div>
              <h2 class="section-heading mb-4" style="color: #ffffff; font-size: 2.8rem; line-height: 1.2; font-weight: 800;">Where clinical excellence meets profound empathy.</h2>
              <p style="color: #b0c4de; font-size: 1.15rem; line-height: 1.8; font-weight: 400; margin-bottom: 25px;">
                Brain Mind Behaviour Neurosciences Research Institute stands at the forefront of mental health care in Visakhapatnam.
              </p>
              <div style="width: 60px; height: 3px; background: #00d9ff; margin-bottom: 25px; border-radius: 2px; box-shadow: 0 0 10px rgba(0, 217, 255, 0.5);"></div>
              <p style="color: rgba(255,255,255,0.7); font-size: 1rem; line-height: 1.7;">
                We combine sophisticated medical expertise with a deeply human-centric approach. Led by former medical directors and distinguished professors, our practice is designed to provide unparalleled care for complex psychiatric and neurological conditions, in an environment of absolute discretion and comfort.
              </p>
              <div class="cta-section mt-5">
                <a href="about.php" class="btn-glow-blue text-decoration-none" style="padding: 14px 32px; font-weight: 600; border-radius: 8px;">
                  Discover Our Journey <i class="fas fa-arrow-right ms-2"></i>
                </a>
              </div>
            </div>
          </div>
          <div class="col-lg-6" data-aos="fade-left" data-aos-delay="300">
            <div class="about-visual position-relative" style="padding-left: 20px;">
              <!-- Decorative background element -->
              <div class="position-absolute" style="top: -30px; right: -30px; width: 150px; height: 150px; background: radial-gradient(circle, rgba(0,82,255,0.3) 0%, transparent 70%); filter: blur(30px); z-index: 0;"></div>
              
              <div class="main-image position-relative z-1" style="border-radius: 20px; overflow: hidden; border: 1px solid rgba(0, 217, 255, 0.2); box-shadow: 0 20px 50px rgba(0, 0, 0, 0.5);">
                <img src="assets/img/consultation_room.png" alt="Consultation Room" class="img-fluid w-100" style="display: block;">
                <!-- Inner glass overlay -->
                <div class="position-absolute top-0 start-0 w-100 h-100" style="box-shadow: inset 0 0 40px rgba(0, 82, 255, 0.2); pointer-events: none;"></div>
              </div>
              
              <!-- Refined Experience Badge (Renamed to avoid CSS conflicts) -->
              <div class="award-badge-floating position-absolute" style="bottom: -20px; left: -10px; z-index: 2; background: rgba(0, 4, 15, 0.85); border: 1px solid rgba(0, 217, 255, 0.3); border-left: 4px solid #00d9ff; padding: 20px 25px; border-radius: 12px; box-shadow: 0 15px 35px rgba(0, 0, 0, 0.6); backdrop-filter: blur(15px); display: flex; align-items: center; gap: 20px;">
                <div style="background: linear-gradient(135deg, rgba(0,217,255,0.2), rgba(0,82,255,0.1)); width: 55px; height: 55px; border-radius: 50%; display: flex; align-items: center; justify-content: center; border: 1px solid rgba(0,217,255,0.3); box-shadow: 0 0 15px rgba(0,217,255,0.2);">
                  <i class="fas fa-award" style="font-size: 26px; color: #00d9ff;"></i>
                </div>
                <div>
                  <span class="d-block" style="font-size: 34px; font-weight: 800; color: #ffffff; line-height: 1; text-shadow: 0 0 10px rgba(255,255,255,0.2);">36+</span>
                  <span style="font-size: 13px; color: #00d9ff; text-transform: uppercase; letter-spacing: 1.5px; font-weight: 600;">Years of Excellence</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- /Home About Section -->

    <!-- Why Choose Us Section -->
    <section id="why-choose-us" class="why-choose-us section">
      <div class="container section-title" data-aos="fade-up">
        <h2>Why Choose Us</h2>
        <p>A Commitment to Excellence & Empathy</p>
      </div>
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-4 text-center">
          <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="glass-card p-4 h-100">
              <i class="fas fa-user-shield text-gradient-cyan fs-1 mb-3 d-block"></i>
              <h4>Absolute Confidentiality</h4>
              <p class="mb-0">Your privacy is our utmost priority. We ensure complete discretion for all our patients.</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="glass-card p-4 h-100">
              <i class="fas fa-stethoscope text-gradient-cyan fs-1 mb-3 d-block"></i>
              <h4>Evidence-Based Care</h4>
              <p class="mb-0">We utilize the latest globally recognized medical protocols for psychiatric treatments.</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="glass-card p-4 h-100">
              <i class="fas fa-users text-gradient-cyan fs-1 mb-3 d-block"></i>
              <h4>Multidisciplinary Team</h4>
              <p class="mb-0">Collaboration between psychiatrists, neurologists, and clinical psychologists.</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
            <div class="glass-card p-4 h-100">
              <i class="fas fa-clinic-medical text-gradient-cyan fs-1 mb-3 d-block"></i>
              <h4>Comfortable Environment</h4>
              <p class="mb-0">Our premium clinic is designed to be a calming, welcoming space free from clinical anxiety.</p>
            </div>
          </div>
        </div>
      </div>
    </section><!-- /Why Choose Us Section -->

    <!-- Clinic Gallery Section -->
    <section id="clinic-gallery" class="clinic-gallery section light-background">
      <div class="container section-title" data-aos="fade-up">
        <h2>Our Clinic</h2>
        <p>A Premium Space Designed for Healing</p>
      </div>
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row g-3" style="min-height: 400px;">
          <div class="col-lg-6 h-100">
            <div class="gallery-img-wrapper rounded overflow-hidden shadow-sm h-100" style="border: 1px solid rgba(0, 217, 255, 0.15) !important;">
              <img src="assets/img/clinic_exterior.jpg" alt="Clinic Exterior" class="img-fluid w-100 h-100" style="object-fit: cover; min-height: 400px;">
            </div>
          </div>
          <div class="col-lg-6 h-100">
            <div class="row g-3 h-100">
              <div class="col-12" style="height: calc(50% - 0.5rem);">
                <div class="gallery-img-wrapper rounded overflow-hidden shadow-sm h-100" style="border: 1px solid rgba(0, 217, 255, 0.15) !important;">
                  <img src="assets/img/consultation_room.png" alt="Consultation Room" class="img-fluid w-100 h-100" style="object-fit: cover; min-height: 190px;">
                </div>
              </div>
              <div class="col-12" style="height: calc(50% - 0.5rem);">
                <div class="gallery-img-wrapper rounded overflow-hidden shadow-sm h-100 d-flex align-items-center justify-content-center p-4 text-center" style="background: linear-gradient(135deg, rgba(0, 82, 255, 0.2), rgba(0, 217, 255, 0.1)) !important; border: 1px solid rgba(0, 217, 255, 0.15) !important;">
                  <div>
                    <h3 class="mb-3 text-white">Take the First Step</h3>
                    <p class="mb-0 text-white-50">Visit us at our state-of-the-art facility in Visakhapatnam.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- /Clinic Gallery Section -->

    <!-- Credentials & Gallery Section -->
    <section id="credentials-gallery" class="credentials-gallery section">
      <div class="container section-title" data-aos="fade-up">
        <h2>Gallery & Credentials</h2>
        <p>Official certifications of our leadership</p>
      </div>

      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row g-4 justify-content-center">
          <!-- APA Certificate -->
          <div class="col-lg-6 col-md-8" data-aos="zoom-in" data-aos-delay="100">
            <div class="glass-card overflow-hidden h-100" style="border: 1px solid rgba(0, 217, 255, 0.15) !important;">
              <div class="card-header text-center py-2" style="background: rgba(0, 8, 28, 0.85) !important; border-bottom: 1px solid rgba(0, 217, 255, 0.15) !important;">
                <span class="small fw-bold text-white">APA International Member Certificate</span>
              </div>
              <div class="p-3 d-flex align-items-center justify-content-center bg-dark-deep" style="height: 250px;">
                <a href="assets/img/cert_ramanand.jpg" target="_blank" title="View Full Certificate" class="w-100 h-100 d-flex align-items-center justify-content-center">
                  <img src="assets/img/cert_ramanand.jpg" alt="APA International Member Certificate" class="img-fluid" style="max-height: 100%; max-width: 100%; object-fit: contain;">
                </a>
              </div>
              <div class="card-body text-center py-3">
                <h5 class="card-title mb-1 fw-bold text-white">American Psychiatric Association</h5>
                <p class="card-text small text-white-50">Prof. Dr. Ramanand Satapathy - International Member (Since 2011)</p>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section><!-- /Credentials & Gallery Section -->

    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials section light-background">
      <div class="container section-title" data-aos="fade-up">
        <h2>Patient Stories</h2>
        <p>Trusted by Thousands</p>
        <div class="google-rating mt-4 d-flex align-items-center justify-content-center gap-2 flex-wrap">
            <a href="https://maps.app.goo.gl/Gx4TujW35ErAxg9C9" target="_blank" class="text-decoration-none">
              <div class="d-inline-flex align-items-center bg-dark border border-secondary px-4 py-2 rounded-pill shadow banner-review-badge" style="background-color: rgba(0, 8, 28, 0.6) !important; border-color: rgba(0, 217, 255, 0.15) !important;">
                  <img src="https://upload.wikimedia.org/wikipedia/commons/c/c1/Google_%22G%22_logo.svg" alt="Google" style="width: 22px; height: 22px; margin-right: 10px;">
                  <div class="stars text-warning fs-6 me-2" style="letter-spacing: 1px;">
                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                  </div>
                  <strong class="text-white me-2" style="font-size: 15px;">5.0/5</strong>
                  <span class="text-white-50 small" style="font-size: 13.5px;">based on 311 Google Reviews</span>
              </div>
            </a>
        </div>
      </div>
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-4 justify-content-center">
          <div class="col-lg-4 col-md-6">
            <div class="glass-card p-4 h-100">
              <div class="stars text-warning mb-3 fs-6">
                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
              </div>
              <p class="fst-italic">"Dr. Ramanand's approach is incredible. He listened patiently and provided a clear, effective treatment plan that completely changed my perspective."</p>
              <h5 class="mt-4 mb-0 fw-bold">- M.K.</h5>
              <small class="text-gradient-cyan fw-bold">Anxiety Treatment</small>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="glass-card p-4 h-100">
              <div class="stars text-warning mb-3 fs-6">
                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
              </div>
              <p class="fst-italic">"The online consultation was seamless. I felt just as cared for as an in-person visit. Highly recommend their telepsychiatry services."</p>
              <h5 class="mt-4 mb-0 fw-bold">- S.R.</h5>
              <small class="text-gradient-cyan fw-bold">Online Consultation</small>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="glass-card p-4 h-100">
              <div class="stars text-warning mb-3 fs-6">
                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
              </div>
              <p class="fst-italic">"A highly professional and completely discreet clinic. The counseling sessions provided me with the tools I needed to cope with severe stress."</p>
              <h5 class="mt-4 mb-0 fw-bold">- Anonymous</h5>
              <small class="text-gradient-cyan fw-bold">Psychological Counselling</small>
            </div>
          </div>
        </div>
      </div>
    </section><!-- /Testimonials Section -->

    <!-- FAQ Section -->
    <section id="faq" class="faq section">
      <div class="container section-title" data-aos="fade-up">
        <h2>Frequently Asked Questions</h2>
        <p>What you need to know before your visit</p>
      </div>
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row justify-content-center">
          <div class="col-lg-8">
            <div class="accordion" id="faqAccordion">
              <div class="accordion-item mb-3 border-0 shadow-sm rounded overflow-hidden">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                    How do I prepare for my first psychiatric consultation?
                  </button>
                </h2>
                <div id="faq1" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                  <div class="accordion-body text-muted">
                    Please bring any previous medical records, prescriptions, and psychological assessments. It's also helpful to note down your symptoms, concerns, and questions beforehand so we can address everything during your session.
                  </div>
                </div>
              </div>
              <div class="accordion-item mb-3 border-0 shadow-sm rounded overflow-hidden">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                    Is my consultation entirely confidential?
                  </button>
                </h2>
                <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                  <div class="accordion-body text-muted">
                    Yes. Absolute confidentiality is the cornerstone of our practice. Your medical records and conversations are strictly private and protected under medical confidentiality laws.
                  </div>
                </div>
              </div>
              <div class="accordion-item mb-3 border-0 shadow-sm rounded overflow-hidden">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                    How does the online video consultation work?
                  </button>
                </h2>
                <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                  <div class="accordion-body text-muted">
                    Once you book an online appointment, you will receive a secure video link via email and WhatsApp. At your scheduled time, simply click the link from your phone or computer to join the private session with our specialists.
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- /FAQ Section -->

    <!-- Call To Action Section -->
    <section id="call-to-action" class="call-to-action section">
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="hero-content">
          <div class="row align-items-center">
            <div class="col-lg-10 offset-lg-1 text-center">
              <div class="content-wrapper" data-aos="fade-up" data-aos-delay="200">
                <h2>Begin your journey to better mental health</h2>
                <p class="mt-4 mb-5">We offer both discreet onsite consultations at our Visakhapatnam clinic and secure, private online telepsychiatry sessions.</p>
                <div class="d-flex flex-column flex-sm-row justify-content-center gap-3 mt-4">
                  <a href="contact.php" class="btn-glow-blue text-decoration-none">
                    <span>Book Onsite Visit</span>
                    <i class="fas fa-arrow-right ms-2"></i>
                  </a>
                  <a href="online-consultation.php" class="btn-outline-white text-decoration-none">
                    <span>Learn about Telepsychiatry</span>
                    <i class="fas fa-arrow-right ms-2"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- /Call To Action Section -->

    <!-- Bottom Assurances Bar -->
    <section class="bar-assurances">
      <div class="container">
        <div class="row gy-3 justify-content-center text-center">
          <div class="col-6 col-md-4 col-lg-2">
            <div class="assurance-item">
              <i class="bi bi-patch-check-fill"></i> Evidence Based Care
            </div>
          </div>
          <div class="col-6 col-md-4 col-lg-2">
            <div class="assurance-item">
              <i class="bi bi-patch-check-fill"></i> Patient Centric Approach
            </div>
          </div>
          <div class="col-6 col-md-4 col-lg-3">
            <div class="assurance-item">
              <i class="bi bi-patch-check-fill"></i> Integrated Neuroscience
            </div>
          </div>
          <div class="col-6 col-md-4 col-lg-2">
            <div class="assurance-item">
              <i class="bi bi-patch-check-fill"></i> Confidential & Ethical
            </div>
          </div>
          <div class="col-6 col-md-4 col-lg-3">
            <div class="assurance-item">
              <i class="bi bi-patch-check-fill"></i> Compassionate Support
            </div>
          </div>
        </div>
      </div>
    </section>

<?php include_once 'includes/footer.php'; ?>
