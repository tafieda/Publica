<?php 
session_start();
include('includes/config.php');
include('includes/header.php');
include('includes/navbar.php');
error_reporting(0);
if(strlen($_SESSION['login'])==0)
  { 
header('location:logout.php');
}
else{
if(isset($_POST['update']))
{
$posttitle=$_POST['posttitle'];
$authorname=$_POST['authorname'];
$shortdescrip=$_POST['short'];
$catid=$_POST['category'];
$subcatid=$_POST['subcategory'];
$postdetails=$_POST['postdescription'];
$arr = explode(" ",$posttitle);
$url=implode("-",$arr);
$status=1;
$postid=intval($_GET['pid']);
$query=mysqli_query($con,"update tblposts set PostTitle='$posttitle',CategoryId='$catid',SubCategoryId='$subcatid',AuthorName='$authorname',ShortDescrip='$shortdescrip',PostDetails='$postdetails',PostUrl='$url',Is_Active='$status' where id='$postid'");
if($query)
{
$msg="Post updated ";
}
else{
$error="Something went wrong . Please try again.";    
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
            <h6 class="m-0 font-weight-bold text-primary">Edit Post</h6>

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



            <?php
$postid=intval($_GET['pid']);
$query=mysqli_query($con,"select tblposts.id as postid,tblposts.PostImage,tblposts.PostTitle as title,tblposts.AuthorName,tblposts.ShortDescrip as short,tblposts.PostDetails,tblcategory.CategoryName as category,tblcategory.id as catid,tblsubcategory.SubCategoryId as subcatid,tblsubcategory.Subcategory as subcategory from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join tblsubcategory on tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.id='$postid' and tblposts.Is_Active=1 ");
while($row=mysqli_fetch_array($query))
{
?>

            <form name="addpost" method="post">

                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h6 class="m-0 font-weight-800 text-primary">Author Name</h6>
                </div>
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <input type="text" class="form-control" id="authorname"
                        value="<?php echo htmlentities($row['AuthorName']);?>" name="authorname"
                        placeholder="Enter Author Name" required>
                </div>

                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h6 class="m-0 font-weight-800 text-primary">Post Title</h6>
                </div>
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <input type="text" class="form-control" id="posttitle"
                        value="<?php echo htmlentities($row['title']);?>" name="posttitle" placeholder="Enter title"
                        required>
                </div>

                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h6 class="m-0 font-weight-800 text-primary">Short Description</h6>
                </div>
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <input type="text" class="form-control" id="short"
                        value="<?php echo htmlentities($row['short']);?>" name="short" placeholder="Enter Image/Short Caption"
                        required>
                </div>

                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h6 class="m-0 font-weight-800 text-primary">Category</h6>
                </div>
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <select class="form-control" name="category" id="category" onChange="getSubCat(this.value);"
                        required>
                        <option value="<?php echo htmlentities($row['catid']);?>">
                            <?php echo htmlentities($row['category']);?></option>
                        <?php
// Feching active categories
$ret=mysqli_query($con,"select id,CategoryName from  tblcategory where Is_Active=1");
while($result=mysqli_fetch_array($ret))
{    
?>
                        <option value="<?php echo htmlentities($result['id']);?>">
                            <?php echo htmlentities($result['CategoryName']);?>
                        </option>
                        <?php } ?>

                    </select>
                </div>

                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h6 class="m-0 font-weight-800 text-primary">Sub Category</h6>
                </div>
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <select class="form-control" name="subcategory" id="subcategory" required>
                        <option value="<?php echo htmlentities($row['subcatid']);?>">
                            <?php echo htmlentities($row['subcategory']);?>
                        </option>
                    </select>
                </div>


                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h6 class="m-0 font-weight-800 text-primary">Post Details</h6>
                </div>
                <textarea class="summernote" name="postdescription"
                    required><?php echo htmlentities($row['PostDetails']);?></textarea>
                <div class="d-sm-flex align-items-center justify-content-between mb-4">

                </div>


                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h6 class="m-0 font-weight-800 text-primary">Post Image</h6>
                </div>

                <img src="postimages/<?php echo htmlentities($row['PostImage']);?>" width="300" />
                <br />
                <a href="change-image.php?pid=<?php echo htmlentities($row['postid']);?>">Update Image</a>

                <div class="d-sm-flex align-items-center justify-content-between mb-4">

                </div>

                <?php } ?>
                <div class="d-sm-flex align-items-center justify-content-between mb-4">

                    <button type="submit" name="update" class="btn btn-success waves-effect waves-light">Update
                    </button>

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



<?php } ?>