<?php
$serviceName = 'Depression';
$siteTitle = $serviceName . ' Treatment | Brain Mind Behaviour Neurosciences Research Institute';
$metaDescription = 'Comprehensive evaluation and treatment plans for clinical depression in Visakhapatnam.';
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
              <p class="mb-0">Comprehensive evaluation and treatment plans for clinical depression.</p>
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
<img src="https://images.unsplash.com/photo-1576091160550-2173dba999ef?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80" alt="<?php echo htmlspecialchars($serviceName); ?>" class="img-fluid rounded mb-4 shadow">
        
        <div class="content-body">
            <h2 class="mb-4">Overview</h2>
            <p>Depression is more than just feeling sad or going through a rough patch. It’s a serious mental health condition that requires understanding, medical care, and continuous support. It affects how you feel, think, and handle daily activities.</p>
            <p>At Brain Mind Behaviour Neurosciences Research Institute, we provide comprehensive, personalized treatment for Major Depressive Disorder (MDD) and related depressive conditions.</p>
            
            <h3 class="mt-5 mb-4">Our Treatment Approach</h3>
            <ul>
                <li>Thorough clinical assessment to determine the type and severity of depression.</li>
                <li>Evidence-based pharmacotherapy tailored to the individual's specific symptoms and medical history.</li>
                <li>Referrals for cognitive-behavioral therapy (CBT) and other counseling methodologies.</li>
                <li>Lifestyle and wellness guidance to support recovery and prevent relapse.</li>
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
