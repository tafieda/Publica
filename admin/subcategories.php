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
if($_GET['action']=='del' && $_GET['scid'])
{
	$id=intval($_GET['scid']);
	$query=mysqli_query($con,"update  tblsubcategory set Is_Active='0' where SubCategoryId='$id'");
	$msg="Sub-Category deleted ";
}
// Code for restore
if($_GET['resid'])
{
	$id=intval($_GET['resid']);
	$query=mysqli_query($con,"update  tblsubcategory set Is_Active='1' where SubCategoryId='$id'");
	$msg="Sub-Category restored successfully";
}

// Code for Forever deletionparmdel
if($_GET['action']=='perdel' && $_GET['scid'])
{
	$id=intval($_GET['scid']);
	$query=mysqli_query($con,"delete from   tblsubcategory  where SubCategoryId='$id'");
	$delmsg="Sub-Category deleted forever";
}

if(isset($_POST['submitsubcat']))
{
$categoryid=$_POST['category'];
$subcatname=$_POST['subcategory'];
$subcatdescription=$_POST['sucatdescription'];
$status=1;
$query=mysqli_query($con,"insert into tblsubcategory(CategoryId,Subcategory,SubCatDescription,Is_Active) values('$categoryid','$subcatname','$subcatdescription','$status')");
if($query)
{
$succ="Sub-Category created ";
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
                    <h6 class="modal-title m-0 font-weight-bold text-primary" id="exampleModalLabel">Add Sub Category
                        Data</h6>
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
                            <select class="form-control" name="category" required>
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
                            <h6 class="m-0 font-weight-800 text-primary"> Sub Category</h6>
                        </div>
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <input type="text" class="form-control" value="" name="subcategory" required>
                        </div>

                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h6 class="m-0 font-weight-800 text-primary">Sub Category Description</h6>
                        </div>
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <textarea class="form-control" rows="5" name="sucatdescription" required></textarea>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label">&nbsp;</label>

                            <div class="col-md-10">
                                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                    <button type="submit" class="btn btn-success waves-effect waves-light"
                                        name="submitsubcat">
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
            <h6 class="m-0 font-weight-bold text-primary">Manage Sub Categories</h6>
        </div>

        <div class="card-body text-center">

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th> Category</th>
                            <th>Sub Category</th>
                            <th>Description</th>

                            <th>Posting Date</th>
                            <th>Last updation Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
$query=mysqli_query($con,"Select tblcategory.CategoryName as catname,tblsubcategory.Subcategory as subcatname,tblsubcategory.SubCatDescription as SubCatDescription,tblsubcategory.PostingDate as subcatpostingdate,tblsubcategory.UpdationDate as subcatupdationdate,tblsubcategory.SubCategoryId as subcatid from tblsubcategory join tblcategory on tblsubcategory.CategoryId=tblcategory.id where tblsubcategory.Is_Active=1");
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
                            <td><?php echo htmlentities($row['catname']);?></td>
                            <td><?php echo htmlentities($row['subcatname']);?></td>
                            <td><?php echo htmlentities($row['SubCatDescription']);?></td>
                            <td><?php echo htmlentities($row['subcatpostingdate']);?></td>
                            <td><?php echo htmlentities($row['subcatupdationdate']);?></td>
                            <td><a href="edit-subcategory.php?scid=<?php echo htmlentities($row['subcatid']);?>"><i
                                        class="fa fa-edit" style="color: #29b6f6;"></i></a>
                                &nbsp;<a
                                    href="subcategories.php?scid=<?php echo htmlentities($row['subcatid']);?>&&action=del">
                                    <i class="fa fa-trash" style="color: #f05050"></i></a> </td>
                        </tr>
                        <?php
$cnt++;
 }} ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>


    <div class="card shadow mb-4 mb-xl-0">
        <div class="card-header">
            <!-- Page Heading -->
            <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-trash"></i> Deleted Sub Categories</h6>
        </div>

        <div class="card-body text-center">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th> Category</th>
                            <th>Sub Category</th>
                            <th>Description</th>

                            <th>Posting Date</th>
                            <th>Last updation Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
$query=mysqli_query($con,"Select tblcategory.CategoryName as catname,tblsubcategory.Subcategory as subcatname,tblsubcategory.SubCatDescription as SubCatDescription,tblsubcategory.PostingDate as subcatpostingdate,tblsubcategory.UpdationDate as subcatupdationdate,tblsubcategory.SubCategoryId as subcatid from tblsubcategory join tblcategory on tblsubcategory.CategoryId=tblcategory.id where tblsubcategory.Is_Active=0");
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
                            <td><?php echo htmlentities($row['catname']);?></td>
                            <td><?php echo htmlentities($row['subcatname']);?></td>
                            <td><?php echo htmlentities($row['SubCatDescription']);?></td>
                            <td><?php echo htmlentities($row['subcatpostingdate']);?></td>
                            <td><?php echo htmlentities($row['subcatupdationdate']);?></td>
                            <td><a href="subcategories.php?resid=<?php echo htmlentities($row['subcatid']);?>"><i
                                        class="fas fa-undo" title="Restore this SubCategory"></i></a>
                                &nbsp;<a
                                    href="subcategories.php?scid=<?php echo htmlentities($row['subcatid']);?>&&action=perdel">
                                    <i class="fa fa-trash" style="color: #f05050"></i></a> </td>
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

<?php } ?>