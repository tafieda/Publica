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
if(isset($_POST['submit']))
{
$catid=intval($_GET['cid']);
$category=$_POST['category'];
$description=$_POST['description'];
$query=mysqli_query($con,"Update  tblcategory set CategoryName='$category',Description='$description' where id='$catid'");
if($query)
{
$msg="Category Updated successfully ";
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
            <h6 class="m-0 font-weight-bold text-primary">Edit Category</h6>

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


        <?php 
$catid=intval($_GET['cid']);
$query=mysqli_query($con,"Select id,CategoryName,Description,PostingDate,UpdationDate from  tblcategory where Is_Active=1 and id='$catid'");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>


        <div class="card-body">
            <form class="form-horizontal" name="category" method="post">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h6 class="m-0 font-weight-800 text-primary">Category Title</h6>
                </div>
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <input type="text" class="form-control" value="<?php echo htmlentities($row['CategoryName']);?>"
                        name="category" required>
                </div>


                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h6 class="m-0 font-weight-800 text-primary">Category Description</h6>
                </div>
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <textarea class="form-control" rows="5" name="description"
                        required><?php echo htmlentities($row['Description']);?></textarea>
                </div>

                <?php } ?>
                <div class="form-group">
                    <label class="col-md-2 control-label">&nbsp;</label>
                    <div class="col-md-10">
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <button type="submit" class="btn btn-success waves-effect waves-light btn-md" name="submit">
                                Update
                            </button>
                        </div>
                    </div>
                </div>
            </form>
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

<!-- App js -->
<script src="assets/js/jquery.core.js"></script>
<script src="assets/js/jquery.app.js"></script>

<?php } ?>