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
            <h6 class="m-0 font-weight-bold text-primary">Inbox Details</h6>
        </div>

        <?php
$contactid=intval($_GET['mid']);
$query=mysqli_query($con,"select * from tblcontact where id='$contactid'");
while($row=mysqli_fetch_array($query))
{
?>

        <div class="card-body">
            <form name="addpost" method="post">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h6 class="m-0 font-weight-800 text-primary">Sender's Name</h6>
                </div>
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <input type="text" class="form-control" id="posttitle"
                        value="<?php echo htmlentities($row['name']);?>" name="name" placeholder="Name" readonly>
                </div>
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h6 class="m-0 font-weight-800 text-primary">Sender's Email</h6>
                </div>
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <input type="text" class="form-control" id="posttitle"
                        value="<?php echo htmlentities($row['email']);?>" name="email" placeholder="Email" readonly>
                </div>
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h6 class="m-0 font-weight-800 text-primary">Sender's Message</h6>
                </div>
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <textarea class="form-control" name="message" rows="5" placeholder="Message"
                        readonly><?php echo htmlentities($row['message']);?></textarea>
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



<?php } ?>