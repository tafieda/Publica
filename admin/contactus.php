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
$pagetype='contactus';
$address=$_POST['address'];
$pagetitle=$_POST['pagetitle'];
$pagedetails=$_POST['pagedescription'];

$query=mysqli_query($con,"update tblpages set Address='$address',PageTitle='$pagetitle',Description='$pagedetails' where PageName='$pagetype' ");
if($query)
{
$msg="Contact us page successfully updated ";
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
            <h6 class="m-0 font-weight-bold text-primary">Contact Us</h6>

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
                    <h6 class="m-0 font-weight-800 text-primary">Address</h6>
                </div>

                <?php 
$pagetype='contactus';
$query=mysqli_query($con,"select Address,PageTitle,Description from tblpages where PageName='$pagetype'");
while($row=mysqli_fetch_array($query))
{

?>
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <input type="text" class="form-control" id="address" name="address"
                        value="<?php echo htmlentities($row['Address'])?>" required>
                </div>
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h6 class="m-0 font-weight-800 text-primary">Phone Number</h6>
                </div>
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <input type="text" class="form-control" id="pagetitle" name="pagetitle"
                        value="<?php echo htmlentities($row['PageTitle'])?>" required>
                </div>

                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h6 class="m-0 font-weight-800 text-primary">Email</h6>
                </div>
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <input type="text" class="form-control" id="pagedescription" name="pagedescription"
                        value="<?php echo htmlentities($row['Description'])?>" required>
                </div>


                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <button type="submit" name="update" class="btn btn-success waves-effect waves-light">Update and
                        Post</button>

                </div>
                <?php } ?>
            </form>
        </div>
    </div>
</div>


<?php
include('includes/scripts.php');
include('includes/footer.php');
 
?>

<?php } ?>