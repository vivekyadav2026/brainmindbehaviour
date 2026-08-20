<?php
$siteTitle = 'Book Appointment | Brain Mind Behaviour Neurosciences Research Institute';
$metaDescription = 'Book an onsite clinic visit or an online video consultation securely with our specialists.';
$bodyClass = 'service-details-page';
include_once 'includes/header.php';
?>

<!-- Add Light Theme Class explicitly to Main container so it overlays the dark neural background cleanly -->
<main class="main booking-light-theme">

    <section class="py-5" style="min-height: 90vh;">
      <div class="container" data-aos="fade-up">
        
        <div class="text-center mb-5">
            <h1 class="display-5 fw-bold text-dark mb-3">Book an Appointment</h1>
            <p class="lead text-muted mx-auto" style="max-width: 600px;">
                Secure your consultation with our specialists. You can choose to visit us in person at our Visakhapatnam clinic or consult with us securely online via video call.
            </p>
        </div>

        <div class="row align-items-stretch justify-content-center">
            
            <!-- Left Info Panel -->
            <div class="col-lg-5 mb-4 mb-lg-0">
                <div class="bg-white p-4 p-md-5 rounded shadow-sm h-100 border border-light">
                    <h3 class="fw-bold mb-4">Consultation Options</h3>
                    
                    <div class="d-flex mb-4">
                        <div class="me-3">
                            <i class="fas fa-hospital text-primary fs-3"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold mb-1">On-Site Clinic Visit</h5>
                            <p class="text-muted small mb-0">Visit our modern facility in Visakhapatnam for a comprehensive, in-person clinical assessment.</p>
                        </div>
                    </div>
                    
                    <div class="d-flex mb-5">
                        <div class="me-3">
                            <i class="fas fa-video text-primary fs-3"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold mb-1">Online Video Consultation</h5>
                            <p class="text-muted small mb-0">Speak with our specialists from the comfort of your home via our secure HD video platform.</p>
                        </div>
                    </div>

                    <div class="p-4 rounded" style="background-color: #f8fafc; border-left: 4px solid #00d9ff;">
                        <h6 class="fw-bold mb-2">Clinic Location</h6>
                        <p class="text-dark fw-bold mb-1 small">Brain Mind Behaviour Neurosciences Research Institute</p>
                        <p class="text-muted mb-0 small">101, Coastal Park Apartments,<br>Coastal Battery Road,<br>Opposite Naval Coastal Battery,<br>Maharani Peta, Visakhapatnam,<br>Andhra Pradesh – 530002</p>
                    </div>
                </div>
            </div>
            
            <!-- Right Booking Form Panel -->
            <div class="col-lg-6">
                <div class="bg-white rounded p-4 p-md-5 shadow-sm border border-light h-100">
                    <div class="mb-4">
                        <h4 class="fw-bold mb-2">Patient Details</h4>
                        <p class="text-muted small">Fill in the form below to initiate your booking.</p>
                    </div>
                    
                    <form action="process-booking.php" method="POST">
                        
                        <div class="mb-4">
                            <label class="form-label fw-bold small text-muted">Consultation Type</label>
                            <select class="form-select form-select-lg" name="appointment_type" required>
                                <option value="" selected disabled>Select Consultation Type</option>
                                <option value="onsite">On-Site (At Clinic)</option>
                                <option value="online">Online (Video Call)</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold small text-muted">Full Name</label>
                            <input type="text" class="form-control" name="patient_name" placeholder="E.g. John Doe" required>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label fw-bold small text-muted">Phone Number (WhatsApp)</label>
                            <input type="tel" class="form-control" name="patient_phone" placeholder="+91 XXXXX XXXXX" required>
                        </div>
                        
                        <div class="mb-4">
                            <label class="form-label fw-bold small text-muted">Email Address (Optional)</label>
                            <input type="email" class="form-control" name="patient_email" placeholder="john@example.com">
                        </div>
                        
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <label class="form-label fw-bold small text-muted">Preferred Date</label>
                                <input type="date" class="form-control" name="appointment_date" min="<?php echo date('Y-m-d', strtotime('+1 day')); ?>" required>
                            </div>
                            <div class="col-md-6 mt-3 mt-md-0">
                                <label class="form-label fw-bold small text-muted">Preferred Time</label>
                                <select class="form-select" name="appointment_time" required>
                                    <option value="" selected disabled>Select Time</option>
                                    <option value="10:00 AM">10:00 AM - 11:00 AM</option>
                                    <option value="11:30 AM">11:30 AM - 12:30 PM</option>
                                    <option value="02:00 PM">02:00 PM - 03:00 PM</option>
                                    <option value="04:00 PM">04:00 PM - 05:00 PM</option>
                                    <option value="06:00 PM">06:00 PM - 07:00 PM</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="d-grid mt-2">
                            <button type="submit" class="btn btn-primary btn-lg rounded-pill fw-bold" style="background-color: #0d6efd; border-color: #0d6efd; box-shadow: 0 4px 15px rgba(13, 110, 253, 0.3);">
                                <i class="fas fa-lock me-2"></i> Proceed to Secure Payment
                            </button>
                        </div>
                        <p class="text-center text-muted small mt-3 mb-0">
                            <i class="fas fa-shield-alt text-success me-1"></i> SSL Secured Payment via Razorpay
                        </p>
                    </form>
                </div>
            </div>
            
        </div>
      </div>
    </section>

</main>

<?php include_once 'includes/footer.php'; ?>
