<?php 
session_start();
include('includes/config.php');

    ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Publica - About us</title>
  <meta content="Publica is an online multi-media organisation with headquarters in Kano State, Nigeria."
    name="description">
  <meta content="about, us, bio, News, trending, media, gossip, celebrities, references, tips, videos" name="keywords">
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
    <section>
      <div class="container" data-aos="fade-up">
        <div class="row">
          <div class="col-lg-12 text-center mb-5">
            <?php 
$pagetype='aboutus';
$query=mysqli_query($con,"select PageTitle,Description from tblpages where PageName='$pagetype'");
while($row=mysqli_fetch_array($query))
{

?>
            <h1 class="page-title">About us</h1>
          </div>
        </div>

        <div class="row mb-5">

          <div class="d-md-flex post-entry-2 half">
            <a href="#" class="me-4 thumbnail">
              <img src="assets/img/post-landscape-2.jpg" alt="" class="img-fluid">
            </a>
            <div class="ps-md-5 mt-4 mt-md-0">
              <div class="post-meta mt-4">About us</div>
              <h2 class="mb-4 display-4">Company History</h2>

              <p><?php echo $row['PageTitle'];?></p>
            </div>
          </div>


          <div class="d-md-flex post-entry-2 half mt-5">
            <a href="#" class="me-4 thumbnail order-2">
              <img src="assets/img/post-landscape-5.jpg" alt="" class="img-fluid">
            </a>
            <div class="pe-md-5 mt-4 mt-md-0">
              <div class="post-meta mt-4">Mission &amp; Vision</div>
              <h2 class="mb-4 display-4">Mission &amp; Vision</h2>

              <p><?php echo $row['Description'];?></p>

            </div>
          </div>
          <?php } ?>
        </div>

      </div>
    </section>

    <section class="mb-5 bg-light py-5">
      <div class="container" data-aos="fade-up">
        <div class="row justify-content-between align-items-lg-center">
          <div class="col-lg-5 mb-4 mb-lg-0">
            <h2 class="display-4 mb-4">Latest News</h2>
            <?php 
   
   if (isset($_GET['pageno'])) {
          $pageno = $_GET['pageno'];
      } else {
          $pageno = 1;
      }
      $no_of_records_per_page = 1;
      $offset = ($pageno-1) * $no_of_records_per_page;


      $total_pages_sql = "SELECT COUNT(*) FROM tblposts";
      $result = mysqli_query($con,$total_pages_sql);
      $total_rows = mysqli_fetch_array($result)[0];
      $total_pages = ceil($total_rows / $no_of_records_per_page);


$query=mysqli_query($con,"select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.Is_Active=1 order by tblposts.id desc  LIMIT $offset, $no_of_records_per_page");
while ($row=mysqli_fetch_array($query)) {
?>

            <p><?php 
$pt=$row['postdetails'];
              echo  (substr($pt,0,600) .'...');?></p>
            <p><a href="index.php" class="more">View All Blog Posts</a></p>
          </div>
          <div class="col-lg-6">
            <div class="row">
              <div class="col-6">
                <img src="admin/postimages/<?php echo htmlentities($row['PostImage']);?>" alt="" class="img-fluid mb-4">
              </div>
              <div class="col-6 mt-4">
                <img src="admin/postimages/<?php echo htmlentities($row['PostImage']);?>" alt="" class="img-fluid mb-4">
              </div>
            </div>
          </div>
          <?php }?>
        </div>
      </div>
    </section>

    <section>
      <div class="container" data-aos="fade-up">
        <div class="row">
          <div class="col-12 text-center mb-5">
            <div class="row justify-content-center">
              <div class="col-lg-6">
                <h2 class="display-4">Our Team</h2>
                <p>Publica is not funded by any big-name donors. Nobody is behind us pulling the strings and we're going
                  to keep it that way.</p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 text-center mb-5">
            <img src="" alt="" class="img-fluid rounded-circle w-50 mb-4">
            <h4></h4>
            <span class="d-block mb-3 text-uppercase"></span>
            <p>
          </div>
          <?php 
$pagetype='admin';
$query=mysqli_query($con,"select id, AdminUserName, AdminName, AdminTitle, AdminBio, Photo from tbladmin where AdminUserName='$pagetype'");
while($row=mysqli_fetch_array($query))
{

?>

          <div class="col-lg-4 text-center mb-5">
            <img src="admin/postimages/<?php echo $row['Photo'];?>" alt="" class="img-fluid rounded-circle w-50 mb-4">
            <h4><?php echo $row['AdminName'];?></h4>
            <span class="d-block mb-3 text-uppercase"><?php echo $row['AdminTitle'];?></span>
            <p><?php echo $row['AdminBio'];?></p>
          </div>

          <?php } ?>


          <div class="col-lg-4 text-center mb-5">
            <img src="" alt="" class="img-fluid rounded-circle w-50 mb-4">
            <h4></h4>
            <span class="d-block mb-3 text-uppercase"></span>
            <p>
          </div>
          <!--div class="col-lg-4 text-center mb-5">
            <img src="assets/img/usericon.png" alt="" class="img-fluid rounded-circle w-50 mb-4">
            <h4>Cameron Williamson</h4>
            <span class="d-block mb-3 text-uppercase">Editor Staff</span>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis, perspiciatis repellat maxime, adipisci
              non ipsam at itaque rerum vitae, necessitatibus nulla animi expedita cumque provident inventore?
              Voluptatum in tempora earum deleniti, culpa odit veniam, ea reiciendis sunt ullam temporibus aut!</p>
          </div>
          <div class="col-lg-4 text-center mb-5">
            <img src="assets/img/usericon.png" alt="" class="img-fluid rounded-circle w-50 mb-4">
            <h4>Cameron Williamson</h4>
            <span class="d-block mb-3 text-uppercase">Editor Staff</span>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis, perspiciatis repellat maxime, adipisci
              non ipsam at itaque rerum vitae, necessitatibus nulla animi expedita cumque provident inventore?
              Voluptatum in tempora earum deleniti, culpa odit veniam, ea reiciendis sunt ullam temporibus aut!</p>
          </div>
          <div class="col-lg-4 text-center mb-5">
            <img src="assets/img/usericon.png" alt="" class="img-fluid rounded-circle w-50 mb-4">
            <h4>Cameron Williamson</h4>
            <span class="d-block mb-3 text-uppercase">Editor Staff</span>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis, perspiciatis repellat maxime, adipisci
              non ipsam at itaque rerum vitae, necessitatibus nulla animi expedita cumque provident inventore?
              Voluptatum in tempora earum deleniti, culpa odit veniam, ea reiciendis sunt ullam temporibus aut!</p>
          </div-->

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