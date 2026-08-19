<?php
$siteTitle = 'Knowledge Centre | Brain Mind Behaviour Neurosciences Research Institute';
$metaDescription = 'Educational articles and resources on mental health, psychiatry, and neuroscience.';
$bodyClass = 'service-details-page';
include_once 'includes/header.php';

$articles = [
    ['title' => 'When Should Someone Consult a Psychiatrist?', 'category' => 'Mental Health Guide', 'date' => 'Recent'],
    ['title' => 'Depression vs Normal Sadness', 'category' => 'Depression', 'date' => 'Recent'],
    ['title' => 'Understanding Anxiety Disorders', 'category' => 'Anxiety', 'date' => 'Recent'],
    ['title' => 'Depression in Older Adults', 'category' => 'Geriatric Psychiatry', 'date' => 'Archive'],
    ['title' => 'Early Signs of Dementia', 'category' => 'Neuropsychiatry', 'date' => 'Archive'],
    ['title' => 'Understanding Bipolar Disorder', 'category' => 'Bipolar Disorder', 'date' => 'Archive'],
    ['title' => 'Psychiatric Symptoms in Parkinson\'s Disease', 'category' => 'Neuropsychiatry', 'date' => 'Archive'],
    ['title' => 'Addiction and De-addiction', 'category' => 'Addiction', 'date' => 'Archive'],
    ['title' => 'Schizophrenia: Early Warning Signs', 'category' => 'Psychotic Disorders', 'date' => 'Archive']
];
?>

<!-- PAGE HEADER -->
  <main class="main">

    <!-- Page Title -->
    <div class="page-title">
      <div class="heading">
        <div class="container">
          <div class="row d-flex justify-content-center text-center">
            <div class="col-lg-8">
              <h1 class="heading-title">Knowledge Centre</h1>
              <p class="mb-0">Educational resources and articles to help you understand mental health better.</p>
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

    <section class="section">
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row">
          <div class="col-lg-10 mx-auto">
            <div class="content">

<!-- ARTICLES GRID -->
<section class="py-16 lg:py-24 bg-offwhite">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php foreach ($articles as $index => $article): ?>
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm hover-card fade-up overflow-hidden flex flex-col group" style="transition-delay: <?php echo ($index % 3) * 100; ?>ms;">
                <div class="p-8 flex-grow flex flex-col">
                    <div class="flex items-center justify-between mb-4 text-xs font-semibold tracking-wider uppercase text-gray-500">
                        <span class="text-brand"><?php echo htmlspecialchars($article['category']); ?></span>
                        <span><?php echo htmlspecialchars($article['date']); ?></span>
                    </div>
                    <h3 class="mt-5 mb-4"><?php echo htmlspecialchars($article['title']); ?></h3>
                    <div class="mt-auto pt-4 border-t border-gray-100">
                        <span class="text-navy font-semibold text-sm inline-flex items-center">
                            Read Article <svg class="ml-1 w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </span>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        
        <div class="mt-16 bg-navy rounded-2xl p-8 lg:p-12 text-center text-white fade-up relative overflow-hidden">
            <div class="absolute inset-0 opacity-10">
                <svg width="100%" height="100%" xmlns="http://www.w3.org/2000/svg"><defs><pattern id="g-pattern" width="40" height="40" patternUnits="userSpaceOnUse"><path d="M0 40L40 0H20L0 20M40 40V20L20 40" stroke="white" stroke-width="1" fill="none"/></pattern></defs><rect width="100%" height="100%" fill="url(#g-pattern)"/></svg>
            </div>
            <div class="relative z-10">
                <h3 class="mt-5 mb-4">Have specific questions?</h3>
                <p class="text-gray-300 mb-8 max-w-2xl mx-auto">While our knowledge centre provides general information, the best way to understand your specific situation is through a professional consultation.</p>
                <a href="contact.php" class="inline-flex items-center justify-center px-8 py-3 bg-brand text-white font-semibold rounded-full hover:bg-teal transition-colors">
                    Contact Our Specialists
                </a>
            </div>
        </div>
    </div>
            </div>
          </div>
        </div>
      </div>
    </section>

  </main>

<?php include_once 'includes/footer.php'; ?>
