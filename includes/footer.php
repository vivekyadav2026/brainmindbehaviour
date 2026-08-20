<?php
// includes/footer.php
?>
  </main>

  <footer id="footer" class="footer-new position-relative">
    <!-- Background Glow Elements -->
    <div class="footer-line-glow"></div>
    <div class="footer-radial-glow"></div>

    <div class="container position-relative z-1">
      <div class="row align-items-start g-3">
        
        <div class="col-lg-4">
          <div class="footer-brand">
            <a href="index.php" class="footer-logo">
              <img src="assets/img/logo_transparent.png" alt="Brain Mind Behavior Clinic">
            </a>
            <p class="brand-desc">Expert psychiatric, neuropsychiatric, and psychological care for individuals and families in Visakhapatnam.</p>
            
            <div class="footer-contact">
              <div class="contact-row">
                <div class="contact-icon-box">
                  <i class="fas fa-map-marker-alt"></i>
                </div>
                <span class="contact-text">101, Coastal Park Apartments, Coastal Battery Road, Opposite Naval Coastal Battery, Maharani Peta, Visakhapatnam, Andhra Pradesh – 530002</span>
              </div>
              <div class="contact-row">
                <div class="contact-icon-box">
                  <i class="fas fa-phone-alt"></i>
                </div>
                <span class="contact-text"><a href="tel:+919160366716">+91 91603 66716</a></span>
              </div>
              <div class="contact-row">
                <div class="contact-icon-box">
                  <i class="fas fa-envelope"></i>
                </div>
                <span class="contact-text"><a href="mailto:contact@brainmindbehaviour.com">contact@brainmindbehaviour.com</a></span>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-8">
          <div class="row g-3">
            <div class="col-md-4 col-sm-6">
              <div class="footer-links-col">
                <h6>Quick Links</h6>
                <nav class="footer-nav-list">
                  <a href="index.php">Home</a>
                  <a href="about.php">About Us</a>
                  <a href="doctors.php">Our Specialists</a>
                  <a href="services.php">Clinical Services</a>
                  <a href="knowledge-centre.php">Knowledge Centre</a>
                </nav>
              </div>
            </div>

            <div class="col-md-4 col-sm-6">
              <div class="footer-links-col">
                <h6>Services</h6>
                <nav class="footer-nav-list">
                  <a href="psychiatry.php">Psychiatry</a>
                  <a href="neuropsychiatry.php">Neuropsychiatry</a>
                  <a href="counselling.php">Psychological Counselling</a>
                  <a href="online-consultation.php">Online Consultation</a>
                  <a href="onsite-consultation.php">Onsite Consultation</a>
                </nav>
              </div>
            </div>

            <div class="col-md-4 col-sm-12">
              <div class="footer-links-col">
                <h6>Legal</h6>
                <nav class="footer-nav-list">
                  <a href="privacy-policy.php">Privacy Policy</a>
                  <a href="terms.php">Terms & Conditions</a>
                  <a href="contact.php">Contact</a>
                </nav>
              </div>
            </div>
          </div>
        </div>

      </div>
      
      <div class="footer-credits text-center mt-5" data-aos="fade-up" data-aos-delay="200">
        <p>© <?php echo date('Y'); ?> Brain Mind Behaviour Neurosciences Research Institute. All rights reserved.</p>
      </div>
    </div>
  </footer>

  <!-- Floating Call & WhatsApp CTA Widgets -->
  <div class="floating-ctas">
    <a href="https://wa.me/919160366716" class="floating-cta whatsapp-float" target="_blank" title="WhatsApp Us">
      <i class="bi bi-whatsapp"></i>
    </a>
    <a href="tel:+919160366716" class="floating-cta call-float" title="Call Us">
      <i class="bi bi-telephone-fill"></i>
    </a>
  </div>

  <!-- Scroll Top -->
  <a href="#!" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js?v=<?php echo filemtime(dirname(__DIR__) . '/assets/js/main.js'); ?>"></script>
  <!-- Lead Capture Popup Modal -->
  <div class="modal fade" id="leadModal" tabindex="-1" aria-labelledby="leadModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content booking-light-theme" style="border: none; border-radius: 15px; box-shadow: 0 15px 35px rgba(0,0,0,0.2);">
        <div class="modal-header border-0 pb-0">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body px-4 px-sm-5 pb-5 pt-0">
          <div class="text-center mb-4">
            <h4 class="fw-bold text-dark mb-2" id="leadModalLabel">How can we help you?</h4>
            <p class="text-muted small mb-0">Leave your details and our team will get back to you shortly.</p>
          </div>
          <form id="leadCaptureForm">
            <div id="leadFormAlert" class="alert d-none small"></div>
            <div class="mb-3">
              <input type="text" class="form-control" name="name" placeholder="Your Name *" required>
            </div>
            <div class="mb-3">
              <input type="tel" class="form-control" name="phone" placeholder="Phone Number *" required>
            </div>
            <div class="mb-3">
              <input type="email" class="form-control" name="email" placeholder="Email Address (Optional)">
            </div>
            <div class="mb-4">
              <textarea class="form-control" name="message" rows="2" placeholder="Briefly describe your query (Optional)"></textarea>
            </div>
            <div class="d-grid">
              <button type="submit" class="btn btn-primary rounded-pill py-2 fw-bold" id="leadSubmitBtn" style="background-color: #00d9ff; border-color: #00d9ff; color: #fff; box-shadow: 0 4px 15px rgba(0, 217, 255, 0.4);">
                Request Callback
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Popup Script -->
  <script>
    document.addEventListener("DOMContentLoaded", function() {
        // Show popup after 1.5 seconds if not already shown in this session
        if (!sessionStorage.getItem('lead_popup_shown')) {
            console.log("Triggering lead popup in 1.5 seconds...");
            setTimeout(function() {
                var modalElement = document.getElementById('leadModal');
                if (modalElement) {
                    var myModal = new bootstrap.Modal(modalElement, {
                        keyboard: false
                    });
                    myModal.show();
                    sessionStorage.setItem('lead_popup_shown', 'true');
                }
            }, 1500);
        } else {
            console.log("Lead popup already shown in this session.");
        }

        // Handle form submission via AJAX
        document.getElementById('leadCaptureForm').addEventListener('submit', function(e) {
            e.preventDefault();
            var form = this;
            var submitBtn = document.getElementById('leadSubmitBtn');
            var alertBox = document.getElementById('leadFormAlert');
            
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>Sending...';
            alertBox.classList.add('d-none');
            alertBox.classList.remove('alert-success', 'alert-danger');

            var formData = new FormData(form);

            fetch('process-lead.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                alertBox.classList.remove('d-none');
                if (data.status === 'success') {
                    alertBox.classList.add('alert-success');
                    alertBox.innerHTML = data.message;
                    form.reset();
                    // Hide modal after 3 seconds on success
                    setTimeout(function() {
                        var modalInstance = bootstrap.Modal.getInstance(document.getElementById('leadModal'));
                        modalInstance.hide();
                    }, 3000);
                } else {
                    alertBox.classList.add('alert-danger');
                    alertBox.innerHTML = data.message;
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = 'Request Callback';
                }
            })
            .catch(error => {
                alertBox.classList.remove('d-none');
                alertBox.classList.add('alert-danger');
                alertBox.innerHTML = 'Network error. Please try again.';
                submitBtn.disabled = false;
                submitBtn.innerHTML = 'Request Callback';
            });
        });
    });
  </script>
</body>
</html>
