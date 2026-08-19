<?php
$serviceName = 'Schizophrenia & Psychotic Disorders';
$siteTitle = $serviceName . ' Treatment | Brain Mind Behaviour Neurosciences Research Institute';
$metaDescription = 'Advanced pharmacological and psychosocial interventions for Schizophrenia and Psychotic Disorders.';
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
              <p class="mb-0">Advanced pharmacological and psychosocial interventions.</p>
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
<img src="https://images.unsplash.com/photo-1582213782179-e0d53f98f2ca?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80" alt="<?php echo htmlspecialchars($serviceName); ?>" class="img-fluid rounded mb-4 shadow">
        
        <div class="content-body">
            <h2 class="mb-4">Overview</h2>
            <p>Schizophrenia is a serious mental disorder in which people interpret reality abnormally. It may result in some combination of hallucinations, delusions, and extremely disordered thinking and behavior that impairs daily functioning.</p>
            <p>Early intervention and consistent, expert care are vital. We offer state-of-the-art pharmacological treatments and supportive care designed to manage symptoms and improve the patient's functional abilities.</p>
            
            <h3 class="mt-5 mb-4">Our Treatment Approach</h3>
            <ul>
                <li>Comprehensive diagnostic evaluations and continuous symptom monitoring.</li>
                <li>Prescription of modern antipsychotic medications with a focus on minimizing side effects.</li>
                <li>Family psychoeducation to build a strong support system.</li>
                <li>Focus on rehabilitation and improving the patient's social and occupational functioning.</li>
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
