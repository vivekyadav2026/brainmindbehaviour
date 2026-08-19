<?php
$siteTitle = 'Services | Brain Mind Behaviour Neurosciences Research Institute';
$metaDescription = 'Comprehensive psychiatric, neuropsychiatric, and psychological services in Visakhapatnam.';
$bodyClass = 'services-page';
include_once 'includes/header.php';

$services = [
    [
        'title' => 'Psychiatry',
        'desc' => 'Comprehensive evaluation, diagnosis, and medical management of mental health conditions.',
        'icon' => 'fas fa-brain',
        'img' => 'https://images.unsplash.com/photo-1559839734-2b71ea197ec2?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
        'link' => 'psychiatry.php',
        'features' => ['Diagnosis', 'Medical Management']
    ],
    [
        'title' => 'Neuropsychiatry',
        'desc' => 'Specialized care for mental disorders associated with nervous system diseases.',
        'icon' => 'bi-activity',
        'img' => 'https://images.unsplash.com/photo-1559757175-5700dde675bc?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
        'link' => 'neuropsychiatry.php',
        'features' => ['Neurological Assessment', 'Behavioral Care']
    ],
    [
        'title' => 'Depression',
        'desc' => 'Evidence-based treatment plans for Major Depressive Disorder and related conditions.',
        'icon' => 'bi-cloud-sun',
        'img' => 'https://images.unsplash.com/photo-1493836512294-502baa1986e2?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
        'link' => 'depression.php',
        'features' => ['Therapy', 'Medication']
    ],
    [
        'title' => 'Anxiety Disorders',
        'desc' => 'Therapeutic and medical interventions for panic attacks, GAD, phobias, and OCD.',
        'icon' => 'bi-wind',
        'img' => 'https://images.unsplash.com/photo-1528716321680-815a8cdb8c53?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
        'link' => 'anxiety.php',
        'features' => ['Panic Attacks', 'OCD Treatment']
    ],
    [
        'title' => 'Bipolar Disorder',
        'desc' => 'Long-term management strategies for mood stabilization and relapse prevention.',
        'icon' => 'bi-arrow-left-right',
        'img' => 'https://images.unsplash.com/photo-1474418397713-7ede21d49118?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
        'link' => 'bipolar-disorder.php',
        'features' => ['Mood Stabilization', 'Relapse Prevention']
    ],
    [
        'title' => 'Schizophrenia',
        'desc' => 'Comprehensive care including antipsychotic medication management and family counseling.',
        'icon' => 'bi-people',
        'img' => 'https://images.unsplash.com/photo-1573497620053-ea5300f94f21?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
        'link' => 'schizophrenia.php',
        'features' => ['Medication Management', 'Family Support']
    ],
    [
        'title' => 'Addiction',
        'desc' => 'De-addiction programs for alcohol, substance abuse, and behavioral addictions.',
        'icon' => 'bi-capsule',
        'img' => 'https://images.unsplash.com/photo-1563213126-a4273aed2016?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
        'link' => 'addiction.php',
        'features' => ['De-addiction Programs', 'Rehabilitation']
    ],
    [
        'title' => 'Dementia',
        'desc' => 'Memory care, cognitive assessments, and support strategies for patients and caregivers.',
        'icon' => 'bi-clock-history',
        'img' => 'https://images.unsplash.com/photo-1505576399279-565b52d4ac71?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
        'link' => 'dementia.php',
        'features' => ['Memory Care', 'Cognitive Assessments']
    ],
    [
        'title' => 'Psychological Counselling',
        'desc' => 'Individual therapy, CBT, and stress management for various life challenges.',
        'icon' => 'bi-chat-heart',
        'img' => 'https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
        'link' => 'counselling.php',
        'features' => ['CBT', 'Stress Management']
    ]
];
?>

  <main class="main">

    <!-- Page Title -->
    <div class="page-title">
      <div class="heading">
        <div class="container">
          <div class="row d-flex justify-content-center text-center">
            <div class="col-lg-8">
              <h1 class="heading-title">Clinical Services</h1>
              <p class="mb-0">
                Comprehensive, evidence-based care tailored to your unique psychological and psychiatric needs.
              </p>
            </div>
          </div>
        </div>
      </div>
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="index.php">Home</a></li>
            <li class="current">Services</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Page Title -->

    <!-- Services Section -->
    <section id="services" class="services section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <?php foreach ($services as $index => $service): ?>
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="<?php echo 200 + ($index % 3) * 50; ?>">
            <div class="service-item position-relative" style="height: 100%; display: flex; flex-direction: column; overflow: hidden; border-radius: 20px;">
              <div class="service-image position-relative">
                <img src="<?php echo $service['img']; ?>" alt="<?php echo $service['title']; ?>" class="img-fluid w-100" style="height: 250px; object-fit: cover;">
                <div class="position-absolute top-0 start-0 w-100 h-100" style="background: linear-gradient(to bottom, transparent, rgba(0, 8, 28, 0.9)); pointer-events: none;"></div>
                <div class="service-overlay position-absolute" style="bottom: -25px; right: 20px; background: rgba(0, 8, 28, 0.9); border: 1px solid rgba(0, 217, 255, 0.3); width: 60px; height: 60px; border-radius: 50%; display: flex; align-items: center; justify-content: center; box-shadow: 0 0 20px rgba(0, 217, 255, 0.2); backdrop-filter: blur(10px); z-index: 2;">
                  <?php if (strpos($service['icon'], 'fa') === 0): ?>
                    <i class="<?php echo $service['icon']; ?>" style="font-size: 1.5rem; color: #00d9ff; filter: drop-shadow(0 0 5px rgba(0,217,255,0.5));"></i>
                  <?php else: ?>
                    <i class="bi <?php echo $service['icon']; ?>" style="font-size: 1.8rem; color: #00d9ff; filter: drop-shadow(0 0 5px rgba(0,217,255,0.5));"></i>
                  <?php endif; ?>
                </div>
              </div>
              <div class="service-content position-relative z-1" style="flex-grow: 1; display: flex; flex-direction: column; padding: 30px; background: transparent;">
                <h3 style="font-size: 1.5rem; font-weight: 700; margin-bottom: 15px; color: #ffffff;"><?php echo $service['title']; ?></h3>
                <p style="flex-grow: 1; color: #b0c4de; font-size: 0.95rem; line-height: 1.6;"><?php echo $service['desc']; ?></p>
                <div class="service-features mt-3 mb-4">
                  <?php foreach ($service['features'] as $feature): ?>
                  <span class="feature-item d-block mb-2" style="font-size: 0.9rem; color: #b0c4de;"><i class="bi bi-check2" style="color: #00d9ff; margin-right: 8px; filter: drop-shadow(0 0 3px rgba(0,217,255,0.5));"></i> <?php echo $feature; ?></span>
                  <?php endforeach; ?>
                </div>
                <a href="<?php echo $service['link']; ?>" class="service-btn mt-auto d-inline-flex align-items-center" style="color: #00d9ff; font-weight: 600; font-size: 0.95rem; text-decoration: none; transition: all 0.3s ease;">
                  <span style="border-bottom: 1px solid transparent; transition: border-color 0.3s;">Learn More</span>
                  <i class="bi bi-arrow-right ms-2" style="transition: transform 0.3s;"></i>
                </a>
              </div>
            </div>
          </div><!-- End Service Item -->
          <?php endforeach; ?>

        </div>

      </div>

    </section><!-- /Services Section -->

  </main>

<?php include_once 'includes/footer.php'; ?>
