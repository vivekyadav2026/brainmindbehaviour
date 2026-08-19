<?php
$siteTitle = 'Online Consultation | Brain Mind Behaviour Neurosciences Research Institute';
$metaDescription = 'Consult with our mental health specialists remotely from the comfort of your home via secure video consultation.';
$bodyClass = 'service-details-page';
include_once 'includes/header.php';
?>

<!-- HEADER -->
  <main class="main">

    <!-- Page Title -->
    <div class="page-title">
      <div class="heading">
        <div class="container">
          <div class="row d-flex justify-content-center text-center">
            <div class="col-lg-8">
              <h1 class="heading-title">Online Consultation</h1>
              <p class="mb-0">Expert care from the comfort and privacy of your home.</p>
            </div>
          </div>
        </div>
      </div>
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="index.php">Home</a></li>
            <li class="current">Online Consultation</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row">
          <div class="col-lg-10 mx-auto">
            <div class="content">

<!-- CONTENT -->
<section class="py-5 bg-light rounded px-3 px-md-4">
    <div class="container-fluid px-0">
        <div class="row align-items-start">
            <div class="col-lg-6 mb-4 mb-lg-0" data-aos="fade-up">
                <h2 class="mb-4">Telepsychiatry Services</h2>
                
                <p class="text-muted mb-4">
                    We understand that visiting a clinic may not always be feasible. Our online consultation services (telepsychiatry) allow you to consult with our expert psychiatrists and psychologists securely via video call.
                </p>
                <p class="text-muted mb-4">
                    This service is ideal for follow-up appointments, counseling sessions, and initial assessments where physical examination is not strictly required.
                </p>
                
                <div class="bg-white p-4 rounded shadow-sm mt-4 border-start border-4 border-primary">
                    <h4 class="mb-3">How it works</h4>
                    <ol class="mb-0 ps-3">
                        <li class="mb-2">Fill out the booking form with your details and preferred date.</li>
                        <li class="mb-2">Complete the secure online payment.</li>
                        <li class="mb-2">Receive confirmation and a secure link for your video consultation.</li>
                    </ol>
                </div>
            </div>
            
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                <div class="bg-white rounded p-4 p-md-5 shadow-sm border border-light">
                    <div class="text-center mb-4">
                        <h3 class="mb-2">Book Your Online Session</h3>
                        <p class="text-muted small">Fill in your details below to schedule.</p>
                    </div>
                    
                    <form action="process-booking.php" method="POST">
                        <input type="hidden" name="appointment_type" value="online">
                        <div class="mb-3">
                            <label class="form-label">Full Name</label>
                            <input type="text" class="form-control" name="patient_name" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Phone Number (WhatsApp)</label>
                            <input type="tel" class="form-control" name="patient_phone" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email Address (Optional)</label>
                            <input type="email" class="form-control" name="patient_email">
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Preferred Date</label>
                                <input type="date" class="form-control" name="appointment_date" min="<?php echo date('Y-m-d', strtotime('+1 day')); ?>" required>
                            </div>
                            <div class="col-md-6 mt-3 mt-md-0">
                                <label class="form-label">Preferred Time</label>
                                <select class="form-select" name="appointment_time" required>
                                    <option value="">Select Time</option>
                                    <option value="10:00 AM">10:00 AM - 11:00 AM</option>
                                    <option value="11:30 AM">11:30 AM - 12:30 PM</option>
                                    <option value="02:00 PM">02:00 PM - 03:00 PM</option>
                                    <option value="04:00 PM">04:00 PM - 05:00 PM</option>
                                </select>
                            </div>
                        </div>
                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-primary btn-lg">Proceed to Payment</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
            </div>
          </div>
        </div>
      </div>
    </section>

  </main>

<?php include_once 'includes/footer.php'; ?>
