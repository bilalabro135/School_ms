<?php 
	
	require "dbwork.php";
	$result = $obj->update_teacher($_POST);
	// $obj->debug($result);
	if ($result == 1) {
		header("location:teacher_list.php");
	}


 ?>