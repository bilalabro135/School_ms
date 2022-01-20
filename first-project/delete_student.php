<?php 

	require "dbwork.php";
	$id = $_GET['id'];
	$res = $obj->delete_student($id);
	if ($res) {
		header("location:students_list.php");
	}



 ?>