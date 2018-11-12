<?php

	require_once('functions/function.php');
	 needLogged();
	get_header();
	get_sidebar();
	get_breadcum();
	
	
	
?>
    <div class="col-md-12">
    	<form class="form-horizontal" action="" method="post">
    	<div class="panel panel-primary">
            <div class="panel-heading">
                <div class="col-md-9 heading_title">
                    User Delete
                 </div>
                 <div class="col-md-3 text-right">
                 	<a href="all-user.php" class="btn btn-sm btn btn-primary"><i class="fa fa-th"></i> All User</a>
                </div>
                <div class="clearfix"></div>
            </div>
          <div class="panel-body">
            <h1>Are you sure??</h1>
          </div>
          <div class="panel-footer text-center">
            <button class="btn btn-sm btn-danger" name="delete_btn">Delete</button>
          </div>
        </div>
        </form>
    </div><!--col-md-12 end-->
<?php
	
	if(isset($_POST['delete_btn'])){
		
		$idr = $_GET['id'];
		$deletesql = "DELETE from new_users where user_id = $idr";
		mysqli_query($con,$deletesql);
		
		header("Location: all-user.php");
		exit;
	}
	

	

    get_footer();
?>
