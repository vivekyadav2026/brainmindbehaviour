<?php
$siteTitle = 'Contact Us | Brain Mind Behaviour Neurosciences Research Institute';
$metaDescription = 'Contact Brain Mind Behaviour Neurosciences Research Institute in Visakhapatnam to book an appointment.';
$bodyClass = 'contact-page';
include_once 'includes/header.php';
?>

  <main class="main">

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
    <section id="contact" class="contact section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row g-4">
          <div class="col-lg-5">
            <div class="contact-info-wrapper">
              <div class="contact-info-item" data-aos="fade-up" data-aos-delay="100">
                <div class="info-icon">
                  <i class="bi bi-geo-alt"></i>
                </div>
                <div class="info-content">
                  <h3>Clinic Address</h3>
                  <p>101, Coastal Park Apartments, Coastal Battery Road, Opposite Naval Coastal Battery, Maharani Peta, Visakhapatnam, Andhra Pradesh – 530002</p>
                </div>
              </div>

              <div class="contact-info-item" data-aos="fade-up" data-aos-delay="200">
                <div class="info-icon">
                  <i class="bi bi-telephone"></i>
                </div>
                <div class="info-content">
                  <h3>Phone Number</h3>
                  <p><a href="tel:+919160366716" style="color: inherit;">+91 91603 66716</a></p>
                  <p>Call to book an appointment</p>
                </div>
              </div>

              <div class="contact-info-item" data-aos="fade-up" data-aos-delay="300">
                <div class="info-icon">
                  <i class="bi bi-whatsapp"></i>
                </div>
                <div class="info-content">
                  <h3>WhatsApp</h3>
                  <p><a href="https://wa.me/919160366716" style="color: inherit;" target="_blank">Chat with us</a></p>
                  <p>Message us anytime</p>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-7">
            <div class="contact-form-card" data-aos="fade-up" data-aos-delay="200">
              <h2>Send us a Message</h2>
              <p class="mb-4">Have questions or want to learn more? Reach out to us and our team will get back to you
                shortly.</p>

              <form action="#" method="post" class="php-email-form">
                <div class="row g-4">
                  <div class="col-md-6">
                    <input type="text" class="form-control" name="name" id="name" placeholder="Your Name" required="">
                  </div>

                  <div class="col-md-6">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email"
                      required="">
                  </div>

                  <div class="col-12">
                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject"
                      required="">
                  </div>

                  <div class="col-12">
                    <textarea class="form-control" name="message" id="message" placeholder="Your Message" rows="6"
                      required=""></textarea>
                  </div>

                  <div class="col-12">
                    <div class="loading">Loading</div>
                    <div class="error-message"></div>
                    <div class="sent-message">Your message has been sent. Thank you!</div>
                  </div>

                  <div class="col-12">
                    <button type="submit" class="btn btn-submit">Send Message</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      <!-- Visiting Cards Section -->
      <div class="container mt-5" data-aos="fade-up" data-aos-delay="200">
        <div class="row section-title justify-content-center text-center mb-4">
          <div class="col-lg-8">
            <h2>Clinic Visiting Cards</h2>
            <p>Save our digital visiting cards for quick reference to phone numbers, timings, and address</p>
          </div>
        </div>
        <div class="row justify-content-center g-4">
          <div class="col-md-6 col-lg-5" data-aos="zoom-in" data-aos-delay="100">
            <div class="card border-0 shadow-sm overflow-hidden bg-white">
              <div class="bg-primary text-white py-2 px-3 text-center">
                <span class="fw-bold">Prof. Dr. Ramanand Satapathy Card</span>
              </div>
              <div class="p-3 d-flex align-items-center justify-content-center bg-light" style="height: 250px;">
                <a href="assets/img/card_ramanand.jpg" target="_blank" title="View Full Visiting Card" class="w-100 h-100 d-flex align-items-center justify-content-center">
                  <img src="assets/img/card_ramanand.jpg" alt="Dr. Ramanand Satapathy Visiting Card" class="img-fluid" style="max-height: 100%; max-width: 100%; object-fit: contain;">
                </a>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-5" data-aos="zoom-in" data-aos-delay="200">
            <div class="card border-0 shadow-sm overflow-hidden bg-white">
              <div class="bg-primary text-white py-2 px-3 text-center">
                <span class="fw-bold">Dr. Supriya Satapathy Card</span>
              </div>
              <div class="p-3 d-flex align-items-center justify-content-center bg-light" style="height: 250px;">
                <a href="assets/img/card_suprriya.jpg" target="_blank" title="View Full Visiting Card" class="w-100 h-100 d-flex align-items-center justify-content-center">
                  <img src="assets/img/card_suprriya.jpg" alt="Dr. Supriya Satapathy Visiting Card" class="img-fluid" style="max-height: 100%; max-width: 100%; object-fit: contain;">
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="container-fluid map-container mt-5" data-aos="fade-up" data-aos-delay="200">
        <div class="map-overlay"></div>
        <iframe
          src="https://maps.google.com/maps?q=Brain+Mind+Behaviour+Neurosciences+Research+Institute+Visakhapatnam&t=&z=15&ie=UTF8&iwloc=&output=embed"
          width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>

    </section><!-- /Contact Section -->

  </main>

<?php include_once 'includes/footer.php'; ?>
