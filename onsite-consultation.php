<?php
$siteTitle = 'Onsite Consultation | Brain Mind Behaviour Neurosciences Research Institute';
$metaDescription = 'Visit our clinic in Visakhapatnam for a comprehensive in-person mental health assessment.';
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
              <h1 class="heading-title">Onsite Consultation</h1>
              <p class="mb-0">Comprehensive in-person care at our modern clinic in Visakhapatnam.</p>
            </div>
          </div>
        </div>
      </div>
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="index.php">Home</a></li>
            <li class="current">Onsite Consultation</li>
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
<section class="py-5 bg-light">
    <div class="container">
        <div class="row align-items-start">
            <div class="col-lg-6 mb-4 mb-lg-0" data-aos="fade-up">
                <h2 class="mb-4">Visit Our Clinic</h2>
                
                <p class="text-muted mb-4">
                    For comprehensive psychiatric assessments, detailed neuropsychiatric evaluations, and in-depth psychological counseling, we recommend an in-person consultation at our facility.
                </p>
                <p class="text-muted mb-4">
                    Our clinic is designed to provide a calm, welcoming, and strictly confidential environment for all our patients.
                </p>
                
                <div class="bg-white p-4 rounded shadow-sm mt-4 border-start border-4 border-primary">
                    <h4 class="mb-3">Clinic Location</h4>
                    <p class="text-dark fw-bold mb-1">Brain Mind Behaviour Neurosciences Research Institute</p>
                    <p class="text-muted mb-0">101, Coastal Park Apartments,<br>Coastal Battery Road,<br>Opposite Naval Coastal Battery,<br>Maharani Peta, Visakhapatnam,<br>Andhra Pradesh – 530002</p>
                </div>
            </div>
            
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                <div class="bg-white rounded p-4 p-md-5 shadow-sm border border-light">
                    <div class="text-center mb-4">
                        <h3 class="mb-2">Book Your Visit</h3>
                        <p class="text-muted small">Fill in your details below to schedule an appointment.</p>
                    </div>
                    
                    <form action="process-booking.php" method="POST">
                        <input type="hidden" name="appointment_type" value="onsite">
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
                                    <option value="06:00 PM">06:00 PM - 07:00 PM</option>
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
