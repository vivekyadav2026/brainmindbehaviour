<?php
$siteTitle = 'Knowledge Centre | Brain Mind Behaviour Neurosciences Research Institute';
$metaDescription = 'Educational articles and resources on mental health, psychiatry, and neuroscience.';
$bodyClass = 'services-page';
include_once 'includes/header.php';

$articles = [
    ['title' => 'When Should Someone Consult a Psychiatrist?', 'category' => 'Mental Health Guide', 'date' => 'Recent', 'desc' => 'Recognizing early warning signs of mental distress and when to seek professional medical help.'],
    ['title' => 'Depression vs Normal Sadness', 'category' => 'Depression', 'date' => 'Recent', 'desc' => 'Understanding the core differences between temporary emotional lows and clinical depression.'],
    ['title' => 'Understanding Anxiety Disorders', 'category' => 'Anxiety', 'date' => 'Recent', 'desc' => 'A guide to panic attacks, phobias, OCD, and when anxiety becomes a medical condition.'],
    ['title' => 'Depression in Older Adults', 'category' => 'Geriatric Psychiatry', 'date' => 'Archive', 'desc' => 'Identifying late-life mood changes, memory issues, and addressing clinical depression in seniors.'],
    ['title' => 'Early Signs of Dementia', 'category' => 'Neuropsychiatry', 'date' => 'Archive', 'desc' => 'Key indicators of cognitive decline, Alzheimer\'s transitions, and early diagnostic screening.'],
    ['title' => 'Understanding Bipolar Disorder', 'category' => 'Bipolar Disorder', 'date' => 'Archive', 'desc' => 'Differentiating manic and depressive mood cycles, and long-term stabilization plans.'],
    ['title' => 'Psychiatric Symptoms in Parkinson\'s Disease', 'category' => 'Neuropsychiatry', 'date' => 'Archive', 'desc' => 'Managing the behavioral, emotional, and cognitive manifestations of Parkinson\'s illness.'],
    ['title' => 'Addiction and De-addiction', 'category' => 'Addiction', 'date' => 'Archive', 'desc' => 'Understanding chemical dependency, outpatient detox, and cognitive rehabilitation.'],
    ['title' => 'Schizophrenia: Early Warning Signs', 'category' => 'Psychotic Disorders', 'date' => 'Archive', 'desc' => 'Spotting early indicators of psychotic transitions and the importance of early intervention.']
];
?>

  <main class="main">

    <!-- Page Title -->
    <div class="page-title">
      <div class="heading">
        <div class="container">
          <div class="row d-flex justify-content-center text-center">
            <div class="col-lg-8">
              <h1 class="heading-title">Knowledge Centre</h1>
              <p class="mb-0">Educational resources and clinical articles to help you understand neurosciences and mental health.</p>
            </div>
          </div>
        </div>
      </div>
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="index.php">Home</a></li>
            <li class="current">Knowledge Centre</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Page Title -->

    <!-- Articles Section -->
    <section class="section py-5">
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        
        <div class="row gy-4">
          <?php foreach ($articles as $index => $article): ?>
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="<?php echo ($index % 3) * 100; ?>">
            <div class="knowledge-card h-100 d-flex flex-column">
              <div class="card-content p-4 flex-grow-1 d-flex flex-column">
                
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <span class="category-tag"><?php echo htmlspecialchars($article['category']); ?></span>
                  <span class="date-tag text-muted small"><?php echo htmlspecialchars($article['date']); ?></span>
                </div>
                
                <h4 class="card-title fw-bold mb-3"><?php echo htmlspecialchars($article['title']); ?></h4>
                <p class="card-desc text-muted small mb-4 flex-grow-1"><?php echo htmlspecialchars($article['desc']); ?></p>
                
                <div class="card-action mt-auto pt-3 border-top border-light">
                  <a href="contact.php" class="read-link text-decoration-none d-inline-flex align-items-center gap-2 fw-semibold">
                    <span>Consult Specialists</span>
                    <i class="bi bi-arrow-right"></i>
                  </a>
                </div>
                
              </div>
            </div>
          </div>
          <?php endforeach; ?>
        </div>

        <!-- Contact Banner Card -->
        <div class="row mt-5 pt-4">
          <div class="col-lg-12">
            <div class="call-to-action text-center">
              <div class="content-wrapper" data-aos="fade-up">
                <h2 class="mb-3">Have specific questions?</h2>
                <p class="mb-4">While our knowledge centre provides general information, the best way to understand your specific situation is through a professional consultation.</p>
                <a href="contact.php" class="btn btn-primary px-4 py-2">
                  <span>Contact Our Specialists</span>
                  <i class="bi bi-arrow-right ms-2"></i>
                </a>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section>

  </main>

<?php include_once 'includes/footer.php'; ?>
