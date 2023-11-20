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

// For adding post  
if(isset($_POST['submit']))
{
$posttitle=$_POST['posttitle'];
$authorname=$_POST['authorname'];
$shortdescrip=$_POST['short'];
$catid=$_POST['category'];
$subcatid=$_POST['subcategory'];
$postdetails=$_POST['postdescription'];
$arr = explode(" ",$posttitle);
$url=implode("-",$arr);
$imgfile=$_FILES["postimage"]["name"];
// get the image extension
$extension = substr($imgfile,strlen($imgfile)-4,strlen($imgfile));
// allowed extensions
$allowed_extensions = array(".jpg",".jpeg",".png",".gif");
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

$status=1;
$query=mysqli_query($con,"insert into tblposts(PostTitle,CategoryId,SubCategoryId,AuthorName,ShortDescrip,PostDetails,PostUrl,Is_Active,PostImage) values('$posttitle','$catid','$subcatid','$authorname','$shortdescrip','$postdetails','$url','$status','$imgnewfile')");
if($query)
{
$msg="Post successfully added ";
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
            <h6 class="m-0 font-weight-bold text-primary">Add Post</h6>

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

            <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h6 class="m-0 font-weight-800 text-primary">Author Name</h6>
        </div>
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <input type="text" class="form-control" id="authorname" name="authorname" placeholder="Enter Author Name"
                    required>
            </div>

            <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h6 class="m-0 font-weight-800 text-primary">Post Title</h6>
        </div>
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <input type="text" class="form-control" id="posttitle" name="posttitle" placeholder="Enter Title"
                    required>
            </div>

            <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h6 class="m-0 font-weight-800 text-primary">Short Description</h6>
        </div>
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <input type="text" class="form-control" id="short" name="short" placeholder="Enter Image/Short Caption"
                    required>
            </div>

            <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h6 class="m-0 font-weight-800 text-primary">Category</h6>
            </div>
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <select class="form-control" name="category" id="category" onChange="getSubCat(this.value);" required>
                    <option value="">Select Category </option>
                    <?php
// Feching active categories
$ret=mysqli_query($con,"select id,CategoryName from  tblcategory where Is_Active=1");
while($result=mysqli_fetch_array($ret))
{    
?>
                    <option value="<?php echo htmlentities($result['id']);?>">
                        <?php echo htmlentities($result['CategoryName']);?></option>
                    <?php } ?>

                </select>
            </div>

            <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h6 class="m-0 font-weight-800 text-primary">Sub Category</h6>
            </div>
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <select class="form-control" name="subcategory" id="subcategory" required>

                </select>
            </div>


            <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h6 class="m-0 font-weight-800 text-primary">Post Details</h6>
                        </div>

            <textarea class="summernote" name="postdescription" required></textarea>
            <div class="d-sm-flex align-items-center justify-content-between mb-4">

            </div>


            <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h6 class="m-0 font-weight-800 text-primary">Feature Image</h6>
            </div>
            <div class="d-sm-flex align-items-center justify-content-between mb-4">

                <input type="file" class="form-control" id="postimage" name="postimage" required>
            </div>

            <div class="d-sm-flex align-items-center justify-content-between mb-4">

                <button type="submit" name="submit" class="btn btn-success waves-effect waves-light">Save and
                    Post</button>
                <button type="button" class="btn btn-danger waves-effect waves-light">Discard</button>

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




<?php } ?>