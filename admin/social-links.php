<?php 
session_start();
error_reporting(0);
include('includes/config.php');
include('includes/header.php');
include('includes/navbar.php');

if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{
if(isset($_POST['update']))
{
$pagetype=1;
$fblink=$_POST['fb'];
$twlink=$_POST['tw'];
$iglink=$_POST['ig'];

$query=mysqli_query($con,"update tbllinks set facebook='$fblink',twitter='$twlink',instagram='$iglink' where id='$pagetype' ");
if($query)
{
$msg="Social media links successfully updated ";
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
            <h6 class="m-0 font-weight-bold text-primary">Social Media Handles</h6>

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
$pagetype=1;
$query=mysqli_query($con,"select facebook,twitter,instagram from tbllinks where id='$pagetype'");
while($row=mysqli_fetch_array($query))
{

?>

<div class="card-body">
<form name="aboutus" method="post">
            
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h6 class="m-0 font-weight-800 text-primary">Facebook Account</h6>
        </div>
        <figcaption style="color: #f05050">Use example.com instead of https://www.example.com</figcaption>
        <input type="text" class="form-control" value="<?php echo htmlentities($row['facebook'])?>" name="fb" required>
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
        </div>

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h6 class="m-0 font-weight-800 text-primary">Twitter Account</h6>
        </div>
        <figcaption style="color: #f05050">Use example.com instead of https://www.example.com</figcaption>
        <input type="text" class="form-control" value="<?php echo htmlentities($row['twitter'])?>" name="tw" required>
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
        </div>

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h6 class="m-0 font-weight-800 text-primary">Instagram Account</h6>
        </div>
        <figcaption style="color: #f05050">Use example.com instead of https://www.example.com</figcaption>
        <input type="text" class="form-control" value="<?php echo htmlentities($row['instagram'])?>" name="ig" required>
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
        </div>

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <button type="submit" name="update" class="btn btn-success waves-effect waves-light">Update</button>
</div>


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






<?php } ?>