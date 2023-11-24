<?php 
session_start();
include('includes/config.php');
include('includes/header.php');
include('includes/navbar.php');
error_reporting(0);
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');

  } else {


if($_GET['action']='untrend')
{
$postid=intval($_GET['pid']);
$query=mysqli_query($con,"update tblposts set Is_Trending=0 where id='$postid'");
if($query)
{
$msg="Post deleted ";
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
            <h6 class="m-0 font-weight-bold text-primary">Manage Trending Posts</h6>
        </div>

        <div class="card-body text-center">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Author</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Subcategory</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
$query=mysqli_query($con,"select tblposts.id as postid,tblposts.PostTitle as title,tblposts.AuthorName as author,tblcategory.CategoryName as category,tblsubcategory.Subcategory as subcategory from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join tblsubcategory on tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.Is_Trending=1 ");
$rowcount=mysqli_num_rows($query);
if($rowcount==0)
{
?>
                        <tr>

                            <td colspan="5" align="center">
                                <h5 style="color:red">No record found</h5>
                            </td>
                        </tr>
                        <?php 
} else {
while($row=mysqli_fetch_array($query))
{
?>
                        <tr>
                            <td class="text-info"><?php echo htmlentities($row['author']);?></td>
                            <td class="text-primary"><?php echo htmlentities($row['title']);?></td>
                            <td><?php echo htmlentities($row['category'])?></td>
                            <td><?php echo htmlentities($row['subcategory'])?></td>

                            <td><a href="trending.php?pid=<?php echo htmlentities($row['postid']);?>&&action=untrend"
                                    onclick="return confirm('Do you really want to untrend ?')"
                                    title="remove this post from trending"> <i class="fa fa-trash"
                                        style="color: #f05050"></i></a> </td>

                        </tr>
                        <?php } }?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php
include('includes/scripts.php');
include('includes/footer.php');
 
?>

<?php } ?>