<?php

	$db_host="localhost";
	$db_user="root";
	$db_pass="";
	$db_name="new_landing";
	$con=mysqli_connect($db_host,$db_user,$db_pass,$db_name);
		
		if(!$con){
			echo"database not connected";
		}
	
?>