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



?>
<!-- Begin Page Content -->
<div class="container-fluid">

<div class="card shadow mb-4 mb-xl-0">
        <div class="card-header">
            <!-- Page Heading -->
            <h6 class="m-0 font-weight-bold text-primary">Inbox</h6>
</div>
<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th width="300">Message</th>
                    <th>View</th>
                </tr>
            </thead>
            <tbody>
                <?php 
$query=mysqli_query($con,"Select * from tblcontact order by id desc");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>

                <tr>
                    <th scope="row"><?php echo htmlentities($cnt);?></th>
                    <td><?php echo htmlentities($row['name']);?></td>
                    <td><?php echo htmlentities($row['email']);?></td>
                    <td><?php 
$pt=$row['message'];
              echo  (substr($pt,0,70,) . '...');?></td>

                    <td><a href="view-message.php?mid=<?php echo htmlentities($row['id']);?>"><i class="fa fa-eye"
                                style="color: #29b6f6;"></i></a></td>

                    
                </tr>
                <?php
$cnt++;
 } ?>
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