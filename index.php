<?php 
session_start();
include('includes/config.php');


    ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Publica - Home</title>
  <meta content="Publica is an online multi-media organisation with headquarters in Kano State, Nigeria."
    name="description">
  <meta content="News, trending, media, gossip, celebrities, references, tips, videos, Politics, sports" name="keywords">
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

  <main id="main">

    <!-- ======= Hero Slider Section ======= -->
    <section id="hero-slider" class="hero-slider">
      <div class="container-md" data-aos="fade-in">
        <div class="row">
          <div class="col-12">
            <div class="swiper sliderFeaturedPosts">
              <div class="swiper-wrapper">
                <?php 
   
   if (isset($_GET['pageno'])) {
          $pageno = $_GET['pageno'];
      } else {
          $pageno = 1;
      }
      $no_of_records_per_page = 4;
      $offset = ($pageno-1) * $no_of_records_per_page;


      $total_pages_sql = "SELECT COUNT(*) FROM tblposts";
      $result = mysqli_query($con,$total_pages_sql);
      $total_rows = mysqli_fetch_array($result)[0];
      $total_pages = ceil($total_rows / $no_of_records_per_page);


$query=mysqli_query($con,"select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.Is_Active=1 order by tblposts.id desc  LIMIT $offset, $no_of_records_per_page");
while ($row=mysqli_fetch_array($query)) {
?>
                <div class="swiper-slide">
                  <a href="single.php?nid=<?php echo htmlentities($row['pid'])?>" class="img-bg d-flex align-items-end"
                    style="background-image: url('admin/postimages/<?php echo htmlentities($row['PostImage']);?>');">
                    <div class="img-bg-inner">
                      <h2><?php echo htmlentities($row['posttitle']);?></h2>
                      <p><?php 
$pt=$row['postdetails'];
              echo  (substr($pt,0,300).'...');?></p>
                    </div>
                  </a>
                </div>
                <?php } ?>

              </div>
              <div class="custom-swiper-button-next">
                <span class="bi-chevron-right"></span>
              </div>
              <div class="custom-swiper-button-prev">
                <span class="bi-chevron-left"></span>
              </div>

              <div class="swiper-pagination"></div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Hero Slider Section -->
      <!-- Binance Crypto Price -->
      <div class="container-md" data-aos="fade-in">
      <script src="https://public.bnbstatic.com/unpkg/growth-widget/cryptoCurrencyWidget@0.0.9.min.js" ></script><div class="binance-widget-marquee" data-cmc-ids="1,1027,1839,52,5426,3408,74,3890,5805,7083,5994,2010" data-theme="dark" data-transparent="false" data-locale="en" data-powered-by="Powered by" data-disclaimer="Disclaimer" ></div>
</div>
  

    <!-- ======= Post Grid Section ======= -->
    <section id="posts" class="posts">
      <div class="container" data-aos="fade-up">
        <div class="row g-5">
          <div class="col-lg-4">
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


$query=mysqli_query($con,"select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.AuthorName as author,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.SubCategoryId='3' and tblposts.Is_Active=1 order by tblposts.id desc LIMIT $offset, $no_of_records_per_page");
while ($row=mysqli_fetch_array($query)) {
?>
            <div class="post-entry-1 lg">
              <a href="single.php?nid=<?php echo htmlentities($row['pid'])?>"><img class="img-fluid"
                  src="admin/postimages/<?php echo htmlentities($row['PostImage']);?>"
                  alt="<?php echo htmlentities($row['posttitle']);?>"></a>
              <div class="post-meta"><span class="date"><?php echo htmlentities($row['subcategory']);?></span> <span
                  class="mx-1">&bullet;</span> <span><?php echo ($row['postingdate']);?></span></div>
              <h2><a
                  href="single.php?nid=<?php echo htmlentities($row['pid'])?>"><?php echo htmlentities($row['posttitle'])?></a>
              </h2>
              <p class="mb-4 d-block">
                <?php 
$pt=$row['postdetails'];
              echo  (substr($pt,0,300,) . '...');?>
              </p>
              <div class="d-flex align-items-center author">
                <div class="photo"><img src="assets/img/usericon.png" alt="" class="img-fluid"></div>
                <div class="name">
                  <h3 class="m-0 p-0"><?php echo htmlentities($row['author'])?></h3>
                </div>
              </div>
            </div>
            <?php } ?>
          </div>

          <div class="col-lg-8">
            <div class="row g-5">
              <div class="col-lg-4 border-start custom-border">
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


$query=mysqli_query($con,"select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.SubCategoryId='5' and tblposts.Is_Active=1 order by tblposts.id desc LIMIT $offset, $no_of_records_per_page");
while ($row=mysqli_fetch_array($query)) {
?>
                <div class="post-entry-1">
                  <a href="single.php?nid=<?php echo htmlentities($row['pid'])?>"><img class="img-fluid"
                      src="admin/postimages/<?php echo htmlentities($row['PostImage']);?>"
                      alt="<?php echo htmlentities($row['posttitle']);?>"></a>
                  <div class="post-meta"><span class="date"><?php echo htmlentities($row['subcategory']);?></span> <span
                      class="mx-1">&bullet;</span> <span><?php echo ($row['postingdate'])?></span></div>
                  <h2><a
                      href="single.php?nid=<?php echo htmlentities($row['pid'])?>"><?php echo htmlentities($row['posttitle']);?></a>
                  </h2>
                </div>
                <?php }?>
                <div class="post-entry-1">
                  <a href="single-post.html"><img src="assets/img/post-landscape-5.jpg" alt="" class="img-fluid"></a>
                  <div class="post-meta"><span class="date">Food</span> <span class="mx-1">&bullet;</span> <span>Jul
                      17th '22</span></div>
                  <h2><a href="single-post.html">Health Category: How to Avoid Distraction and Stay Focused During Video
                      Calls?</a></h2>
                </div>
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


$query=mysqli_query($con,"select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.SubCategoryId='11' and tblposts.Is_Active=1 order by tblposts.id desc LIMIT $offset, $no_of_records_per_page");
while ($row=mysqli_fetch_array($query)) {
?>
                <div class="post-entry-1">
                  <a href="single.php?nid=<?php echo htmlentities($row['pid'])?>"><img class="img-fluid"
                      src="admin/postimages/<?php echo htmlentities($row['PostImage']);?>"
                      alt="<?php echo htmlentities($row['posttitle']);?>"></a>
                  <div class="post-meta"><span class="date"><?php echo htmlentities($row['subcategory'])?></span> <span
                      class="mx-1">&bullet;</span> <span><?php echo ($row['postingdate'])?></span></div>
                  <h2><a
                      href="single.php?nid=<?php echo htmlentities($row['pid'])?>"><?php echo htmlentities($row['posttitle'])?></a>
                  </h2>
                </div>
                <?php }?>
              </div>
              <div class="col-lg-4 border-start custom-border">
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


$query=mysqli_query($con,"select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.SubCategoryId='12' and tblposts.Is_Active=1 order by tblposts.id desc LIMIT $offset, $no_of_records_per_page");
while ($row=mysqli_fetch_array($query)) {
?>
                <div class="post-entry-1">
                  <a href="single.php?nid=<?php echo htmlentities($row['pid'])?>"><img class="img-fluid"
                      src="admin/postimages/<?php echo htmlentities($row['PostImage']);?>"
                      alt="<?php echo htmlentities($row['posttitle']);?>"></a>
                  <div class="post-meta"><span class="date"><?php echo htmlentities($row['subcategory'])?></span> <span
                      class="mx-1">&bullet;</span> <span><?php echo ($row['postingdate'])?></span></div>
                  <h2><a
                      href="single.php?nid=<?php echo htmlentities($row['pid'])?>"><?php echo htmlentities($row['posttitle'])?></a>
                  </h2>
                </div>
                <?php }?>
                <div class="post-entry-1">
                  <a href="single-post.html"><img src="assets/img/post-landscape-6.jpg" alt="" class="img-fluid"></a>
                  <div class="post-meta"><span class="date">Tech</span> <span class="mx-1">&bullet;</span> <span>Mar 1st
                      '22</span></div>
                  <h2><a href="single-post.html">Category Tech: 10 Life-Changing Hacks Every Working Mom Should Know</a>
                  </h2>
                </div>
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


$query=mysqli_query($con,"select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.SubCategoryId='27' and tblposts.Is_Active=1 order by tblposts.id desc LIMIT $offset, $no_of_records_per_page");
while ($row=mysqli_fetch_array($query)) {
?>
                <div class="post-entry-1">
                  <a href="single.php?nid=<?php echo htmlentities($row['pid'])?>"><img class="img-fluid"
                      src="admin/postimages/<?php echo htmlentities($row['PostImage']);?>"
                      alt="<?php echo htmlentities($row['posttitle']);?>"></a>
                  <div class="post-meta"><span class="date"><?php echo htmlentities($row['subcategory'])?></span> <span
                      class="mx-1">&bullet;</span> <span><?php echo ($row['postingdate'])?></span></div>
                  <h2><a
                      href="single.php?nid=<?php echo htmlentities($row['pid'])?>"><?php echo htmlentities($row['posttitle'])?></a>
                  </h2>
                </div>
                <?php }?>

              </div>

              <!-- Trending Section -->
              <div class="col-lg-4">

                <div class="trending">

                  <h3>Breaking</h3>

                  <?php 
         if (isset($_GET['pageno'])) {
          $pageno = $_GET['pageno'];
      } else {
          $pageno = 1;
      }
      $no_of_records_per_page = 7;
      $offset = ($pageno-1) * $no_of_records_per_page;


      $total_pages_sql = "SELECT COUNT(*) FROM tblposts";
      $result = mysqli_query($con,$total_pages_sql);
      $total_rows = mysqli_fetch_array($result)[0];
      $total_pages = ceil($total_rows / $no_of_records_per_page);
      
      

$query=mysqli_query($con,"select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.CategoryId=20 order by tblposts.id desc  LIMIT $offset, $no_of_records_per_page");
while ($row=mysqli_fetch_array($query)) {
?>

                  <ul class="trending-post">
                    <li>
                      <a href="single.php?nid=<?php echo htmlentities($row['pid'])?>">
                        <span class="number"><?php echo time_elapsed_string($row['postingdate']);?></span>
                        <h3><?php echo htmlentities($row['posttitle']);?></h3>



                      </a>
                    </li>

                    <?php } ?>
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



                  </ul>
                </div>

              </div> <!-- End Trending Section -->
            </div>
          </div>

        </div> <!-- End .row -->
      </div>
    </section> <!-- End Post Grid Section -->

    <!-- ======= Culture Category Section ======= -->

    <section class="category-section">
      <div class="container" data-aos="fade-up">

        <!-- Blog Post -->


        <div class="section-header d-flex justify-content-between align-items-center mb-5">
          <h2>Sports</h2>
          <div><a href="category.php?catid=3" class="more">See All Sports</a></div>
        </div>
        <?php 
         if (isset($_GET['pageno'])) {
          $pageno = $_GET['pageno'];
      } else {
          $pageno = 1;
      }
      $no_of_records_per_page = 5;
      $offset = ($pageno-1) * $no_of_records_per_page;


      $total_pages_sql = "SELECT COUNT(*) FROM tblposts";
      $result = mysqli_query($con,$total_pages_sql);
      $total_rows = mysqli_fetch_array($result)[0];
      $total_pages = ceil($total_rows / $no_of_records_per_page);


$query=mysqli_query($con,"select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.AuthorName as author,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.CategoryId=3 order by tblposts.id desc  LIMIT $offset, $no_of_records_per_page");
while ($row=mysqli_fetch_array($query)) {
?>
        <div class="row">
          <div class="col-md-12">


            <div class="row">

              <div class="col-lg-12">

                <div class="post-entry-1 border-bottom">
                  <div class="post-meta"><span class="date"><?php echo htmlentities($row['subcategory'])?></span> <span
                      class="mx-1">&bullet;</span> <span><?php echo time_elapsed_string($row['postingdate']);?></span>
                  </div>

                  <h2 class="mb-2"><a href="single.php?nid=<?php echo htmlentities($row['pid'])?>"
                      class="me-4 thumbnail mb-4 mb-lg-0 d-inline-block"><?php echo htmlentities($row['posttitle'])?></a>
                  </h2>

                  <p>
                    <?php 
$pt=$row['postdetails'];
              echo  (substr($pt,0,300,) . '...');?>
                  </p>
                  <div class="d-flex align-items-center author">
                    <div class="photo"><img src="assets/img/usericon.png" alt="" class="img-fluid"></div>
                    <div class="name">
                      <h3 class="m-0 p-0"><?php echo htmlentities($row['author'])?></h3>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>


          <?php } ?>

        </div>
      </div>

    </section><!-- End Culture Category Section -->


    <!-- ======= Entertainment Category Section ======= -->
    <section class="category-section">
      <div class="container" data-aos="fade-up">

        <div class="section-header d-flex justify-content-between align-items-center mb-5">
          <h2>Entertainment</h2>
          <div><a href="category.php?catid=5" class="more">See All Entertainment</a></div>
        </div>
        <?php 
         if (isset($_GET['pageno'])) {
          $pageno = $_GET['pageno'];
      } else {
          $pageno = 1;
      }
      $no_of_records_per_page = 5;
      $offset = ($pageno-1) * $no_of_records_per_page;


      $total_pages_sql = "SELECT COUNT(*) FROM tblposts";
      $result = mysqli_query($con,$total_pages_sql);
      $total_rows = mysqli_fetch_array($result)[0];
      $total_pages = ceil($total_rows / $no_of_records_per_page);


$query=mysqli_query($con,"select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.AuthorName as author,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.CategoryId=5 order by tblposts.id desc  LIMIT $offset, $no_of_records_per_page");
while ($row=mysqli_fetch_array($query)) {
?>
        <div class="row">
          <div class="col-md-12 order-md-2">

            <!--div class="d-lg-flex post-entry-2">
              <a href="single-post.html" class="me-4 thumbnail d-inline-block mb-4 mb-lg-0">
                <img src="assets/img/post-landscape-3.jpg" alt="" class="img-fluid">
              </a>
              <div>
                <div class="post-meta"><span class="date">Business</span> <span class="mx-1">&bullet;</span> <span>Jul
                    5th '22</span></div>
                <h3><a href="single-post.html">What is the son of Football Coach John Gruden, Deuce Gruden doing
                    Now?</a></h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio placeat exercitationem magni
                  voluptates dolore. Tenetur fugiat voluptates quas, nobis error deserunt aliquam temporibus sapiente,
                  laudantium dolorum itaque libero eos deleniti?</p>
                <div class="d-flex align-items-center author">
                  <div class="photo"><img src="assets/img/person-4.jpg" alt="" class="img-fluid"></div>
                  <div class="name">
                    <h3 class="m-0 p-0">Wade Warren</h3>
                  </div>
                </div>
              </div>
            </div-->

            <!--div class="row">
              <div class="col-lg-4">
                <div class="post-entry-1 border-bottom">
                  <a href="single-post.html"><img src="assets/img/post-landscape-5.jpg" alt="" class="img-fluid"></a>
                  <div class="post-meta"><span class="date">Business</span> <span class="mx-1">&bullet;</span> <span>Jul
                      5th '22</span></div>
                  <h2 class="mb-2"><a href="single-post.html">11 Work From Home Part-Time Jobs You Can Do Now</a></h2>
                  <span class="author mb-3 d-block">Jenny Wilson</span>
                  <p class="mb-4 d-block">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vero temporibus
                    repudiandae, inventore pariatur numquam cumque possimus</p>
                </div-->

            <!--div class="post-entry-1">
                  <div class="post-meta"><span class="date">Business</span> <span class="mx-1">&bullet;</span> <span>Jul
                      5th '22</span></div>
                  <h2 class="mb-2"><a href="single-post.html">5 Great Startup Tips for Female Founders</a></h2>
                  <span class="author mb-3 d-block">Jenny Wilson</span>
                </div>
              </div-->
            <!--div class="col-lg-8">
                <div class="post-entry-1">
                  <a href="single-post.html"><img src="assets/img/post-landscape-7.jpg" alt="" class="img-fluid"></a>
                  <div class="post-meta"><span class="date">Business</span> <span class="mx-1">&bullet;</span> <span>Jul
                      5th '22</span></div>
                  <h2 class="mb-2"><a href="single-post.html">How to Avoid Distraction and Stay Focused During Video
                      Calls?</a></h2>
                  <span class="author mb-3 d-block">Jenny Wilson</span>
                  <p class="mb-4 d-block">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vero temporibus
                    repudiandae, inventore pariatur numquam cumque possimus</p>
                </div>
              </div>
            </div>
          </div-->
            <div class="col-md-12">
              <div class="post-entry-1 border-bottom">
                <div class="post-meta"><span class="date"><?php echo htmlentities($row['subcategory'])?></span> <span
                    class="mx-1">&bullet;</span> <span><?php echo time_elapsed_string($row['postingdate']);?></span>
                </div>
                <h2 class="mb-2"><a
                    href="single.php?nid=<?php echo htmlentities($row['pid'])?>"><?php echo htmlentities($row['posttitle'])?></a>
                </h2>
                <p>
                  <?php 
$pt=$row['postdetails'];
              echo  (substr($pt,0,300,) . '...');?>
                </p>
                <div class="d-flex align-items-center author">
                  <div class="photo"><img src="assets/img/usericon.png" alt="" class="img-fluid"></div>
                  <div class="name">
                    <h3 class="m-0 p-0"><?php echo htmlentities($row['author'])?></h3>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>

        <?php } ?>
    </section><!-- End Entertainment Category Section -->

    <!-- ======= Lifestyle Category Section ======= -->
    <section class="category-section">
      <div class="container" data-aos="fade-up">

        <div class="section-header d-flex justify-content-between align-items-center mb-5">
          <h2>Lifestyle</h2>
          <div><a href="category.php?catid=2" class="more">See All Lifestyle</a></div>
        </div>
        <?php 
         if (isset($_GET['pageno'])) {
          $pageno = $_GET['pageno'];
      } else {
          $pageno = 1;
      }
      $no_of_records_per_page = 5;
      $offset = ($pageno-1) * $no_of_records_per_page;


      $total_pages_sql = "SELECT COUNT(*) FROM tblposts";
      $result = mysqli_query($con,$total_pages_sql);
      $total_rows = mysqli_fetch_array($result)[0];
      $total_pages = ceil($total_rows / $no_of_records_per_page);


$query=mysqli_query($con,"select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.AuthorName as author,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.CategoryId=2 order by tblposts.id desc  LIMIT $offset, $no_of_records_per_page");
while ($row=mysqli_fetch_array($query)) {
?>
        <div class="col-lg-12">
          <div class="row g-5">
            <div class="col-lg-12">

              <div class="post-entry-1 border-bottom">
                <div class="post-meta"><span class="date"><?php echo htmlentities($row['subcategory'])?></span> <span
                    class="mx-1">&bullet;</span>
                  <span><?php echo time_elapsed_string($row['postingdate']);?></span></div>
                <h2 class="mb-2"><a
                    href="single.php?nid=<?php echo htmlentities($row['pid'])?>"><?php echo htmlentities($row['posttitle'])?></a>
                </h2>
                <p>
                  <?php 
$pt=$row['postdetails'];
              echo  (substr($pt,0,300) . '...');?>
                </p>
                <div class="d-flex align-items-center author">
                  <div class="photo"><img src="assets/img/usericon.png" alt="" class="img-fluid"></div>
                  <div class="name">
                    <h3 class="m-0 p-0"><?php echo htmlentities($row['author'])?></h3>
                  </div>
                </div>
              </div>


            </div>
          </div>
        </div>
        <?php } ?>
      </div> <!-- End .row -->

    </section><!-- End Lifestyle Category Section -->

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