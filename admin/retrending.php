<?php 
session_start();
include('includes/config.php');
include('includes/header.php');
include('includes/navbar.php');
error_reporting(0);
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{

if($_GET['action']='retrend')
{
$postid=intval($_GET['pid']);
$query=mysqli_query($con,"update tblposts set Is_Trending=1 where id='$postid'");
if($query)
{
$msg="Post restored successfully ";
}
else{
$error="Something went wrong . Please try again.";    
} 
}


?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="card shadow mb-4 mb-xl-0">
        <div class="card-header">
            <!-- Page Heading -->
            <h6 class="m-0 font-weight-bold text-primary">Restore Trending Posts</h6>
        </div>
      
        <div class="card-body text-center">
        <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Author</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Subcategory</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
$query=mysqli_query($con,"select tblposts.id as postid,tblposts.PostTitle as title,tblposts.AuthorName as author,tblcategory.CategoryName as category,tblsubcategory.Subcategory as subcategory from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join tblsubcategory on tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.Is_Trending=0");
$rowcount=mysqli_num_rows($query);
if($rowcount==0)
{
?>
                        <tr>

                            <td colspan="5" align="center">
                                <h5 class="text-danger">No record found</h5>
                            </td>
                        </tr>
                        <?php 
} else {
while($row=mysqli_fetch_array($query))
{
?>
                        <tr>
                            <td class="text-info"><?php echo htmlentities($row['author']);?></td>
                            <td class="text-primary"><?php echo htmlentities($row['title']);?></td>
                            <td><?php echo htmlentities($row['category'])?></td>
                            <td><?php echo htmlentities($row['subcategory'])?></td>

                            <td>
                                <a href="retrending.php?pid=<?php echo htmlentities($row['postid']);?>&&action=retrend"
                                    onclick="return confirm('Do you really want to restore ?')"> <i class="fas fa-undo"
                                        title="Restore this Post"></i></a>
                                
                                </td>
                        </tr>
                        <?php } }?>

                    </tbody>
                </table>


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