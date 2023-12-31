<?php
include('includes/config.php');

?>


<!DOCTYPE html>
<html lang="en">
<?php 
$pagetype='Writeforus';
$query=mysqli_query($con,"select PageTitle,Description from tblpages where PageName='$pagetype'");
while($row=mysqli_fetch_array($query))
{

?>

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Publica - <?php echo htmlentities($row['PageTitle'])?></title>
  <meta content="<?php 
$pt=$row['Description'];
              echo  (substr($pt,0,30). '...');?><?php }?>" name="description">
  <meta content="write, for, us, News, trending, media, gossip, celebrities, references, tips, videos" name="keywords">
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
  * Template Name: ZenBlog
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/zenblog-bootstrap-blog-template/
  * Author: BootstrapMade.com
  * License: https:///bootstrapmade.com/license/
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
    <section id="contact" class="contact mb-5">
      <div class="container">
        <div class="row">
          <div class="col-md-9" data-aos="fade-up">

            <?php 
$pagetype='Writeforus';
$query=mysqli_query($con,"select PageTitle,Description from tblpages where PageName='$pagetype'");
while($row=mysqli_fetch_array($query))
{

?>
            <div class="row">
              <div class="col-lg-12 text-center mb-5">
                <h1 class="page-title"><?php echo htmlentities($row['PageTitle'])?></h1>
              </div>
            </div>
            <div class="row">

              <div class="col-lg-12 mb-5">




                <p><?php echo $row['Description'];?></p>

              </div>
            </div><!-- End Info Item -->
            <?php } ?>
          </div>

          <div class="col-md-3">
            <!-- ======= Sidebar ======= -->
            <a href="https://clients.domainking.ng/aff.php?aff=5022&p=web-hosting" target="_blank" rel="sponsored"><img
                src="https://www.domainking.ng/media/dkng-web-hosting-offer-160-600.png" width="160" height="600"
                border="0" alt="Reliable Web Hosting in Nigeria by DomainKing.NG"></a>

          </div>

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