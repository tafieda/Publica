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
if($_GET['action']=='del' && $_GET['rid'])
{
	$id=intval($_GET['rid']);
	$query=mysqli_query($con,"update tblcategory set Is_Active='0' where id='$id'");
	$msg="Category deleted ";
}
// Code for restore
if($_GET['resid'])
{
	$id=intval($_GET['resid']);
	$query=mysqli_query($con,"update tblcategory set Is_Active='1' where id='$id'");
	$msg="Category restored successfully";
}

// Code for Forever deletionparmdel
if($_GET['action']=='parmdel' && $_GET['rid'])
{
	$id=intval($_GET['rid']);
	$query=mysqli_query($con,"delete from  tblcategory  where id='$id'");
	$delmsg="Category deleted forever";
}

if(isset($_POST['submit']))
{
$category=$_POST['category'];
$description=$_POST['description'];
$status=1;
$query=mysqli_query($con,"insert into tblcategory(CategoryName,Description,Is_Active) values('$category','$description','$status')");
if($query)
{
$succ="Category created ";
}
else{
$error="Something went wrong . Please try again.";    
} 
}
?>

<!-- Begin Page Content -->
<div class="container-fluid">


    <div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h6 class="modal-title m-0 font-weight-bold text-primary" id="exampleModalLabel">Add Category Data</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="POST">

                    <div class="modal-body">

                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h6 class="m-0 font-weight-800 text-primary">Category Title</h6>
                        </div>
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <input type="text" class="form-control" value="" name="category" required>
                        </div>


                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h6 class="m-0 font-weight-800 text-primary">Category Description</h6>
                        </div>
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <textarea class="form-control" rows="5" name="description" required></textarea>
                        </div>


                        <div class="form-group">
                            <label class="col-md-2 control-label">&nbsp;</label>
                            <div class="col-md-10">
                                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                    <button type="submit" class="btn btn-success waves-effect waves-light"
                                        name="submit">
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            </form>
        </div>
    </div>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">

        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
            Add <i class="fas fa-plus-circle"></i>
        </button>

        <?php if($msg){ ?>
        <div class="alert alert-success" role="alert">
            <strong>Well done!</strong> <?php echo htmlentities($msg);?>
        </div>
        <?php } ?>

        <?php if($delmsg){ ?>
        <div class="alert alert-danger" role="alert">
            <strong>Oh snap!</strong> <?php echo htmlentities($delmsg);?></div>
        <?php } ?>

        <!---Success Message--->
        <?php if($succ){ ?>
        <div class="alert alert-success" role="alert">
            <strong>Well done!</strong> <?php echo htmlentities($succ);?>
        </div>
        <?php } ?>

        <!---Error Message--->
        <?php if($error){ ?>
        <div class="alert alert-danger" role="alert">
            <strong>Oh snap!</strong> <?php echo htmlentities($error);?></div>
        <?php } ?>
    </div>
    <div class="card shadow mb-4 mb-xl-0">
        <div class="card-header">
            <!-- Page Heading -->
            <h6 class="m-0 font-weight-bold text-primary">Manage Categories</h6>



        </div>







        <!--a href="add-category.php">
                <button id="addToTable" class="btn btn-success waves-effect waves-light">Add <i
                        class="fas fa-plus-circle"></i></button>
            </a-->


        <div class="card-body text-center">
            <div class="table-responsive">


                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th> Category</th>
                            <th>Description</th>

                            <th>Posting Date</th>
                            <th>Last updation Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
$query=mysqli_query($con,"Select id,CategoryName,Description,PostingDate,UpdationDate from  tblcategory where Is_Active=1");
$cnt=1;
$rowcount=mysqli_num_rows($query);
if($rowcount==0)
{
?>
                <tr>

                    <td colspan="7" align="center">
                        <h5 style="color:red">No record found</h5>
                    </td>
</tr>
                    <?php 
} else {

while($row=mysqli_fetch_array($query))
{
?>


                        <tr>
                            <th scope="row"><?php echo htmlentities($cnt);?></th>
                            <td><?php echo htmlentities($row['CategoryName']);?></td>
                            <td><?php echo htmlentities($row['Description']);?></td>
                            <td><?php echo htmlentities($row['PostingDate']);?></td>
                            <td><?php echo htmlentities($row['UpdationDate']);?></td>
                            <td><a href="edit-category.php?cid=<?php echo htmlentities($row['id']);?>"><i
                                        class="fas fa-edit" style="color: #29b6f6;"></i></a>
                                &nbsp;<a href="categories.php?rid=<?php echo htmlentities($row['id']);?>&&action=del">
                                    <i class="fas fa-trash" style="color: #f05050"></i></a> </td>
                        </tr>
                        <?php
$cnt++;
 } }?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
    <!--- end row -->


    <div class="card shadow mb-4 mb-xl-0">
        <div class="card-header">
            <!-- Page Heading -->
            <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-trash"></i> Deleted Categories</h6>
        </div>

        <div class="card-body text-center">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th> Category</th>
                            <th>Description</th>

                            <th>Posting Date</th>
                            <th>Last updation Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
$query=mysqli_query($con,"Select id,CategoryName,Description,PostingDate,UpdationDate from  tblcategory where Is_Active=0");
$cnt=1;
$rowcount=mysqli_num_rows($query);
if($rowcount==0)
{
?>
                <tr>

                    <td colspan="7" align="center">
                        <h5 style="color:red">No record found</h5>
                    </td>
</tr>
                    <?php 
} else {

while($row=mysqli_fetch_array($query))
{
?>


                        <tr>
                            <th scope="row"><?php echo htmlentities($cnt);?></th>
                            <td><?php echo htmlentities($row['CategoryName']);?></td>
                            <td><?php echo htmlentities($row['Description']);?></td>
                            <td><?php echo htmlentities($row['PostingDate']);?></td>
                            <td><?php echo htmlentities($row['UpdationDate']);?></td>
                            <td><a href="categories.php?resid=<?php echo htmlentities($row['id']);?>"><i
                                        class="fas fa-undo" title="Restore this category"></i></a>
                                &nbsp;<a
                                    href="categories.php?rid=<?php echo htmlentities($row['id']);?>&&action=parmdel"
                                    title="Delete forever"> <i class="fas fa-trash" style="color: #f05050"></i> </td>

                            </a>
                        </tr>
                        <?php
$cnt++;
 } }?>
                    </tbody>

                </table>


            </div>
        </div>
    </div>









</div> <!-- container -->

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