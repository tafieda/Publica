<?php 
session_start();
include('includes/config.php');

error_reporting(0);
?>
<?php
if(isset($_POST['submit'])){
	//Get form data
	$name = $_POST['name'];
	$email = $_POST['email'];
	$message = $_POST['message'];																																																																																	

	$email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

	if (!preg_match($email_exp, $email)) {
		echo '<br><span style="color:red;">The Email address you entered is not valid.</span>';
		exit;
	}
	
	$sql = "INSERT INTO tblcontact (name, email, message) VALUES ('$name', '$email', '$message')";

	if (mysqli_query($con, $sql)) {
		$msg="Your contact information is received successfully.";
}
else{
$error="Something went wrong . Please try again.";
	}

	
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Publica - Contact us</title>
  <meta content="Publica is an online multi-media organisation with headquarters in Kano State, Nigeria."
    name="description">
  <meta content="contact, info, us, News, trending, media, gossip, celebrities, references, tips, videos" name="keywords">
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
    <section id="contact" class="contact mb-5">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-12 text-center mb-5">
            <h1 class="page-title">Contact us</h1>
          </div>
        </div>

        <div class="row gy-4">
          <?php 
$pagetype='contactus';
$query=mysqli_query($con,"select Address,PageTitle,Description from tblpages where PageName='$pagetype'");
while($row=mysqli_fetch_array($query))
{

?>
          <div class="col-md-4">
            <div class="info-item">
              <i class="bi bi-geo-alt"></i>
              <h3>Address</h3>
              <address><?php echo htmlentities($row['Address'])?></address>
            </div>
          </div><!-- End Info Item -->

          <div class="col-md-4">
            <div class="info-item info-item-borders">
              <i class="bi bi-phone"></i>
              <h3>Phone Number</h3>
              <p><a href="tel:<?php echo $row['PageTitle'];?>"><?php echo $row['PageTitle'];?></a></p>
            </div>
          </div><!-- End Info Item -->

          <div class="col-md-4">
            <div class="info-item">
              <i class="bi bi-envelope"></i>
              <h3>Email</h3>
              <p><a href="mailto:<?php echo $row['Description'];?>"><?php echo $row['Description'];?></a></p>
            </div>
          </div><!-- End Info Item -->
          <?php } ?>
        </div>

        <div class="form mt-5">
          <form method="post" class="php-email-form">

            <!---Success Message--->
            <?php if($msg){ ?>
            <div class="alert alert-success" role="alert">
              <strong>Well done!</strong> <?php echo htmlentities($msg);?>
            </div>
            <?php } ?>

            <!---Error Message--->
            <?php if($error){ ?>
            <div class="alert alert-danger" role="alert">
              <strong>Oh snap!</strong> <?php echo htmlentities($error);?></div>
            <?php } ?>

            <div class="row">
              <div class="form-group col-md-6">
                <input type="text" name="name" class="form-control" placeholder="Your Name" required>
              </div>

              <div class="form-group col-md-6">
                <input type="email" name="email" class="form-control" placeholder="Your Email" required>
              </div>
            </div>

            <div class="form-group">
              <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
            </div>

            <div class="text-center"><button type="submit" name="submit">Send Message</button></div>
         
          </form>
        </div><!-- End Contact Form -->

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
  <!--script src="assets/vendor/php-email-form/validate.js"></script-->

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>