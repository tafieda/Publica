<?php

include('includes/header.php');
include('includes/navbar.php');
?>
<?php 
session_start();
include('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
  }
  else {
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="card shadow mb-4 mb-xl-0">
        <div class="card-header">
            <!-- Page Heading -->
            <h6 class="m-0 font-weight-bold text-primary">Manage Trending/Popular Posts</h6>
        </div>
        <div class="row">
 <div class="col-xl-3 col-md-6 mb-4">
 <a href="popular.php">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Popular Posts</div>
              <?php $query=mysqli_query($con,"select * from tblposts where Is_Popular=1");
$countcat=mysqli_num_rows($query);
echo '<div class="h6 mb-0 font-weight-bold text-gray-800" data-val="280"> ',$countcat,'</div>'        

?>
 <!--span class="num h6 mb-0 font-weight-bold text-gray-800" data-val="<?php echo $countcat;?>">0</span-->
  
              </div>
         </div>
      </div>
      </a>
    </div>
    
 <div class="col-xl-3 col-md-6 mb-4">
 <a href="trending.php">
    <div class="card-body">
           <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Trending Posts</div>
              <?php $query=mysqli_query($con,"select * from tblposts where Is_Trending=1");
$countcat=mysqli_num_rows($query);
echo '<div class="h6 mb-0 font-weight-bold text-gray-800" data-val="280"> ',$countcat,'</div>'        

?>
 <!--span class="num h6 mb-0 font-weight-bold text-gray-800" data-val="<?php echo $countcat;?>">0</span-->
  

              </div>
            </div>
      </div>

    </a>
    </div>
    

 <div class="col-xl-3 col-md-6 mb-4">
 <a href="repopular.php">
    <div class="card-body">
           <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Not Popular Posts</div>
              <?php $query=mysqli_query($con,"select * from tblposts where Is_Popular=0");
$countcat=mysqli_num_rows($query);
echo '<div class="h6 mb-0 font-weight-bold text-gray-800" data-val="280"> ',$countcat,'</div>'        

?>
 <!--span class="num h6 mb-0 font-weight-bold text-gray-800" data-val="<?php echo $countcat;?>">0</span-->
  
              </div>
            </div>
      </div>
      </a>
    </div>


 <div class="col-xl-3 col-md-6 mb-4">
 <a href="retrending.php">
    <div class="card-body">
           <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Not Trending Posts</div>
              <?php $query=mysqli_query($con,"select * from tblposts where Is_Trending=0");
$countcat=mysqli_num_rows($query);
echo '<div class="h6 mb-0 font-weight-bold text-gray-800" data-val="280"> ',$countcat,'</div>'        

?>
 <!--span class="num h6 mb-0 font-weight-bold text-gray-800" data-val="<?php echo $countcat;?>">0</span-->
  
              </div>
            </div>
      </div>
      </a>
    </div>
    </div>
</div>
</div>

<?php
include('includes/scripts.php');
include('includes/footer.php');
 
?>

    <script>
        var resizefunc = [];
    </script>

    <!-- jQuery  -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/detect.js"></script>
    <script src="assets/js/fastclick.js"></script>
    <script src="assets/js/jquery.blockUI.js"></script>
    <script src="assets/js/waves.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="../plugins/switchery/switchery.min.js"></script>

    <!-- CounterUp  -->
    <script src="../plugins/waypoints/jquery.waypoints.min.js"></script>
    <script src="../plugins/counterup/jquery.counterup.min.js"></script>

    <!--Morris Chart-->
    <script src="../plugins/morris/morris.min.js"></script>
    <script src="../plugins/raphael/raphael-min.js"></script>

    <!-- Load page level scripts-->
    <script src="../plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="../plugins/jvectormap/gdp-data.js"></script>
    <script src="../plugins/jvectormap/jquery-jvectormap-us-aea-en.js"></script>


    <!-- Dashboard Init js -->
    <script src="assets/pages/jquery.blog-dashboard.js"></script>

    <!-- App js -->
    <script src="assets/js/jquery.core.js"></script>
    <script src="assets/js/jquery.app.js"></script>
    <?php } ?>