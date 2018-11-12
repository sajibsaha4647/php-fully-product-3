	
	<?php
		require_once('functions/function.php');
			 needLogged();
			get_header();
			get_sidebar();
			get_breadcum();
			
		if(!empty($_POST)){
        $name=htmlentities($_POST['name'],ENT_QUOTES);
        $phone=htmlspecialchars($_POST['phone']);
        $user=htmlentities($_POST['username'],ENT_QUOTES);
        $email=$_POST['email'];
        $pw=htmlentities(md5($_POST['pass']),ENT_QUOTES);
        $rpw=htmlentities(md5($_POST['repass']),ENT_QUOTES);
		$role=$_POST['role'];
		$image=$_FILES['pic'];
		$imageName="user-".time().rand(100000,1000000)."-".rand(10000,99999).".".pathinfo($image['name'],PATHINFO_EXTENSION);
	
		$insert="INSERT INTO new_users(user_name,user_phone ,user_user_name,user_email,user_password,role_id,user_photo)
		VALUES('$name','$phone','$user','$email','$pw','$role','$imageName')";
		
		if(mysqli_query($con,$insert)){
			 move_uploaded_file($image['tmp_name'],'uploads/'.$imageName);
			echo "Success! User registration Completed.";
		}else{
			echo "Failed!Please Try again.";
		}
  
		}
	?>

	<div class="col-md-12">
		<form class="form-horizontal" action="" method="Post" enctype="multipart/form-data">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="col-md-9 heading_title">
					user registration 
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
					  <input type="text" class="form-control" name="name">
					</div>
				  </div>
				  <div class="form-group">
					<label for="" class="col-sm-3 control-label">phone</label>
					<div class="col-sm-8">
					  <input type="text" class="form-control" name="phone">
					</div>
				  </div>
				  <div class="form-group">
					<label for="" class="col-sm-3 control-label">username</label>
					<div class="col-sm-8">
					  <input type="text" class="form-control" name="username">
					</div>
				  </div>
				  <div class="form-group">
					<label for="" class="col-sm-3 control-label">Email</label>
					<div class="col-sm-8">
					  <input type="email" class="form-control" name="email">
					</div>
				  </div>
				  <div class="form-group">
					<label for="" class="col-sm-3 control-label">Password</label>
					<div class="col-sm-8">
					  <input type="password" class="form-control" name="pass">
					</div>
				  </div>
				  <div class="form-group">
					<label for="" class="col-sm-3 control-label">Re-Password</label>
					<div class="col-sm-8">
					  <input type="password" class="form-control" name="repass">
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
							<option value="<?= $rd['role_id'];?>"><?= $rd['role_name'];?></option>
						<?php } ?>
					  </select>
					</div>
				  </div>
				 
				  <div class="form-group">
					<label for="" class="col-sm-3 control-label">Radio</label>
					<div class="col-sm-8">
					  <div class="radio">
						  <label>
							<input type="radio" name="optionsRadios" id="" value="1">
							Male
						  </label>
						  <label>
							<input type="radio" name="optionsRadios" id="" value="2">
							Female
						  </label>
						</div>
					</div>
				  </div>
				  <div class="form-group">
					<label for="" class="col-sm-3 control-label">Checkbox</label>
					<div class="col-sm-8">
					  <div class="checkbox-inline">
						  <label>
							<input type="checkbox" id="blankCheckbox" value="option1" aria-label="...">
						  </label>
					   </div>
					   <div class="checkbox-inline">
						  <label>
							<input type="checkbox" id="blankCheckbox" value="option1" aria-label="...">
						  </label>
					   </div>
					</div>
				  </div>
				  <div class="form-group">
					<label for="" class="col-sm-3 control-label">photo</label>
					<div class="col-sm-8">
					  <input type="file" name="pic">
					</div>
				  </div>
			</div>
		  <div class="panel-footer text-center">
			<button class="btn btn-sm btn-primary">REGISTRATION</button>
		  </div>
		</div>
		</form>
	</div><!--col-md-12 end-->
  
<?php

	get_footer();
	
?>  