<?php
// Prevent browser caching of HTML/PHP pages
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");

// includes/header.php
$siteTitle = $siteTitle ?? 'Brain Mind Behaviour Neurosciences Research Institute';
$metaDescription = $metaDescription ?? 'Specialist psychiatric, neuropsychiatric and psychological care for individuals and families in Visakhapatnam.';
$bodyClass = $bodyClass ?? 'index-page';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title><?php echo htmlspecialchars($siteTitle); ?></title>
  <meta name="description" content="<?php echo htmlspecialchars($metaDescription); ?>">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800;900&family=Outfit:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File with Absolute Path Cache Buster -->
  <link href="assets/css/main.css?v=<?php echo filemtime(dirname(__DIR__) . '/assets/css/main.css'); ?>" rel="stylesheet">
</head>
<body class="<?php echo htmlspecialchars($bodyClass); ?>">
  <!-- Global interactive neural background -->
  <canvas class="neural-canvas global-bg-canvas"></canvas>
  <?php include_once 'navbar.php'; ?>
  <main class="main">
