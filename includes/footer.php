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

            <!-- Social Media Links -->
            <div class="footer-social-links mt-4 d-flex gap-3">
              <a href="https://www.instagram.com/brainmindbehaviour/" target="_blank" class="social-link-item" title="Instagram">
                <i class="fab fa-instagram"></i>
              </a>
              <a href="https://youtube.com/@brainmindbehaviour?si=7NiSYwRuUeBvNEqB" target="_blank" class="social-link-item" title="YouTube">
                <i class="fab fa-youtube"></i>
              </a>
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
  <!-- Custom Book an Appointment Popup Modal -->
  <div class="modal fade" id="appointmentModal" tabindex="-1" aria-labelledby="appointmentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 400px;">
      <div class="modal-content appointment-modal-card position-relative border-0" style="border-radius: 20px; background: #ffffff; box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2); padding: 16px 18px 20px 18px;">
        
        <!-- Custom Circular Close Button -->
        <button type="button" class="btn-close-custom" data-bs-dismiss="modal" aria-label="Close">
          <i class="fas fa-times"></i>
        </button>

        <div class="modal-body p-1 p-sm-2">
          <div class="text-center mb-3">
            <h5 class="appointment-modal-title fw-bold mb-0" id="appointmentModalLabel">
              BOOK AN APPOINTMENT
            </h5>
          </div>

          <!-- Alert Container for AJAX Responses -->
          <div id="appointmentAlert" class="alert d-none mb-2 py-2 px-3 small" role="alert"></div>

          <form id="appointmentForm">
            <!-- 1. Consultation Type -->
            <div class="mb-2">
              <label class="appointment-field-label">Consultation Type</label>
              <select name="consultation_type" class="form-select appointment-modal-input" required>
                <option value="" disabled selected>Select Consultation</option>
                <option value="Online Consultation">Online Consultation</option>
                <option value="Onsite Consultation">Onsite Consultation</option>
              </select>
            </div>

            <!-- 2. Name -->
            <div class="mb-2">
              <label class="appointment-field-label">Name</label>
              <input type="text" name="name" class="form-control appointment-modal-input" placeholder="Your Name" required>
            </div>

            <!-- 3. Preferred Location -->
            <div class="mb-2">
              <label class="appointment-field-label">Preferred Location</label>
              <select name="location" class="form-select appointment-modal-input" required>
                <option value="" disabled selected>Select Location</option>
                <option value="Visakhapatnam (Maharani Peta)">Visakhapatnam (Maharani Peta)</option>
                <option value="Online (Video Call)">Online (Video Call)</option>
              </select>
            </div>

            <!-- 4. Contact No. -->
            <div class="mb-2">
              <label class="appointment-field-label">Contact No.</label>
              <input type="tel" name="phone" class="form-control appointment-modal-input" placeholder="Your Number" required pattern="[0-9+\s\-]{8,15}">
            </div>

            <!-- 5. Consult a Psychiatrist or Psychologist -->
            <div class="mb-3">
              <label class="appointment-field-label">Consult a Psychiatrist or Psychologist</label>
              <select name="specialist" class="form-select appointment-modal-input" required>
                <option value="" disabled selected>Select</option>
                <option value="Psychiatrist">Psychiatrist</option>
                <option value="Psychologist">Psychologist</option>
                <option value="Dr. Ramanand Satapathy (Psychiatrist)">Dr. Ramanand Satapathy (Psychiatrist)</option>
                <option value="Dr. Suprriya Satapathy (Psychiatrist)">Dr. Suprriya Satapathy (Psychiatrist)</option>
                <option value="Mr. Dev Satapathy (Psychologist)">Mr. Dev Satapathy (Psychologist)</option>
              </select>
            </div>

            <!-- 6. Privacy Policy Checkbox -->
            <div class="form-check d-flex align-items-center justify-content-center gap-2 mb-3">
              <input class="form-check-input mt-0" type="checkbox" id="appointmentPrivacyCheck" required style="width: 16px; height: 16px; cursor: pointer;" checked>
              <label class="form-check-label" for="appointmentPrivacyCheck" style="color: #334155; font-size: 13px;">
                I agree to the <a href="privacy-policy.php" target="_blank" style="color: #353e8d; text-decoration: underline; font-weight: 600;">Privacy Policy</a>
              </label>
            </div>

            <!-- 7. Submit Button -->
            <div class="text-center">
              <button type="submit" class="btn btn-appointment-submit" id="appointmentSubmitBtn">
                SUBMIT
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Custom Compact Styles for Appointment Modal -->
  <style>
    .btn-close-custom {
      position: absolute;
      top: 10px;
      right: 10px;
      width: 32px;
      height: 32px;
      border-radius: 50%;
      border: 2px solid #64748b;
      background: #ffffff;
      color: #334155;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 14px;
      cursor: pointer;
      z-index: 10;
      transition: all 0.2s ease;
      padding: 0;
    }
    .btn-close-custom:hover {
      background: #f1f5f9;
      color: #0f172a;
      border-color: #334155;
    }
    .appointment-modal-title {
      color: #2b347b;
      font-weight: 800;
      font-size: 18px;
      letter-spacing: 0.5px;
      line-height: 1.2;
      text-transform: uppercase;
    }
    .appointment-field-label {
      color: #2b347b;
      font-weight: 700;
      font-size: 13.5px;
      margin-bottom: 3px;
      display: block;
    }
    .appointment-modal-input {
      border: 1.5px solid #cbd5e1 !important;
      border-radius: 10px !important;
      height: 40px !important;
      padding: 6px 12px !important;
      font-size: 14px !important;
      font-weight: 500 !important;
      color: #0f172a !important;
      background-color: #ffffff !important;
      box-shadow: none !important;
    }
    .appointment-modal-input:focus {
      border-color: #2b347b !important;
      box-shadow: 0 0 0 3px rgba(43, 52, 123, 0.15) !important;
      color: #0f172a !important;
      background-color: #ffffff !important;
    }
    .appointment-modal-input::placeholder {
      color: #64748b !important;
      opacity: 1 !important;
      font-weight: 400 !important;
    }
    /* Explicit Option Styles for Dark Visible Text in Select Dropdowns */
    .appointment-modal-input option {
      color: #0f172a !important;
      background: #ffffff !important;
      background-color: #ffffff !important;
      font-weight: 500 !important;
      padding: 8px 12px !important;
    }
    .appointment-modal-input option:hover,
    .appointment-modal-input option:focus,
    .appointment-modal-input option:active,
    .appointment-modal-input option:checked {
      background: #cbd5e1 !important;
      background-color: #cbd5e1 !important;
      color: #000000 !important;
      font-weight: 700 !important;
    }
    .btn-appointment-submit {
      background-color: #2b347b !important;
      color: #ffffff !important;
      font-weight: 700 !important;
      font-size: 14px !important;
      letter-spacing: 1px !important;
      padding: 9px 38px !important;
      border-radius: 25px !important;
      border: none !important;
      box-shadow: 0 4px 15px rgba(43, 52, 123, 0.35) !important;
      transition: all 0.3s ease !important;
      width: auto !important;
      min-width: 150px !important;
    }
    .btn-appointment-submit:hover {
      background-color: #1e265c !important;
      color: #ffffff !important;
      transform: translateY(-1px) !important;
      box-shadow: 0 6px 20px rgba(43, 52, 123, 0.45) !important;
    }

    /* Mobile View Modal Container Centering Styles */
    @media (max-width: 576px) {
      .modal-dialog {
        display: flex !important;
        align-items: center !important;
        min-height: calc(100vh - 1rem) !important;
        margin: 0.5rem auto !important;
        max-width: 92% !important;
      }
      .appointment-modal-card {
        width: 100% !important;
        padding: 18px 16px !important;
        margin: 0 auto !important;
      }
      .appointment-modal-title {
        text-align: center !important;
        font-size: 17px !important;
      }
      .appointment-field-label {
        text-align: left !important;
        width: 100% !important;
      }
      .appointment-modal-input {
        text-align: left !important;
        text-align-last: left !important;
      }
      .appointment-modal-input::placeholder {
        text-align: left !important;
      }
      .appointment-modal-input option {
        text-align: left !important;
      }
      .form-check {
        justify-content: center !important;
      }
    }
  </style>

  <!-- Appointment Modal Script -->
  <script>
    document.addEventListener("DOMContentLoaded", function() {
        // Auto show modal popup after 2 seconds if not already shown in session
        if (!sessionStorage.getItem('appointment_popup_shown')) {
            setTimeout(function() {
                var modalElement = document.getElementById('appointmentModal');
                if (modalElement) {
                    var myModal = new bootstrap.Modal(modalElement);
                    myModal.show();
                    sessionStorage.setItem('appointment_popup_shown', 'true');
                }
            }, 2000);
        }

        // Handle Appointment Form Submission via AJAX
        var form = document.getElementById('appointmentForm');
        if (form) {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                
                var submitBtn = document.getElementById('appointmentSubmitBtn');
                var alertBox = document.getElementById('appointmentAlert');
                
                var formData = new FormData(form);
                
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>SUBMITTING...';
                alertBox.classList.add('d-none');
                
                fetch('process-lead.php', {
                    method: 'POST',
                    body: formData
                })
                .then(function(res) { return res.json(); })
                .then(function(data) {
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = 'SUBMIT';
                    
                    if (data.status === 'success') {
                        alertBox.className = 'alert alert-success mb-3 small';
                        alertBox.innerHTML = '<i class="fas fa-check-circle me-1"></i> ' + data.message;
                        alertBox.classList.remove('d-none');
                        form.reset();
                        
                        setTimeout(function() {
                            var modalInstance = bootstrap.Modal.getInstance(document.getElementById('appointmentModal'));
                            if (modalInstance) {
                                modalInstance.hide();
                            }
                        }, 2500);
                    } else {
                        alertBox.className = 'alert alert-danger mb-3 small';
                        alertBox.innerHTML = '<i class="fas fa-exclamation-triangle me-1"></i> ' + (data.message || 'An error occurred.');
                        alertBox.classList.remove('d-none');
                    }
                })
                .catch(function(err) {
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = 'SUBMIT';
                    alertBox.className = 'alert alert-danger mb-3 small';
                    alertBox.innerHTML = '<i class="fas fa-exclamation-triangle me-1"></i> Unable to submit request. Please try again.';
                    alertBox.classList.remove('d-none');
                });
            });
        }
    });
  </script>
</body>
</html>
