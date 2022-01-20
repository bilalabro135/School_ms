<?php 

	require "dbwork.php";
	$id = $_GET['id'];
	$res = $obj->delete_teacher($id);
	if ($res) {
		header("location:teacher_list.php");
	}



 ?>