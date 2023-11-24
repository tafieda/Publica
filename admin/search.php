<?php 
session_start();
error_reporting(0);
include('includes/config.php');
include('includes/header.php');
include('includes/navbar.php');

    ?>


<!-- Blog Post -->
<?php 
        if($_POST['searchtitle']!=''){
$st=$_SESSION['searchtitle']=$_POST['searchtitle'];
}
$st;
             




     if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        $no_of_records_per_page = 8;
        $offset = ($pageno-1) * $no_of_records_per_page;


        $total_pages_sql = "SELECT COUNT(*) FROM tblposts";
        $result = mysqli_query($con,$total_pages_sql);
        $total_rows = mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $no_of_records_per_page);


$query=mysqli_query($con,"select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.PostTitle like '%$st%' and tblposts.Is_Active=1 LIMIT $offset, $no_of_records_per_page");

$rowcount=mysqli_num_rows($query);
if($rowcount==0)
{
echo "No record found";
}
else {
while ($row=mysqli_fetch_array($query)) {


?>
<!-- Begin Page Content -->
<div class="container-fluid">

<div class="card mb-4">
      
<div class="card-body">
<!--a href="../single.php?nid=<?php echo htmlentities($row['pid'])?>" class="me-1 thumbnail">
                <img src="postimages/<?php echo htmlentities($row['PostImage']);?>" alt="<?php echo htmlentities($row['posttitle']);?>" class="img-fluid">
              </a-->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
  


    <h2 class="card-title"><?php echo htmlentities($row['posttitle']);?></h2>
    </div>
     <div class="d-sm-flex align-items-center justify-content-between mb-4 text-muted">
     <p><?php 
$pt=$row['postdetails'];
echo  (substr($pt,0,230). '...');?></p>
</div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4 text-muted">
         <a href="edit-post.php?pid=<?php echo htmlentities($row['pid'])?>" class="btn btn-success"><i
                                        class="fa fa-edit"></i> Edit</a>
                                        <a href="../single.php?nid=<?php echo htmlentities($row['pid'])?>" class="btn btn-warning"><i
                                        class="fa fa-eye"></i> Read</a>
 </div>
  <div class="d-sm-flex align-items-center justify-content-between mb-4 text-muted">
  
    Posted on <?php echo htmlentities($row['postingdate']);?>
    </div>
  </div>
  </div>
  </div>
<?php } ?>


<!--ul class="pagination justify-content-center mb-4">
  <li class="page-item"><a href="?pageno=1" class="page-link">First</a></li>
  <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?> page-item">
    <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>" class="page-link">Prev</a>
  </li>
  <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?> page-item">
    <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?> "
      class="page-link">Next</a>
  </li>
  <li class="page-item"><a href="?pageno=<?php echo $total_pages; ?>" class="page-link">Last</a></li>
</ul-->

<?php } ?>

<?php
include('includes/scripts.php');
include('includes/footer.php');
 
?>