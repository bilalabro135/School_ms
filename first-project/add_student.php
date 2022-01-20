<?php 

	require "dbwork.php";

	$result = $obj->add_student($_POST);
	if ($result == 1) {
		header("location:students_list.php");
	}



 ?>