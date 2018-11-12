
	<?php
		require_once('functions/function.php');
		 needLogged();
			get_header();
			get_sidebar();
			get_breadcum();
			
			$id=$_GET['e'];
			$sel="SELECT  * FROM new_users NATURAL JOIN new_roles where user_id='$id'";
			$Q=mysqli_query($con,$sel);
			$datar=mysqli_fetch_array($Q);
			
			
		if(!empty($_POST)){
			$namename = $_POST['name'];
			$phonephone = $_POST['phone'];
			$usernameuser = $_POST['username'];
			$emailemail = $_POST['email'];
			$role = $_POST['role'];
			 $updsql = "UPDATE new_users set user_name='$namename',user_phone='$phonephone',user_user_name='$usernameuser',user_email='$emailemail', role_id='$role' where user_id=$id";
			
			mysqli_query($con,$updsql);
			
			header('Location: all-user.php');
			
			
			
		}	
			
			
			
	?>


	<div class="col-md-12">
		<form class="form-horizontal" action="" method="post">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="col-md-9 heading_title">
					Update user information
				 </div>
				 <div class="col-md-3 text-right">
					<a href="all-user.php" class="btn btn-sm btn btn-primary"><i class="fa fa-th"></i> All user</a>
				</div>
				<div class="clearfix"></div>
			</div>
		  <div class="panel-body">
			  <div class="form-group">
				<label for="" class="col-sm-3 control-label">Name</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" name="name" value="<?=$datar['user_name']?>">
				</div>
			  </div> 
			  <div class="form-group">
				<label for="" class="col-sm-3 control-label">phone</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" name="phone" value="<?=$datar['user_phone']?>">
				</div>
			  </div>
			  <div class="form-group">
				<label for="" class="col-sm-3 control-label">username</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" name="username" value="<?=$datar['user_user_name']?>">
				</div>
			  </div>
			  <div class="form-group">
				<label for="" class="col-sm-3 control-label">Email</label>
				<div class="col-sm-8">
				  <input type="email" class="form-control" name="email" value="<?=$datar['user_email']?>">
				</div>
			  </div>
			  <div class="form-group">
				<label for="" class="col-sm-3 control-label">user role</label>
				<div class="col-sm-4">
				  <select class="form-control select_cus" name="role">
					  <option value="">select role</option>
					 <?php
						$selr="SELECT * FROM new_roles";
						$QR=mysqli_query($con,$selr);
						while($rd=mysqli_fetch_assoc($QR)){
					  ?>
						<option value="<?= $rd['role_id'];?>" <?php if($datar['role_id']==$rd['role_id']){echo 'selected="selected"';}?>><?= $rd['role_name'];?></option>
					<?php } ?>
				  </select>
				</div>
			  </div>
		  </div>
		  <div class="panel-footer text-center">
			<button name='BTN-UP' class="btn btn-sm btn-primary">UPDATE</button>
		  </div>
		</div>
		</form>
	</div><!--col-md-12 end-->
 
<?php

	

	get_footer();
	
?>