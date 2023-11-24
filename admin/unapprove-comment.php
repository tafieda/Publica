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
if( $_GET['disid'])
{
	$id=intval($_GET['disid']);
	$query=mysqli_query($con,"update tblcomments set status='0' where id='$id'");
	$msg="Comment unapprove ";
}
// Code for restore
if($_GET['appid'])
{
	$id=intval($_GET['appid']);
	$query=mysqli_query($con,"update tblcomments set status='1' where id='$id'");
	$msg="Comment approved";
}

// Code for deletion
if($_GET['action']=='del' && $_GET['rid'])
{
	$id=intval($_GET['rid']);
	$query=mysqli_query($con,"delete from  tblcomments  where id='$id'");
	$delmsg="Comment deleted forever";
}

?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="card shadow mb-4 mb-xl-0">
        <div class="card-header">
            <!-- Page Heading -->
            <h6 class="m-0 font-weight-bold text-primary">Manage Unapproved Comments</h6>

            <?php if($msg){ ?>
            <div class="alert alert-success" role="alert">
                <strong>Well done!</strong> <?php echo htmlentities($msg);?>
            </div>
            <?php } ?>

            <?php if($delmsg){ ?>
            <div class="alert alert-danger" role="alert">
                <strong>Oh snap!</strong> <?php echo htmlentities($delmsg);?></div>
            <?php } ?>

        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th> Name</th>
                            <th>Email Id</th>
                            <th width="300">Comment</th>
                            <th>Status</th>
                            <th>Post / News</th>
                            <th>Posting Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
$query=mysqli_query($con,"Select tblcomments.id,  tblcomments.name,tblcomments.email,tblcomments.postingDate,tblcomments.comment,tblposts.id as postid,tblposts.PostTitle from  tblcomments join tblposts on tblposts.id=tblcomments.postId where tblcomments.status=0 order by id desc");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>

                        <tr>
                            <th scope="row"><?php echo htmlentities($cnt);?></th>
                            <td><?php echo htmlentities($row['name']);?></td>
                            <td><?php echo htmlentities($row['email']);?></td>
                            <td><?php echo htmlentities($row['comment']);?></td>
                            <td><?php $st=$row['status'];
if($st=='0'):
echo "Wating for approval";
else:
echo "unapproved";
endif;
?></td>


                            <td><a
                                    href="edit-post.php?pid=<?php echo htmlentities($row['postid']);?>"><?php echo htmlentities($row['PostTitle']);?></a>
                            </td>
                            <td><?php echo htmlentities($row['postingDate']);?></td>
                            <td>
                                <?php if($st=='0'):?>
                                <a href="unapprove-comment.php?disid=<?php echo htmlentities($row['id']);?>"
                                    title="Disapprove this comment"><i class="fas fa-ban"
                                        style="color: #29b6f6;"></i></a>
                                <?php else :?>
                                <a href="unapprove-comment.php?appid=<?php echo htmlentities($row['id']);?>"
                                    title="Approve this comment"><i class="fas fa-check"
                                        style="color: #29b6f6;"></i></a>
                                <?php endif;?>

                                &nbsp;<a
                                    href="unapprove-comment.php?rid=<?php echo htmlentities($row['id']);?>&&action=del">
                                    <i class="fa fa-trash" style="color: #f05050"></i></a> </td>
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

<?php } ?>