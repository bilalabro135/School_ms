<?php 
	
	require "dbwork.php";
	$result = $obj->update_student($_POST);
	// $obj->debug($result);
	if ($result == 1) {
		header("location:students_list.php");
	}


 ?>