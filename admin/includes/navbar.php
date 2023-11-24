<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['login']==0)) {
  header('location:logout.php');
  } else{



  ?>
<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-newspaper"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Publica</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item active">
    <a class="nav-link" href="dashboard.php">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
    Articles
  </div>

  <!-- Nav Item - Pages Collapse Menu -->
  <!--li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
      aria-controls="collapseTwo">
      <i class="fas fa-fw fa-clipboard"></i>
      <span>Category</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Category Menu</h6>
        <a class="collapse-item" href="categories.php">Manage Category</a>
      </div>
    </div>
  </li-->

  <li class="nav-item">
    <a class="nav-link" href="categories.php">
      <i class="fas fa-fw fa-clipboard"></i>
      <span>Category</span></a>
  </li>


  <!--li class="nav-item">
  <a class="nav-link" href="register.php">
    <i class="fas fa-fw fa-chart-area"></i>
    <i class="mdi mdi-format-list-bulleted"></i>
    <span>Admin Profile</span></a>
</li-->



  <!-- Nav Item - Utilities Collapse Menu -->
  <!--li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true"
      aria-controls="collapseUtilities">
      <i class="fas fa-fw fa-clipboard-list"></i>
      <span>Sub Category</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Sub Category Menu:</h6>
        <a class="collapse-item" href="add-subcategory.php">Add Sub Category</a>
        <a class="collapse-item" href="subcategories.php">Manage Sub Category</a>

      </div>
    </div>
  </li-->
  <li class="nav-item">
    <a class="nav-link" href="subcategories.php">
      <i class="fas fa-fw fa-clipboard-list"></i>
      <span>Sub Category</span></a>
  </li>
  <!-- Nav Item - Posts Menu -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true"
      aria-controls="collapseThree">
      <i class="fas fa-fw fa-file"></i>
      <span>Posts</span>
    </a>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Posts Menu:</h6>
        <a class="collapse-item" href="crop.php">Image Cropper</a>
        <a class="collapse-item" href="add-post.php">Add Posts</a>
        <a class="collapse-item" href="manage-posts.php">Manage Posts</a>
        <a class="collapse-item" href="trash-posts.php">Trash Posts</a>
        <a class="collapse-item" href="status-posts.php">Set Status</a>
      </div>
    </div>
  </li>
  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
    Addons
  </div>



  <!-- Nav Item - Pages Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
      aria-controls="collapsePages">
      <i class="fas fa-fw fa-cogs"></i>
      <span>Pages</span>
    </a>
    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Pages Menu:</h6>
        <a class="collapse-item" href="aboutus.php">About us</a>
        <a class="collapse-item" href="contactus.php">Contact us</a>
        <a class="collapse-item" href="social-links.php">Links</a>
        <a class="collapse-item" href="terms.php">Terms</a>
        <a class="collapse-item" href="Privacypolicy.php">Privacy policy</a>
        <a class="collapse-item" href="advertise.php">Advertise with Us</a>
        <a class="collapse-item" href="Writeforus.php">Write for us</a>
      </div>
    </div>
  </li>

  <!-- Nav Item - Comments Menu -->
  <!--li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true"
      aria-controls="collapseFour">
      <i class="fas fa-fw fa-comments"></i>
      <span>Comments</span>
    </a>
    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Comments Menu:</h6>
        <a class="collapse-item" href="unapprove-comment.php">Waiting for Approval</a>
        <a class="collapse-item" href="manage-comments.php">Approved Comments</a>
      </div>
    </div>
  </li-->
  <li class="nav-item">
    <a class="nav-link" href="manage-comments.php">
      <i class="fas fa-fw fa-comments"></i>
      <span>Comments</span></a>
  </li>

  <!-- Nav Item - Mail Menu -->
  <li class="nav-item">
    <a class="nav-link" href="messages.php">
      <i class="fas fa-fw fa-envelope"></i>
      <span>Mailbox</span></a>
  </li>
  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>
<!-- End of Sidebar -->

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

  <!-- Main Content -->
  <div id="content">

    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

      <!-- Sidebar Toggle (Topbar) -->
      <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
      </button>

      <!-- Topbar Search -->
      <form name="search" action="search.php" method="post" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        <div class="input-group">
          <input type="text" name="searchtitle" class="form-control bg-light border-0 small" placeholder="Search for..."
            aria-label="Search" aria-describedby="basic-addon2">
          <div class="input-group-append">
            <button class="btn btn-primary" type="submit">
              <i class="fas fa-search fa-sm"></i>
            </button>
          </div>
        </div>
      </form>
      

      <!-- Topbar Navbar -->
      <ul class="navbar-nav ml-auto">

        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
        <li class="nav-item dropdown no-arrow d-sm-none">
          <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-search fa-fw"></i>
          </a>
          <!-- Dropdown - Messages -->
          <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
            <form class="form-inline mr-auto w-100 navbar-search">
              <div class="input-group">
                <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                  aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                  <button class="btn btn-primary" type="button">
                    <i class="fas fa-search fa-sm"></i>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </li>
        <?php 
            $query=mysqli_query($con,"select * from tblcomments where status=0");
                        
           
$totneworder=mysqli_num_rows($query);
?>
        <!-- Nav Item - Alerts -->
        <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-bell fa-fw"></i>
            <!-- Counter - Alerts -->
            <span class="badge badge-danger badge-counter"><?php echo htmlentities($totneworder);?></span>
          </a>
          <!-- Dropdown - Alerts -->
          <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
            aria-labelledby="alertsDropdown">
            <h6 class="dropdown-header">
              Alerts Center
            </h6>
            <!--a class="dropdown-item d-flex align-items-center" href="new-birth-application.php">
                  <div class="mr-3">
                    <div class="icon-circle bg-primary">
                      <i class="fas fa-file-alt text-white"></i>
                    
                                                        <a href="new-birth-application.php">
<?php
$query=mysqli_query($con,"select * from tblcomments where status=0 order by id desc LIMIT 5 ");
while($row=mysqli_fetch_array($query))
{  ?>
                                                           
                                                           <div class="small text-gray-500"></div>
                                                                
                                                                
                                                                
                                                         
                                                                
                                                            </div>
                                                        </a>
                                                        </div>
                  </div-->

            <div class="notification-content">

              <a class="dropdown-item d-flex align-items-center" href="unapprove-comment.php">
                <div class="dropdown-list-image mr-3">
                  <div class="icon-circle bg-success">
                    <i class="fas fa-file-alt text-white"></i>
                    <div class="status-indicator bg-warning"></div>
                  </div>
                </div>
                <div>
                  <div class="small text-gray-500"><?php echo $row['postingDate'];?>.</div>
                  <?php 
$pt=$row['comment'];
              echo  (substr($pt,0,35,) . '...');?>

                  <?php  } ?>
                </div>
              </a>

              <a class="dropdown-item text-center small text-gray-500" href="unapprove-comment.php">View All
                Notifications</a>
            </div>
          </div>
        </li>


        <?php 
            $query=mysqli_query($con,"select * from tblcontact");
                        
            $totneworder=mysqli_num_rows($query);
            ?>
        <!-- Nav Item - Messages -->
        <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-envelope fa-fw"></i>
            <!-- Counter - Messages -->
            <span class="badge badge-danger badge-counter"><?php echo htmlentities($totneworder);?></span>
          </a>
          <!-- Dropdown - Messages -->
          <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
            aria-labelledby="messagesDropdown">
            <h6 class="dropdown-header">
              Message Center
            </h6>
            <?php
             $query=mysqli_query($con,"select * from tblcontact order by id desc LIMIT 5");
              while($row=mysqli_fetch_array($query))

{  ?>
            <div class="notification-content">
              <a class="dropdown-item d-flex align-items-center"
                href="view-message.php?mid=<?php echo htmlentities($row['id']);?>">
                <div class="dropdown-list-image mr-3">
                  <img class="rounded-circle" src="../assets/img/usericon.png" alt="">
                  <div class="status-indicator bg-success"></div>
                </div>
                <div class="font-weight-bold">
                  <div class="text-truncate"><?php 
$pt=$row['message'];
              echo  (substr($pt,0,30,) . '...');?>
                  </div>
                  <div class="small text-gray-500"><?php echo $row['name'];?></div>

                </div>

              </a>
              <?php }?>
              <a class="dropdown-item text-center small text-gray-500" href="messages.php">Read More Messages</a>
            </div>
          </div>
        </li>

        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <span class="mr-2 d-none d-lg-inline text-gray-600 small">



            </span>
            <img class="img-profile rounded-circle" src="../assets/img/usericon.png">
          </a>
          <!-- Dropdown - User Information -->

          <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
            <?php 
$adminid=$_SESSION['login'];
$query=mysqli_query($con,"select id, AdminName, AdminUserName, AdminEmailId from tbladmin where AdminUserName='$adminid'");
while($row=mysqli_fetch_array($query))
{

?>
            <a class="dropdown-item" href="profile.php">
              <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
              <?php echo $row['AdminName'];?>
            </a>
            <a class="dropdown-item" href="change-password.php">
              <i class="fas fa-cog fa-sm fa-fw mr-2 text-gray-400"></i>
              Change Password
            </a>
            <!--a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a-->
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
              <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
              Logout
            </a>
          </div>
          <?php } ?>
        </li>
        <?php } ?>
      </ul>

    </nav>
    <!-- End of Topbar -->


    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>


    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">


            <form action="logout.php" method="POST">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
              <button type="submit" name="logout_btn" class="btn btn-primary">Logout</button>

            </form>


          </div>
        </div>
      </div>
    </div>