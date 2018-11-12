	
	<?php
		require_once('functions/function.php');
			 needLogged();
			get_header();
			get_sidebar();
			get_breadcum();
			
		if(!empty($_POST)){
        $title=htmlentities($_POST['title'],ENT_QUOTES);
        $subtitle=htmlspecialchars($_POST['subtitle']);
        $btntext=htmlentities($_POST['btntext'],ENT_QUOTES);
        $btnurl=htmlentities($_POST['btnurl'],ENT_QUOTES);
		$image=$_FILES['pic'];
		$imageName="banner-".time().rand(100000,1000000)."-".rand(10000,99999).".".pathinfo($image['name'],PATHINFO_EXTENSION);
	
		$insert="INSERT INTO new_banners(ban_title,ban_sub_title,ban_btn_text,ban_btn_url,ban_image)
		VALUES('$title','$subtitle','$btntext','$btnurl','$imageName')";
		
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
					Banner upload
				 </div>
				 <div class="col-md-3 text-right">
					<a href="#" class="btn btn-sm btn btn-primary"><i class="fa fa-th"></i> All user</a>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="panel-body">
				  <div class="form-group">
					<label for="" class="col-sm-3 control-label">banner title</label>
					<div class="col-sm-8">
					  <input type="text" class="form-control" name="title">
					</div>
				  </div>
				  <div class="form-group">
					<label for="" class="col-sm-3 control-label">banner subtitle</label>
					<div class="col-sm-8">
					  <input type="text" class="form-control" name="subtitle">
					</div>
				  </div>
				  <div class="form-group">
					<label for="" class="col-sm-3 control-label">button text</label>
					<div class="col-sm-8">
					  <input type="text" class="form-control" name="btntext">
					</div>
				  </div>
				  <div class="form-group">
					<label for="" class="col-sm-3 control-label">button url</label>
					<div class="col-sm-8">
					  <input type="text" class="form-control" name="btnurl">
					</div>
				  </div>
				  <div class="form-group">
					<label for="" class="col-sm-3 control-label">banner image</label>
					<div class="col-sm-8">
					  <input type="file" name="pic">
					</div>
				  </div>
			</div>
		  <div class="panel-footer text-center">
			<button class="btn btn-sm btn-primary">upload</button>
		  </div>
		</div>
		</form>
	</div><!--col-md-12 end-->
  
<?php

	get_footer();
	
?>  