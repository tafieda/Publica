<?php
session_start();
error_reporting(0);
include('includes/config.php');
include('includes/header.php');
include('includes/navbar.php');
?>
<?php
if(strlen($_SESSION['login'])==0) { 
  header('location:logout.php');
  } else{
    ?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <!-- Content Row -->
    <div class="row">
 <!-- Earnings (Monthly) Card Example -->
 
 <div class="col-xl-3 col-md-6 mb-4">
 <a href="categories.php">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Listed Categories</div>
              <?php $query=mysqli_query($con,"select * from tblcategory where Is_Active=1");
$countcat=mysqli_num_rows($query);
//echo '<div class="h5 mb-0 font-weight-bold text-gray-800" data-val="280"> ',$countcat,'</div>'        
{
?>
 <span class="num h6 mb-0 font-weight-bold text-gray-800" data-val="<?php echo $countcat;?>">0</span>
  
    
<?php }?>
              </div>
            <div class="col-auto">
              <i class="fas fa-clipboard fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
      </a>
    </div>
    
       
       
              <!-- Listed Subcategories -->
             
    <div class="col-xl-3 col-md-6 mb-4">
    <a href="subcategories.php">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Listed Subcategories</div>
              <?php $query=mysqli_query($con,"select * from tblsubcategory where Is_Active=1");
$countsubcat=mysqli_num_rows($query);
//echo '<div class="h5 mb-0 font-weight-bold text-gray-800" data-val="280"> ',$countsubcat,'</div>'        
{
  ?>
   <span class="num h6 mb-0 font-weight-bold text-gray-800" data-val="<?php echo $countsubcat;?>">0</span>
    
      
  <?php }?>
           </div>
            <div class="col-auto">
              <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
      </a>
    </div>
       

       
             <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
         <a href="manage-posts.php">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Live News</div>
              <?php $query=mysqli_query($con,"select * from tblposts where Is_Active=1");
$countposts=mysqli_num_rows($query);
//echo '<div class="h5 mb-0 font-weight-bold text-gray-800" data-val="280"> ',$countposts,'</div>'        
{
  ?>
   <span class="num h6 mb-0 font-weight-bold text-gray-800" data-val="<?php echo $countposts;?>">0</span>
    
      
  <?php }?>
              
            </div>
            <div class="col-auto">
              <i class="fas fa-file fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
       </a>
    </div>
       


  

        
              <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
    <a href="trash-posts.php">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Trash News</div>
              <?php $query=mysqli_query($con,"select * from tblposts where Is_Active=0");
$countpost=mysqli_num_rows($query);
//echo '<div class="h6 mb-0 font-weight-bold text-gray-800" data-val="280"> ',$countpost,'</div>'        
  {
  ?>
   <span class="num h6 mb-0 font-weight-bold text-gray-800" data-val="<?php echo $countpost;?>">0</span>
    
    <?php }?> 
  
            </div>
            <div class="col-auto">
              <i class="fas fa-trash fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
     </a> 
  </div>

            
                      

</div>


 
<?php
include('includes/scripts.php');
include('includes/footer.php');
 
?>



<?php } ?>