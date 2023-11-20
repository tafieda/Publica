<?php 
session_start();
include('includes/config.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Publica - Weather Forecast</title>
    <meta content="Weather Forecast within Nigeria" name="description">
    <meta content="breaking, News, trending, media, gossip, celebrities, references, tips, videos" name="keywords">
    <meta name="author" content="Publica">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@400;500&family=Inter:wght@400;500&family=Playfair+Display:ital,wght@0,400;0,700;1,400;1,700&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">

    <!-- Template Main CSS Files -->
    <link href="assets/css/variables.css" rel="stylesheet">
    <link href="assets/css/main.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Publica
  * Bootstrap v5.3.2
  ======================================================== -->
</head>


<body>

    <!-- Navigation -->
    <?php include('includes/header.php');?>


    <?php 
function time_elapsed_string($datetime, $full = false){
  $now = new DateTime;
  $ago = new DateTime($datetime);
  $diff = $now->diff($ago);

  $diff->w = floor($diff->d / 7);
  $diff->d -= $diff->w * 7;

  $string = array(
    'y' => 'yr',
    'm' => 'month',
    'w' => 'week',
    'd' => 'day',
    'h' => 'hr',
    'i' => 'minute',
    's' => 'second',
  );
  foreach( $string as $k => &$v){
    if ($diff->$k) {
      $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
    } else {
      unset($string[$k]);
    }
    
  }
  if(!$full) $string = array_slice($string, 0, 1);
  return $string ? implode(', ', $string) . ' ago' : 'just now';
}
?>

    <main id="main">

        <section class="single-post-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 post-content" data-aos="fade-up">
                        <!-- ======= Single Post Content ======= -->
                        <div class="single-post">

                            <h1 class="page-title">Weather Forecast</h1>
                            <div class="post-meta">Based on your location</div>
                            <script>
                                (function (d, s, id) {
                                    if (d.getElementById(id)) {
                                        if (window.__TOMORROW__) {
                                            window.__TOMORROW__.renderWidget();
                                        }
                                        return;
                                    }
                                    const fjs = d.getElementsByTagName(s)[0];
                                    const js = d.createElement(s);
                                    js.id = id;
                                    js.src = "https://www.tomorrow.io/v1/widget/sdk/sdk.bundle.min.js";

                                    fjs.parentNode.insertBefore(js, fjs);
                                })(document, 'script', 'tomorrow-sdk');
                            </script>

                            <div class="tomorrow" data-location-id="" data-language="EN" data-unit-system="METRIC"
                                data-skin="dark" data-widget-type="summary"
                                style="padding-bottom:22px;position:relative;">
                                <a href="https://www.tomorrow.io/weather-api/" rel="nofollow noopener noreferrer"
                                    target="_blank"
                                    style="position: absolute; bottom: 0; transform: translateX(-50%); left: 50%;">
                                    <img alt="Powered by the Tomorrow.io Weather API"
                                        src="https://weather-website-client.tomorrow.io/img/powered-by.svg" width="250"
                                        height="18" />
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">

                        <!-- ======= Sidebar ======= -->
          <?php include('includes/sidebar.php');?>
                    </div>
                </div>
        </section>
    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <?php include('includes/footer.php');?>

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>