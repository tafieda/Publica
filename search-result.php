<?php
include('includes/config.php');

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Publica - <?php echo htmlentities($_POST['searchtitle']);?></title>
  <meta content="Publica is an online multi-media organisation with headquarters in Kano State, Nigeria."
    name="description">
  <meta content="search, engine, super-search, News, trending, media, gossip, celebrities, references, tips, videos" name="keywords">
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

    <!-- ======= Search Results ======= -->
    <section id="search-result" class="search-result">
      <div class="container">
        <div class="row">
          <div class="col-md-9">
            <h3 class="category-title">Search Results</h3>
            <?php 
        if($_POST['searchtitle']!=''){
$st=$_SESSION['searchtitle']=$_POST['searchtitle'];
}
$st;
             




     if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        $no_of_records_per_page = 8;
        $offset = ($pageno-1) * $no_of_records_per_page;


        $total_pages_sql = "SELECT COUNT(*) FROM tblposts";
        $result = mysqli_query($con,$total_pages_sql);
        $total_rows = mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $no_of_records_per_page);


$query=mysqli_query($con,"select tblposts.id as pid,tblposts.PostTitle as posttitle,tblcategory.CategoryName as category,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.PostTitle like '%$st%' and tblposts.Is_Active=1 LIMIT $offset, $no_of_records_per_page");

$rowcount=mysqli_num_rows($query);
if($rowcount==0)
{
echo "No record found";
}
else {
while ($row=mysqli_fetch_array($query)) {


?>

            <div class="d-md-flex post-entry-2 small-img">
              <!--a href="single-post.html" class="me-4 thumbnail">
                <img src="assets/img/post-landscape-6.jpg" alt="" class="img-fluid">
              </a-->
              <div>
                <div class="post-meta"><span class="date"><?php echo htmlentities($row['category']);?></span> <span
                    class="mx-1">&bullet;</span> <span><?php echo htmlentities($row['postingdate']);?></span></div>
                <h3><a
                    href="single.php?nid=<?php echo htmlentities($row['pid'])?>"><?php echo htmlentities($row['posttitle']);?></a>
                </h3>
                <p><?php 
$pt=$row['postdetails'];
echo  (substr($pt,0,230). '...');?></p>
                <div class="d-flex align-items-center author">
                  <div class="photo"><img src="assets/img/usericon.png" alt="" class="img-fluid"></div>
                  <div class="name">
                    <h3 class="m-0 p-0">Admin</h3>
                  </div>
                </div>
              </div>
            </div>
            <?php } ?>

            <!-- Paging -->
            <div class="text-start py-4">
              <div class="custom-pagination">
                <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>"
                  class="<?php if($pageno <= 1){ echo 'disabled'; } ?> prev">Prevous</a>
                <a href="?pageno=1" class="active">1</a>
                <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=2"; } ?>"
                  class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">2</a>
                <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=3"; } ?>"
                  class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">3</a>
                <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=4"; } ?>"
                  class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">4</a>
                <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=5"; } ?>"
                  class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">5</a>
                <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>"
                  class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?> next">Next</a>
              </div>
            </div><!-- End Paging -->
            <?php } ?>
          </div>

          <div class="col-md-3">
            <!-- ======= Sidebar ======= -->
            <?php include('includes/sidebar.php');?>                
          </div>

        </div>
      </div>
    </section> <!-- End Search Result -->

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