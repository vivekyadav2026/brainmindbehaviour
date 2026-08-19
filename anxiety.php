<?php
$serviceName = 'Anxiety Disorders';
$siteTitle = $serviceName . ' Treatment | Brain Mind Behaviour Neurosciences Research Institute';
$metaDescription = 'Evidence-based management of generalized anxiety, panic, and phobias in Visakhapatnam.';
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
              <p class="mb-0">Evidence-based management of generalized anxiety, panic, and phobias.</p>
            </div>
          </div>
        </div>
      </div>
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="index.php">Home</a></li>
            <li class="current"><?php echo isset($serviceName) ? htmlspecialchars($serviceName) : "Service"; ?></li>
          </ol>
        </div>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row">
          <div class="col-lg-10 mx-auto">
            <div class="content">
<img src="https://images.unsplash.com/photo-1499209974431-9dddcece7f88?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80" alt="<?php echo htmlspecialchars($serviceName); ?>" class="img-fluid rounded mb-4 shadow">
        
        <div class="content-body">
            <h2 class="mb-4">Overview</h2>
            <p>While occasional anxiety is a normal part of life, anxiety disorders involve more than temporary worry or fear. For a person with an anxiety disorder, the anxiety does not go away and can get worse over time, interfering with daily activities such as job performance, school work, and relationships.</p>
            <p>We provide comprehensive assessment and targeted interventions for a spectrum of anxiety-related conditions, including Generalized Anxiety Disorder (GAD), Panic Disorder, Social Anxiety Disorder, and specific phobias.</p>
            
            <h3 class="mt-5 mb-4">Our Treatment Approach</h3>
            <ul>
                <li>Accurate diagnostic evaluation to distinguish between different types of anxiety disorders.</li>
                <li>Prescription of safe, effective anti-anxiety medications and SSRIs/SNRIs.</li>
                <li>Psychological support and behavioral interventions.</li>
                <li>Stress management techniques and relaxation strategies.</li>
            </ul>
        </div>
        
        <div class="mt-5 p-5 bg-light rounded-4 text-center shadow-sm">
              <h3 class="mb-3">Need help?</h3>
              <p class="mb-4">Our specialists are here to provide the support and care you need.</p>
              <a href="contact.php" class="btn btn-primary btn-lg rounded-pill px-5 shadow-sm">Book an Appointment</a>
            </div>
    </div>
            </div>
          </div>
        </div>
      </div>
    </section>

  </main>

<?php include_once 'includes/footer.php'; ?>
