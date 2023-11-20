<?php
session_start();
include('includes/config.php');
include('includes/header.php');
include('includes/navbar.php');
//include('includes/topheader.php');
error_reporting(0);
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{
    ?>
     
     <link href="components/imgareaselect/css/imgareaselect-default.css" rel="stylesheet" media="screen">
  <link rel="stylesheet" href="css/jquery.awesome-cropper.css">




    

        <!-- Begin Page Content -->
        <div class="container-fluid">
        <div class="card shadow mb-4 mb-xl-0">
        <div class="card-header">
            <!-- Page Heading -->
            <h6 class="m-0 font-weight-bold text-primary">Image Cropper</h6>
        </div>

        <div class="card-body">
            
          

          <form >
            <hr>
            
            <input id="sample_input" type="hidden" name="test[image]">
          <hr>
          </form>

       
   </div>
   </div>
       
      </div>
      <!-- /.container-fluid -->







      <?php
include('includes/scripts.php');
include('includes/footer.php');
 
?>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
        <script src="components/imgareaselect/scripts/jquery.imgareaselect.js"></script>
        <script src="build/jquery.awesome-cropper.js"></script>
        <script>
          $(document).ready(function () {
            $('#sample_input').awesomeCropper({
              width: 200,
              height: 200,
              debug: true
            });
          });
        </script>
       

      <?php } ?>