<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
error_reporting(0);
if (strlen($_SESSION['login']==0)) {
  header('location:logout.php');
  } else{
    ?>
       <!-- Basic Form Start -->
       <div class="container-fluid">
                    <!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Change Password</h6>
    </div>
  <div class="card-body">     
    <?php
if(isset($_POST['submit']))
{
$adminid=$_SESSION['login'];
$cpassword=md5($_POST['currentpassword']);
$newpassword=md5($_POST['newpassword']);
$sql ="SELECT id FROM tbladmin WHERE id=:adminid and AdminPassword=:cpassword";
$query= $dbh -> prepare($sql);
$query-> bindParam(':adminid', $adminid, PDO::PARAM_STR);
$query-> bindParam(':cpassword', $cpassword, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);

if($query -> rowCount() > 0)
{
$con="update tbladmin set AdminPassword=:newpassword where id=:adminid";
$chngpwd1 = $dbh->prepare($con);
$chngpwd1-> bindParam(':adminid', $adminid, PDO::PARAM_STR);
$chngpwd1-> bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
$chngpwd1->execute();
echo '<h6 class="text-center text-success">Your password successfully changed</h6>';


} else {
  echo '<h6 class="text-center text-danger">Your current password is wrong</h6>';


}



}

  
  ?>

    <script type="text/javascript">
function checkpass()
{
if(document.changepassword.newpassword.value!=document.changepassword.confirmpassword.value)
{
alert('New Password and Confirm Password field does not match');
document.changepassword.confirmpassword.focus();
return false;
}
return true;
}   

</script>
   
          
         
                                                    
                                                    <form method="post" onsubmit="return checkpass();" name="changepassword" method="post">
                                                      
                                                        <div class="form-group">
                                                            
                                                                    <label>Current Password:</label>
                                                                
                                                                     <input type="password" class="form-control" name="currentpassword" id="currentpassword"required='true'>
                                                               
                                                        </div>
                                                        <div class="form-group">
                                                            
                                                                    <label>New Password:</label>
                                                             
                                                                     <input type="password" class="form-control" name="newpassword"  class="form-control" required="true">
                                                              
                                                        </div>
                                                         <div class="form-group">
                                                            
                                                                    <label>Confirm Password:</label>
                                                              
                                                                    <input type="password" class="form-control"  name="confirmpassword" id="confirmpassword"  required='true'>
                                                             
                                                        </div>
                                                 
                                                 
                                                        <div class="form-group">
                                                           
                                                                            <button class="btn btn-sm btn-primary login-submit-cs" type="submit" name="submit">Save Change</button>
                                                                        </div>
                                                                  
                                                    </form>
                                            
            <!-- Basic Form End-->

        </div>
    </div>
    <?php
include('includes/scripts.php');
include('includes/footer.php');
?><?php }  ?>
