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

$imgfile=$_FILES["postimage"]["name"];
// get the image extension
$extension = substr($imgfile,strlen($imgfile)-4,strlen($imgfile));
// allowed extensions
$allowed_extensions = array(".jpg","jpeg",".png",".gif");
// Validation for allowed extensions .in_array() function searches an array for a specific value.
if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
else
{
//rename the image file
$imgnewfile=md5($imgfile).$extension;
// Code for move image into directory
move_uploaded_file($_FILES["postimage"]["tmp_name"],"postimages/".$imgnewfile);



$postid=intval($_GET['pid']);
$query=mysqli_query($con,"update tblposts set PostImage='$imgnewfile' where id='$postid'");
if($query)
{
$msg="Post Feature Image updated ";
}
else{
$error="Something went wrong . Please try again.";    
} 
}
}
?>

<script>
    function getSubCat(val) {
        $.ajax({
            type: "POST",
            url: "get_subcategory.php",
            data: 'catid=' + val,
            success: function (data) {
                $("#subcategory").html(data);
            }
        });
    }
</script>
<!-- Begin Page Content -->
<div class="container-fluid">

<div class="card shadow mb-4 mb-xl-0">
        <div class="card-header">
            <!-- Page Heading -->
            <h6 class="m-0 font-weight-bold text-primary">Update Image</h6>
        
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
    <form name="addpost" method="post" enctype="multipart/form-data">
        <?php
$postid=intval($_GET['pid']);
$query=mysqli_query($con,"select PostImage,PostTitle,AuthorName from tblposts where id='$postid' and Is_Active=1 ");
while($row=mysqli_fetch_array($query))
{
?>

            <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h6 class="m-0 font-weight-800 text-primary">Author Name</h6>
            </div>
            <div class="d-sm-flex align-items-center justify-content-between mb-4">

                <input type="text" class="form-control" id="authorname"
                    value="<?php echo htmlentities($row['AuthorName']);?>" name="authorname" readonly>
            </div>

            <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h6 class="m-0 font-weight-800 text-primary">Post Title</h6>
            </div>
            <div class="d-sm-flex align-items-center justify-content-between mb-4">

                <input type="text" class="form-control" id="posttitle"
                    value="<?php echo htmlentities($row['PostTitle']);?>" name="posttitle" readonly>
            </div>

            <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h6 class="m-0 font-weight-800 text-primary">Current Post Image</h6>
            </div>
            <div class="d-sm-flex align-items-center justify-content-between mb-4">


                <img src="postimages/<?php echo htmlentities($row['PostImage']);?>" width="300" />
                <br />

            </div>


            <?php } ?>
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h6 class="m-0 font-weight-800 text-primary">New Feature Post Image</h6>
            </div>
            <div class="d-sm-flex align-items-center justify-content-between mb-4">

                <input type="file" class="form-control" id="postimage" name="postimage" required>
            </div>

            <div class="d-sm-flex align-items-center justify-content-between mb-4">

                <button type="submit" name="update" class="btn btn-success waves-effect waves-light">Update </button>
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


<script src="../plugins/switchery/switchery.min.js"></script>

<!--Summernote js-->
<script src="../plugins/summernote/summernote.min.js"></script>




<?php } ?>