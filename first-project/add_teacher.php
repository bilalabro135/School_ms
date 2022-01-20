<?php 

	require "dbwork.php";

	$result = $obj->add_teacher($_POST);
	if ($result == 1) {
		header("location:teacher_list.php");
	}



 ?>