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
if(isset($_POST['update']))
{
$pagetype='aboutus';
$pagetitle=$_POST['pagetitle'];
$pagedetails=$_POST['pagedescription'];

$query=mysqli_query($con,"update tblpages set PageTitle='$pagetitle',Description='$pagedetails' where PageName='$pagetype' ");
if($query)
{
$msg="About us page successfully updated ";
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
            <h6 class="m-0 font-weight-bold text-primary">About Us</h6>
  

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


        </div>
        <div class="card-body">
        <form name="aboutus" method="post">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h6 class="m-0 font-weight-800 text-primary">Company History</h6>

</div>
        <?php 
$pagetype='aboutus';
$query=mysqli_query($con,"select PageTitle,Description from tblpages where PageName='$pagetype'");
while($row=mysqli_fetch_array($query))
{

?>

        
        <textarea class="summernote" name="pagetitle"
                required><?php echo htmlentities($row['PageTitle'])?></textarea>
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
            
            </div>
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h6 class="m-0 font-weight-800 text-primary">Mission & Vision</h6>
        </div>
          <textarea class="summernote" name="pagedescription"
                required><?php echo htmlentities($row['Description'])?></textarea>
        
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
          </div>

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <button type="submit" name="update" class="btn btn-success waves-effect waves-light">Update and
                Post</button>

      

        </form>
        </div>
        </div>
        </div>
<?php
include('includes/scripts.php');
include('includes/footer.php');
 
?>


<!-- Content Row -->












<?php } ?>





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

<!--Summernote js-->
<script src="../plugins/summernote/summernote.min.js"></script>
<!-- Select 2 -->
<script src="../plugins/select2/js/select2.min.js"></script>
<!-- Jquery filer js -->
<script src="../plugins/jquery.filer/js/jquery.filer.min.js"></script>

<!-- page specific js -->
<script src="assets/pages/jquery.blog-add.init.js"></script>

<!-- App js -->
<script src="assets/js/jquery.core.js"></script>
<script src="assets/js/jquery.app.js"></script>

<script>
    jQuery(document).ready(function () {

        $('.summernote').summernote({
            height: 240, // set editor height
            minHeight: null, // set minimum height of editor
            maxHeight: null, // set maximum height of editor
            focus: false // set focus to editable area after initializing summernote
        });
        // Select2
        $(".select2").select2();

        $(".select2-limiting").select2({
            maximumSelectionLength: 2
        });
    });
</script>
<script src="../plugins/switchery/switchery.min.js"></script>

<!--Summernote js-->
<script src="../plugins/summernote/summernote.min.js"></script>



<?php } ?>