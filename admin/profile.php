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
    $adminid=$_SESSION['login']; 
    $AName=$_POST['adminname'];
    $AUName=$_POST['adminuname'];
    $Atitle=$_POST['admintitle'];
    $Aemail=$_POST['email'];
    $ABio=$_POST['biography'];
        
    // Updation Sql is set to accept Null value so, i can't update it right now
    //date_default_timezone_set('Africa/Lagos');// change according timezone
    //$currentTime = date( 'd-m-Y h:i:s A', time () );
     //UpdationDate='$currentTime'

    $query=mysqli_query($con,"update tbladmin set AdminUserName='$AUName', AdminName='$AName', AdminTitle='$Atitle', AdminBio='$ABio', AdminEmailid='$Aemail' where AdminUserName='$adminid'");

  
//echo '<h6 class="text-center text-success">Profile has been updated</h6>';
if($query)
{
$msg="Profile Updated Successfully !!!";
}
else{
$error="Something went wrong. Please try again.";    
} 
}


?>





<?php 
$adminid=$_SESSION['login'];

$query=mysqli_query($con,"select * from tbladmin where AdminUserName='$adminid'");
while($row=mysqli_fetch_array($query))
{

?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-4">
            <div class="card shadow mb-4 mb-xl-0">
                <div class="card-header">
                    <!-- Page Heading -->
                    <h6 class="m-0 font-weight-bold text-primary">Profile Image</h6>

                </div>
                <div class="card-body text-center">

                    <img src="postimages/<?php echo htmlentities($row['Photo']);?>" name="photo" alt=""
                        class="img-account-profile rounded-circle mb-2">
                    <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                    <button class="btn btn-primary" type="button">Upload new image</button>
                </div>

            </div>
        </div>

        <div class="col-xl-8">
            <div class="card shadow mb-auto">
                <div class="card-header py-3">
                    <!-- Page Heading -->
                    <h6 class="m-0 font-weight-bold text-primary">Profile Details</h6>
                </div>
                <!--div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Profile</h1-->

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

                <!--/div-->


                <div class="card-body">




                    <form class="form-horizontal" method="post">



                        <div class="d-sm-flex align-items-center justify-content-between mb-4">

                            <h1 class="h5 mb-0 text-gray-800">Full Name</h1>
                        </div>
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">

                            <input type="text" class="form-control" value="<?php echo $row['AdminName'];?>"
                                name="adminname">
                        </div>

                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h5 mb-0 text-gray-800">User Name</h1>
                        </div>

                        <div class="d-sm-flex align-items-center justify-content-between mb-4">

                            <input type="text" class="form-control" value="<?php echo $row['AdminUserName'];?>"
                                name="adminuname" readonly="true">
                        </div>

                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h5 mb-0 text-gray-800">Title / Position</h1>
                        </div>
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">

                            <input type="text" class="form-control" value="<?php echo $row['AdminTitle'];?>"
                                name="admintitle" readonly="true">
                        </div>

                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h5 mb-0 text-gray-800">Email</h1>
                        </div>
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">

                            <input type="text" class="form-control" value="<?php echo $row['AdminEmailId'];?>"
                                name="email" required>
                        </div>

                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h5 mb-0 text-gray-800">Biography</h1>
                        </div>
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">

                            <textarea class="summernote" name="biography"
                                required><?php echo $row['AdminBio'];?></textarea>
                        </div>

                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h5 mb-0 text-gray-800">Admin Registration Date</h1>
                        </div>
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">

                            <input type="text" class="form-control" value="<?php echo $row['CreationDate'];?>"
                                readonly="true" name="">
                        </div>


                        <div class="form-group">
                            <label class="col-md-4 control-label">&nbsp;</label>
                            <div class="d-sm-flex align-items-center justify-content-between mb-4">


                                <button type="submit" class="btn btn-success waves-effect waves-light btn-md"
                                    name="submit">
                                    Submit
                                </button>
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

        <?php } }?>