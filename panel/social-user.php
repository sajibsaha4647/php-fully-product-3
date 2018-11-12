
	<?php
		require_once('functions/function.php');
		needLogged();
		get_header();
		get_sidebar();
		get_breadcum();
		
		$sels="SELECT * FROM new_social_media WHERE  sm_id=1";
		$sq=mysqli_query($con,$sels);
		$social=mysqli_fetch_assoc($sq);
		
		if(!empty($_POST)){
			$fb=$_POST['facebook'];
			$twi=$_POST['twitter'];
			$link=$_POST['linkedin'];
			$google=$_POST['google'];
			$behance=$_POST['behance'];
			
			$update="UPDATE new_social_media SET sm_facebook='$fb',sm_twitter='$twi',sm_linkedin='$link',sm_google='$google',sm_behance='$behance'";
			
			if(mysqli_query($con,$update)){
				
				
			}
		}
		
			
	?>


	<div class="col-md-12">
		<form class="form-horizontal" action="" method="post">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="col-md-9 heading_title">
					social media
				 </div>
				 <div class="col-md-3 text-right">
					<a href="#" class="btn btn-sm btn btn-primary"><i class="fa fa-th"></i> All</a>
				</div>
				<div class="clearfix"></div>
			</div>
		  <div class="panel-body">
			 <div class="col-md-6">
				 <div class="form-group">
					<div class="input-group">
					  <div class="input-group-addon"><i class="fa fa-facebook-square"></i></div>
					  <input type="text" class="form-control" name="facebook" value="<?= $social['sm_facebook'];?>">
					</div>
				  </div>
				  <div class="form-group">
					<div class="input-group">
					  <div class="input-group-addon"><i class="fa fa-twitter-square"></i></div>
					  <input type="text" class="form-control" name="twitter" value="<?= $social['sm_twitter'];?>">
					</div>
				  </div>
				  <div class="form-group">
					<div class="input-group">
					  <div class="input-group-addon"><i class="fa fa-linkedin-square"></i></div>
					  <input type="text" class="form-control" name="linkedin" value="<?= $social['sm_linkedin'];?>">
					</div>
				  </div>
			 </div>
			 <div class="col-md-6">
				 <div class="form-group">
					<div class="input-group">
					  <div class="input-group-addon"><i class="fa fa-google"></i></div>
					  <input type="text" class="form-control" name="google" value="<?= $social['sm_google'];?>">
					</div>
				  </div>
				  <div class="form-group">
					<div class="input-group">
					  <div class="input-group-addon"><i class="fa fa-behance-square"></i></div>
					  <input type="text" class="form-control" name="behance" value="<?= $social['sm_behance'];?>">
					</div>
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