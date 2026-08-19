<?php
$serviceName = 'Bipolar Disorder';
$siteTitle = $serviceName . ' Treatment | Brain Mind Behaviour Neurosciences Research Institute';
$metaDescription = 'Specialized care for mood stabilization and long-term management of Bipolar Disorder.';
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
              <p class="mb-0">Specialized care for mood stabilization and long-term management.</p>
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
<img src="https://images.unsplash.com/photo-1579208570378-8c970854bc23?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80" alt="<?php echo htmlspecialchars($serviceName); ?>" class="img-fluid rounded mb-4 shadow">
        
        <div class="content-body">
            <h2 class="mb-4">Overview</h2>
            <p>Bipolar disorder, formerly called manic depression, is a mental health condition that causes extreme mood swings that include emotional highs (mania or hypomania) and lows (depression).</p>
            <p>Managing Bipolar Disorder requires expertise in psychopharmacology and a nuanced understanding of mood cycles. Our institute provides expert, ongoing care to help patients achieve and maintain mood stability.</p>
            
            <h3 class="mt-5 mb-4">Our Treatment Approach</h3>
            <ul>
                <li>Expert diagnostic assessment to accurately classify the subtype of bipolar disorder.</li>
                <li>Careful prescription and monitoring of mood stabilizers, atypical antipsychotics, and other medications.</li>
                <li>Psychoeducation for patients and families to recognize early warning signs of mood episodes.</li>
                <li>Long-term treatment planning to prevent relapse and support a high quality of life.</li>
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
