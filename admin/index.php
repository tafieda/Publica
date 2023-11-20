<?php
 session_start();
error_reporting(0);
//Database Configuration File
include('includes/config.php');
include('includes/header.php');
include('includes/topbar.php');
?>

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-6 col-lg-6 col-md-6">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Login Here!</h1>
                                    
                                </div>
                               


                                <?php

if(isset($_POST['login']))
  {
 
   //LOGIN FORM FUNCTIONALITY
   $uname=$_POST['username'];
   //$password=md5($_POST['password']);
    
    $password=$_POST['password'];
    // Fetch data from database on the basis of username/email and password
    //$sql ="SELECT ID FROM tbladmin WHERE  AdminUserName=:username and AdminPassword=:password";
    
  $sql =mysqli_query($con,"SELECT AdminUserName,AdminEmailId,AdminPassword FROM tbladmin WHERE (AdminUserName='$uname' || AdminEmailId='$uname')");
 
   $num=mysqli_fetch_array($sql);
if($num>0)
{
$hashpassword=$num['AdminPassword']; // Hashed password fething from database
//verifying Password
if (password_verify($password, $hashpassword)) {
$_SESSION['login']=$_POST['username'];
    echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
  }
  else{
  
    echo '<h6 class="text-warning">Invalid Details</h6>';
  }

}
//if username or email not found in database
else{
  
    echo '<h6 class="text-danger">Invalid Details</h6>';
  }
 
}

            ?>
                                <form class="user" method="POST">

                                    <div class="form-group">
                                        <input type="text" name="username" class="form-control form-control-user"
                                            placeholder="Enter Username / Email Address..." value="<?php if(isset($_COOKIE["user_login"])) { echo $_COOKIE["user_login"]; } ?>">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control form-control-user"
                                            placeholder="Password" value="<?php if(isset($_COOKIE["userpassword"])) { echo $_COOKIE["userpassword"]; } ?>">
                                    </div>

                                    <button type="submit" name="login"
                                        class="btn btn-primary btn-user btn-block">Login</button>
                                    <hr>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

<?php
include('includes/footer.php');
include('includes/scripts.php'); 
?>