<?php include('../admin/includes/header.php'); ?>
<?php //include('includes/topbar.php'); ?>
        
        <div class="container">
    
            <div class="row">
              <div class="col-md-8 mr-auto ml-auto text-center py-5 mt-5">
                <!--div class="card"-->
                  <div class="card-body">
                    <h4 class="error mx-auto text-danger" data-text="422">422</h4>
                    <h2 class="card-title text-danger">The Change You Wanted Was Rejected.</h2>
                    <!--p class="card-text">The Page You are searching for is not Available.</p-->
                    <p class="card-text text-gray-500">Maybe you tried to change something you didn't have access to.</p>
                    <a href="dashboard.php" class="btn btn-primary">&larr; Go Back to Home Page</a>
                  </div>
                <!--/div-->
              </div>
            </div>
</div>
         
<?php include('../admin/includes/footer.php') ?>
