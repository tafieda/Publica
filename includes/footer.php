<!-- ======= Footer ======= -->
<footer id="footer" class="footer">

  <div class="footer-content">
    <div class="container">

      <div class="row g-5">
        <div id="clockbox" class="footer-heading" style="text-align:center;"></div>
        <script type="text/javascript">
          var tday = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
          var tmonth = ["January", "February", "March", "April", "May", "June", "July", "August", "September",
            "October", "November", "December"
          ];

          function GetClock() {
            var d = new Date();
            var nday = d.getDay(),
              nmonth = d.getMonth(),
              ndate = d.getDate(),
              nyear = d.getFullYear();
            var nhour = d.getHours(),
              nmin = d.getMinutes(),
              nsec = d.getSeconds(),
              ap;

            if (nhour == 0) {
              ap = " AM";
              nhour = 12;
            } else if (nhour < 12) {
              ap = " AM";
            } else if (nhour == 12) {
              ap = " PM";
            } else if (nhour > 12) {
              ap = " PM";
              nhour -= 12;
            }

            if (nmin <= 9) nmin = "0" + nmin;
            if (nsec <= 9) nsec = "0" + nsec;

            var clocktext = "" + tday[nday] + ", " + tmonth[nmonth] + " " + ndate + ", " + nyear + " " + nhour + ":" +
              nmin + ":" + nsec + ap + "";
            document.getElementById('clockbox').innerHTML = clocktext;
          }

          GetClock();
          setInterval(GetClock, 1000);
        </script>
        <div class="col-lg-4">
          <?php 
$pagetype='aboutus';
$query=mysqli_query($con,"select PageTitle,Description from tblpages where PageName='$pagetype'");
while($row=mysqli_fetch_array($query))
{

?>

          <h3 class="footer-heading">About Publica</h3>
          <p><?php echo $row['PageTitle'];?></p>
          <p><a href="about.php" class="footer-link-more">Learn More</a></p>
          <?php } ?>


        </div>
        <div class="col-6 col-lg-2">
          <h3 class="footer-heading">Navigation</h3>
          <ul class="footer-links list-unstyled">
            <li><a href="index.php"><i class="bi bi-chevron-right"></i> Home</a></li>
            <li><a href="about.php"><i class="bi bi-chevron-right"></i> About us</a></li>
            <li><a href="contact.php"><i class="bi bi-chevron-right"></i> Contact</a></li>
            <li><a href="Write-for-us.php"><i class="bi bi-chevron-right"></i> Write for us</a></li>
          </ul>
          <h3 class="footer-heading"></h3>
          <h3 class="footer-heading">Help & Support</h3>
          <ul class="footer-links list-unstyled">
            <li><a href="Advertise-with-us.php"><i class="bi bi-chevron-right"></i> Advertise</a></li>
            <li><a href="Our-Terms.php"><i class="bi bi-chevron-right"></i> Terms</a></li>
            <li><a href="Privacy-policy.php"><i class="bi bi-chevron-right"></i> Privacy & Policy</a></li>
          </ul>
        </div>
        <div class="col-6 col-lg-2">
          <h3 class="footer-heading">Categories</h3>
          <ul class="footer-links list-unstyled">
            <?php $query=mysqli_query($con,"select id,CategoryName from tblcategory");
while($row=mysqli_fetch_array($query))
{
?>
            <li><a href="category.php?catid=<?php echo htmlentities($row['id'])?>"><i class="bi bi-chevron-right"></i>
                <?php echo htmlentities($row['CategoryName']);?></a></li>
            <?php } ?>
          </ul>
        </div>

        <div class="col-lg-4">
          <h3 class="footer-heading">Recent Posts</h3>
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


$query=mysqli_query($con,"select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.Is_Active=1 order by tblposts.id desc  LIMIT $offset, $no_of_records_per_page");
while ($row=mysqli_fetch_array($query)) {
?>
          <ul class="footer-links footer-blog-entry list-unstyled">
            <li>
              <a href="single.php?nid=<?php echo htmlentities($row['pid'])?>" class="d-flex align-items-center">
                <img src="admin/postimages/<?php echo htmlentities($row['PostImage']);?>" alt="" class="img-fluid me-3">
                <div>
                  <div class="post-meta d-block"><span class="date"><?php echo htmlentities($row['category']);?></span>
                    <span class="mx-1">&bullet;</span>
                    <span><?php echo time_elapsed_string($row['postingdate']);?></span></div>
                  <span><?php echo htmlentities($row['posttitle']);?></span>
                </div>
              </a>
            </li>

            <!--li>
              <a href="single-post.html" class="d-flex align-items-center">
                <img src="assets/img/post-sq-2.jpg" alt="" class="img-fluid me-3">
                <div>
                  <div class="post-meta d-block"><span class="date">Culture</span> <span class="mx-1">&bullet;</span>
                    <span>Jul 5th '22</span></div>
                  <span>What is the son of Football Coach John Gruden, Deuce Gruden doing Now?</span>
                </div>
              </a>
            </li>

            <li>
              <a href="single-post.html" class="d-flex align-items-center">
                <img src="assets/img/post-sq-3.jpg" alt="" class="img-fluid me-3">
                <div>
                  <div class="post-meta d-block"><span class="date">Culture</span> <span class="mx-1">&bullet;</span>
                    <span>Jul 5th '22</span></div>
                  <span>Life Insurance And Pregnancy: A Working Mom’s Guide</span>
                </div>
              </a>
            </li>

            <li>
              <a href="single-post.html" class="d-flex align-items-center">
                <img src="assets/img/post-sq-4.jpg" alt="" class="img-fluid me-3">
                <div>
                  <div class="post-meta d-block"><span class="date">Culture</span> <span class="mx-1">&bullet;</span>
                    <span>Jul 5th '22</span></div>
                  <span>How to Avoid Distraction and Stay Focused During Video Calls?</span>
                </div>
              </a>
            </li-->

          </ul>
          <?php } ?>
        </div>

      </div>
    </div>
  </div>

  <div class="footer-legal">
    <div class="container">

      <div class="row justify-content-between">
        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
          <div class="copyright">
            © <script>
              document.write(new Date().getFullYear())
            </script> <strong><span>Publica</span></strong>. All Rights Reserved
          </div>

          <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/herobiz-bootstrap-business-template/ -->
            Designed by <a href="https://github.com/tafieda/">Codex</a>
          </div>

        </div>

        <div class="col-md-6">
          <div class="social-links mb-3 mb-lg-0 text-center text-md-end">
            <?php $query=mysqli_query($con,"select * from tbllinks");
while($row=mysqli_fetch_array($query))
{
?>
            <a href="https://www.twitter.com/<?php echo htmlentities($row['twitter'])?>" class="twitter"><i
                class="bi bi-twitter-x"></i></a>
            <a href="https://www.facebook.com/<?php echo htmlentities($row['facebook'])?>" class="facebook"><i
                class="bi bi-facebook"></i></a>
            <a href="https://www.instagram.com/<?php echo htmlentities($row['instagram'])?>" class="instagram"><i
                class="bi bi-instagram"></i></a>
            <!--a href="#" class="google-plus"><i class="bi bi-skype"></i></a>
            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a-->
            <?php } ?>
          </div>

        </div>

      </div>

    </div>
  </div>

</footer>