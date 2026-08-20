<?php
$siteTitle = 'Contact Us | Brain Mind Behaviour Neurosciences Research Institute';
$metaDescription = 'Contact Brain Mind Behaviour Neurosciences Research Institute in Visakhapatnam to book an appointment.';
$bodyClass = 'contact-page';
include_once 'includes/header.php';
?>

  <!-- Apply booking-light-theme to force light background over global dark theme -->
  <main class="main booking-light-theme" style="min-height: 100vh;">

    <!-- Page Title -->
    <div class="page-title">
      <div class="heading">
        <div class="container">
          <div class="row d-flex justify-content-center text-center">
            <div class="col-lg-8">
              <h1 class="heading-title">Contact Us</h1>
              <p class="mb-0">
                We are here to assist you. Reach out to schedule a consultation with our specialists.
              </p>
            </div>
          </div>
        </div>
      </div>
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="index.php">Home</a></li>
            <li class="current">Contact</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Page Title -->

    <!-- Contact Section -->
    <section id="contact" class="contact py-5">
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row g-4 justify-content-center">
          
          <div class="col-lg-5">
            <div class="contact-info-wrapper h-100">
              
              <!-- Address Box -->
              <div class="bg-white p-4 rounded-4 shadow-sm border border-light mb-4 d-flex align-items-start" data-aos="fade-up" data-aos-delay="100">
                <div class="me-4 flex-shrink-0">
                  <div style="width: 50px; height: 50px; background-color: #e0f7fa; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                    <i class="bi bi-geo-alt fs-4 text-primary"></i>
                  </div>
                </div>
                <div>
                  <h4 class="fw-bold text-dark mb-2">Clinic Address</h4>
                  <p class="text-muted mb-0 small">101, Coastal Park Apartments, Coastal Battery Road, Opposite Naval Coastal Battery, Maharani Peta, Visakhapatnam, Andhra Pradesh – 530002</p>
                </div>
              </div>

              <!-- Phone Box -->
              <div class="bg-white p-4 rounded-4 shadow-sm border border-light mb-4 d-flex align-items-start" data-aos="fade-up" data-aos-delay="200">
                <div class="me-4 flex-shrink-0">
                  <div style="width: 50px; height: 50px; background-color: #e0f7fa; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                    <i class="bi bi-telephone fs-4 text-primary"></i>
                  </div>
                </div>
                <div>
                  <h4 class="fw-bold text-dark mb-2">Phone Number</h4>
                  <p class="mb-1"><a href="tel:+919160366716" class="text-primary fw-bold text-decoration-none">+91 91603 66716</a></p>
                  <p class="text-muted mb-0 small">Call to book an appointment</p>
                </div>
              </div>

              <!-- WhatsApp Box -->
              <div class="bg-white p-4 rounded-4 shadow-sm border border-light mb-4 d-flex align-items-start" data-aos="fade-up" data-aos-delay="300">
                <div class="me-4 flex-shrink-0">
                  <div style="width: 50px; height: 50px; background-color: #e8f5e9; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                    <i class="bi bi-whatsapp fs-4 text-success"></i>
                  </div>
                </div>
                <div>
                  <h4 class="fw-bold text-dark mb-2">WhatsApp</h4>
                  <p class="mb-1"><a href="https://wa.me/919160366716" class="text-success fw-bold text-decoration-none" target="_blank">Chat with us</a></p>
                  <p class="text-muted mb-0 small">Message us anytime</p>
                </div>
              </div>
              
            </div>
          </div>

          <div class="col-lg-7">
            <div class="bg-white p-4 p-md-5 rounded-4 shadow-sm border border-light h-100" data-aos="fade-up" data-aos-delay="200">
              <div class="mb-4">
                <h3 class="fw-bold text-dark mb-2">Send us a <span class="text-primary">Message</span></h3>
                <p class="text-muted small">Have questions or want to learn more? Reach out to us and our team will get back to you shortly.</p>
              </div>

              <form action="process-contact.php" method="post" class="php-email-form">
                <div class="row g-3">
                  <div class="col-md-6">
                    <input type="text" class="form-control bg-light border-0" name="name" id="name" placeholder="Your Name *" required>
                  </div>

                  <div class="col-md-6">
                    <input type="email" class="form-control bg-light border-0" name="email" id="email" placeholder="Your Email *" required>
                  </div>

                  <div class="col-12">
                    <input type="text" class="form-control bg-light border-0" name="subject" id="subject" placeholder="Subject *" required>
                  </div>

                  <div class="col-12">
                    <textarea class="form-control bg-light border-0" name="message" id="message" placeholder="Your Message *" rows="6" required></textarea>
                  </div>

                  <div class="col-12">
                    <div class="loading">Loading</div>
                    <div class="error-message"></div>
                    <div class="sent-message">Your message has been sent. Thank you!</div>
                  </div>

                  <div class="col-12 mt-4">
                    <div class="d-grid">
                      <button type="submit" class="btn btn-primary rounded-pill py-3 fw-bold" style="background-color: #0d6efd; border-color: #0d6efd; box-shadow: 0 4px 15px rgba(13, 110, 253, 0.3);">
                        <i class="far fa-paper-plane me-2"></i> Send Message
                      </button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      <!-- Google Maps Embed -->
      <div class="container-fluid map-container mt-5 px-0" data-aos="fade-up" data-aos-delay="200">
        <iframe
          src="https://maps.google.com/maps?q=Brain+Mind+Behaviour+Neurosciences+Research+Institute+Visakhapatnam&t=&z=15&ie=UTF8&iwloc=&output=embed"
          width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    </section><!-- /Contact Section -->

  </main>

<?php include_once 'includes/footer.php'; ?>
