<?php 
session_start();
include('includes/config.php');
//Genrating CSRF Token
if (empty($_SESSION['token'])) {
 $_SESSION['token'] = bin2hex(random_bytes(32));
}

if(isset($_POST['submit']))
{
  //Verifying CSRF Token
if (!empty($_POST['csrftoken'])) {
    if (hash_equals($_SESSION['token'], $_POST['csrftoken'])) {
$name=$_POST['name'];
$email=$_POST['email'];
$comment=$_POST['comment'];
$postid=intval($_GET['nid']);
$st1='0';
$query=mysqli_query($con,"insert into tblcomments(postId,name,email,comment,status) values('$postid','$name','$email','$comment','$st1')");
//if($query):
  //echo "<script>alert('comment successfully submit. Comment will be display after admin review ');</script>";
  //unset($_SESSION['token']);
//else :
 //echo "<script>alert('Something went wrong. Please try again.');</script>";  

//endif;
if($query)
{
$msg="comment successfully submit. Comment will be display after admin review";
unset($_SESSION['token']);
}
else{
$error="Something went wrong. Please try again.";    
} 

}
}
}

?>

<?php 
$pid=intval($_GET['nid']);
$query=mysqli_query($con,"select id, PostTitle, PostUrl, PostDetails from tblposts where id='$pid'");
while($row=mysqli_fetch_array($query))
{
  ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Publica - <?php echo htmlentities($row['PostTitle']);?></title>
  <meta content="<?php 
$pt=$row['PostDetails'];
              echo  (substr($pt,0));?>" name="description">
  <meta content="<?php echo htmlentities($row['PostUrl']) ;?>, breaking, News, trending, media, gossip, celebrities, references, tips, videos" name="keywords">
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
<?php } ?>

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
            <?php
$pid=intval($_GET['nid']);

 $query=mysqli_query($con,"select tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.ShortDescrip as short,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.id='$pid'");
while ($row=mysqli_fetch_array($query)) {
?>


            <!-- ======= Single Post Content ======= -->
            <div class="single-post">

              <div class="post-meta"><span class="date"><a
                    href="category.php?catid=<?php echo htmlentities($row['cid'])?>"><?php echo htmlentities($row['category']);?></a></span>
                <span class="mx-1">&bullet;</span> <span><?php echo htmlentities($row['subcategory']);?></span> <span
                  class="mx-1">&bullet;</span> <?php echo htmlentities($row['postingdate']); ?></div>

              <h1 class="mb-5"><?php echo htmlentities($row['posttitle']);?></h1>

              <img class="img-fluid" src="admin/postimages/<?php echo htmlentities($row['PostImage']);?>"
                alt="<?php echo htmlentities($row['posttitle']);?>">
                
              <figcaption class="fst-italic text-muted text-start"><?php echo htmlentities($row['short']);?></figcaption>
             
              <p><?php 
$pt=$row['postdetails'];
              echo  (substr($pt,0));?></p>

<a href="https://clients.domainking.ng/aff.php?aff=5022&p=web-hosting" target="_blank" rel="sponsored"><img src="https://www.domainking.ng/media/dkng-web-hosting-offer-wide.png" width="528" height="80" border="0" alt="Reliable Web Hosting in Nigeria by DomainKing.NG"></a>
         
            </div><!-- End Single Post Content -->
         
         <?php 
$baseUrl="www.publica.com.ng/single.php?nid="; 
$slug=$_GET['nid']; 
$articleIdc=$row['url']; 
$message=$row['posttitle']; 

?>

            <ul>
              <a class="btn disabled"><i class="bi bi-share"> </i></a>

              <a target="_blank" class="btn codex-facebook"
                href="http://www.facebook.com/sharer/sharer.php?u=<?php echo $baseUrl.$slug.$articleIdc; ?>"> <i
                  class="bi bi-facebook"></i>
              </a>

              <a target="_blank" class="btn codex-twitter"
                href="http://twitter.com/share?text=<?php echo urlencode($message) ?>&url=<?php echo $baseUrl.$slug.$articleIdc; ?>&hashtags=blog,Publica,NigeriaNews&via=publica"><i
                  class="bi bi-twitter-x"></i>
              </a>

              <a target="_blank" class="btn codex-whatsapp"
                href="https://api.whatsapp.com/send?text=<?php echo urlencode($message) ?>%20<?php echo $baseUrl.$slug.$articleIdc; ?>"> <i
                  class="bi bi-whatsapp"></i>
              </a>

              <a target="_blank" class="btn codex-telegram"
                href="http://www.telegram.me/share/url?url=<?php echo $baseUrl.$slug.$articleIdc; ?>&text=<?php echo urlencode($message) ?>"> <i
                  class="bi bi-telegram"></i>
              </a>

              <input type="text" hidden value="<?php echo $baseUrl.$slug.$articleIdc; ?>" id="myInput">
              <div class="tootip">
                <button class="btn codex-link" onclick="myFunction()" onmouseout="outFunc()"><i
                    class="bi bi-link-45deg"></i></button>
                <span class="tootiptext" id="myTooltip">Copy to Clipboard</span>
              </div>
            </ul>

            <?php } ?>
            <!-- End Share Button Content -->
            <script>
              function myFunction() {
                // Get
                var copyText = document.getElementById("myInput");

                // Select
                copyText.select();
                copyText.setSelectionRange(0, 99999); //mobile

                // Copy
                navigator.clipboard.writeText(copyText.value);

                var tooltip = document.getElementById("myTooltip");
                tooltip.innerHTML = "Link Copied to Clipboard"; //copyText.value;
              }

              function outFunc() {
                var tooltip = document.getElementById("myTooltip");
                tooltip.innerHTML = "Copy to Clipboard"
                // Alertalert("Copied");
              }
            </script>
            <style>
              .codex-facebook {
                background: #007bff;
                color: white;
              }

              .codex-facebook:hover,
              .codex-facebook:active {
                color: #007bff;
                background: transparent;
                border-color: #007bff;
              }

              .codex-twitter {
                background: #14171A;
                color: white;
              }

              .codex-twitter:hover,
              .codex-twitter:active {
                color: #14171A;
                background: transparent;
                border-color: #14171A;
              }

              .codex-telegram {
                background: #0A66C2;
                color: white;
              }

              .codex-telegram:hover,
              .codex-telegram:active {
                color: #0A66C2;
                background: transparent;
                border-color: #0A66C2;
              }

              .codex-whatsapp {
                background: #25D366;
                color: white;
              }

              .codex-whatsapp:hover,
              .codex-whatsapp:active {
                color: #25D366;
                background: transparent;
                border-color: #25D366;
              }

              .codex-link {
                color: white;
                background: #595959;
              }

              .codex-link:hover,
              .codex-link:active {
                color: #595959;
                background: transparent;
                border-color: #595959;
              }

              .tootip {
                position: relative;
                display: inline-block;
              }

              .tootip .tootiptext {
                visibility: hidden;
                width: 140px;
                background-color: #595959;
                color: #fff;
                text-align: center;
                border-radius: 6px;
                padding: 3px;
                position: absolute;
                z-index: 1;
                bottom: 150%;
                left: 50%;
                margin-left: -75px;
                opacity: 0;
                transition: opacity 0.3s;
              }

              .tootip .tootiptext::after {
                content: "";
                position: absolute;
                top: 100%;
                left: 50%;
                margin-left: -5px;
                border-width: 5px;
                border-style: solid;
                border-color: #595959 transparent transparent transparent;
              }

              .tootip:hover .tootiptext {
                visibility: visible;
                opacity: 1;
              }
            </style>
            <!-- ======= Comments ======= -->

            <div class="comments">
            <?php 
             
 $sts=1;
 $query=mysqli_query($con,"select name,comment,postingDate from  tblcomments where postId='$pid' and status='$sts'");
 
            $totneworder=mysqli_num_rows($query);
 ?>
  <h5 class="comment-title py-4"><?php echo htmlentities($totneworder);?> Comment</h5>
  <a href="https://clients.domainking.ng/aff.php?aff=5022&p=domain-registration" target="_blank" rel="sponsored"><img src="https://www.domainking.ng/media/dkng-badge.gif" width="200" height="50" border="0" alt="For Registering Domain Names, I trust DomainKing.NG"></a>   
                   
 <?php
while ($row=mysqli_fetch_array($query)) {
?>
              <div class="comment d-flex mb-4">
                <div class="flex-shrink-0">
                  <div class="avatar avatar-sm rounded-circle">
                    <img class="avatar-img" src="assets/img/usericon.png" alt="" class="img-fluid">
                  </div>
                </div>
                <div class="flex-grow-1 ms-2 ms-sm-3">
                  <div class="comment-meta d-flex align-items-baseline">
                    <h6 class="me-2 "><?php echo htmlentities($row['name']);?></h6>
                    <span class="text-muted"><?php echo htmlentities($row['postingDate']);?></span>
                  </div>
                  <div class="comment-body">
                    <?php echo htmlentities($row['comment']);?>
                  </div>

                  <!--div class="comment-replies bg-light p-3 mt-3 rounded">
                    <h6 class="comment-replies-title mb-4 text-muted text-uppercase">2 replies</h6>

                    <div class="reply d-flex mb-4">
                      <div class="flex-shrink-0">
                        <div class="avatar avatar-sm rounded-circle">
                          <img class="avatar-img" src="assets/img/person-4.jpg" alt="" class="img-fluid">
                        </div>
                      </div>
                      <div class="flex-grow-1 ms-2 ms-sm-3">
                        <div class="reply-meta d-flex align-items-baseline">
                          <h6 class="mb-0 me-2">Brandon Smith</h6>
                          <span class="text-muted">2d</span>
                        </div>
                        <div class="reply-body">
                          Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                        </div>
                      </div>
                    </div>
                    <div class="reply d-flex">
                      <div class="flex-shrink-0">
                        <div class="avatar avatar-sm rounded-circle">
                          <img class="avatar-img" src="assets/img/person-3.jpg" alt="" class="img-fluid">
                        </div>
                      </div>
                      <div class="flex-grow-1 ms-2 ms-sm-3">
                        <div class="reply-meta d-flex align-items-baseline">
                          <h6 class="mb-0 me-2">James Parsons</h6>
                          <span class="text-muted">1d</span>
                        </div>
                        <div class="reply-body">
                          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio dolore sed eos sapiente,
                          praesentium.
                        </div>
                      </div>
                    </div>
                  </div-->
                </div>
              </div>

              <?php } ?>

            </div><!-- End Comments -->
            <!-- ======= Comments Form ======= -->
            <div class="row justify-content-center mt-5">

              <div class="col-lg-12">
                <h5 class="comment-title">Leave a Comment</h5>
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

                <form name="Comment" method="post">
                  <div class="row">

                    <div class="col-12 mb-3">
                      <input type="hidden" name="csrftoken" value="<?php echo htmlentities($_SESSION['token']); ?>" />
                      <label for="comment-name">Name</label>

                      <input type="text" name="name" class="form-control" placeholder="Enter your name" required>
                    </div>
                    <div class="col-12 mb-3">
                      <label for="comment-email">Email</label>
                      <input type="text" name="email" class="form-control" placeholder="Enter your email" required>
                    </div>
                    <div class="col-12 mb-3">
                      <label for="comment-message">Message</label>

                      <textarea class="form-control" name="comment" rows="3" placeholder="Comment" required></textarea>
                    </div>
                    <div class="col-12">
                      <button type="submit" class="btn btn-primary" name="submit">Post comment</button>

                    </div>
                </form>
              </div>

            </div>
          </div><!-- End Comments Form -->

        </div>

        <div class="col-md-3">
        
          <!-- ======= Sidebar ======= -->
          <?php include('includes/sidebar.php');?>
        </div>
      </div>
              <!-- Binance Crypto Price -->

              <script src="https://public.bnbstatic.com/unpkg/growth-widget/cryptoCurrencyWidget@0.0.9.min.js" ></script><div class="binance-widget-marquee" data-cmc-ids="1,1027,1839,52,5426,3408,74,3890,5805,7083,5994,2010" data-theme="dark" data-transparent="false" data-locale="en" data-powered-by="Powered by" data-disclaimer="Disclaimer" ></div>

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

 