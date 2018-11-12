	
	<?php
	
		require_once('functions/function.php');
			needLogged();
			if($_SESSION['role']==1){
			 
			get_header();
			get_sidebar();
			get_breadcum();
			
		
	?>



	<div class="col-md-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="col-md-9 heading_title">
					All message Information
				 </div>
				 <div class="col-md-3 text-right">
					<a href="#" class="btn btn-sm btn btn-primary"><i class="fa fa-plus-circle"></i> Add</a>
				</div>
				<div class="clearfix"></div>
			</div>
		  <div class="panel-body">
		  
				<form method="post" action="search-user.php" class="form-inline my-2 my-lg-0" style="margin-top:10px;margin-bottom:20px;">
				  <input class="form-control mr-sm-2" type="text" name="Search" placeholder="Search" aria-label="Search">
				  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
				</form>
				
			  <table class="table table-responsive table-striped table-hover table_cus">
					<thead class="table_head">
						<tr>
							<th>Name</th>
							<th>email</th>
							<th>subject</th>
							<th>message</th>
							<th>Manage</th>
						</tr>
					</thead>
					<tbody>
						
						<?php
						
							$sel='SELECT * FROM new_contact ORDER BY conus_id DESC';
							$qry=mysqli_query($con,$sel);
							while($data=mysqli_fetch_array($qry)){
						?>
					
						<tr>
							<td><?= htmlspecialchars_decode($data['conus_name'])?></td>
							<td><?=($data['conus_email']);?></td>
							<td><?=substr($data['conus_sub'],0,50);?>...</td>
							<td><?=substr($data['conus_mess'],0,80);?>...</td>
							<td>
							<a href="view-message.php?v=<?=$data['conus_id'];?>"><i class="fa fa-plus-square fa-lg"></i></a>
							<a href="delate-message.php?id=<?=$data['conus_id'];?>"><i class="fa fa-trash fa-lg"></i></a>
							</td>
						</tr>
							<?php }?>
					</tbody>
			  </table>
		  </div>
		  <div class="panel-footer">
			<div class="col-md-4">
				<a href="#" class="btn btn-sm btn-warning">EXCEL</a>
				<a href="#" class="btn btn-sm btn-primary">PDF</a>
				<a href="#" class="btn btn-sm btn-danger">SVG</a>
				<a href="#" class="btn btn-sm btn-success">PRINT</a>
			</div>
			<div class="col-md-4">
			</div>
			<div class="col-md-4 text-right">
				<nav aria-label="Page navigation">
				  <ul class="pagination pagina_cus">
					<li>
					  <a href="#" aria-label="Previous">
						<span aria-hidden="true">&laquo;</span>
					  </a>
					</li>
					<li class="active"><a href="#">1</a></li>
					<li><a href="#">2</a></li>
					<li><a href="#">3</a></li>
					<li><a href="#">4</a></li>
					<li><a href="#">5</a></li>
					<li>
					  <a href="#" aria-label="Next">
						<span aria-hidden="true">&raquo;</span>
					  </a>
					</li>
				  </ul>
				</nav>
			</div>
			<div class="clearfix"></div>
		  </div>
		</div>
	</div><!--col-md-12 end-->
  
<?php
	get_footer();
	
	}else{
		echo "you have no permission";
	}
?>