<?php 

	require "dbwork.php";


if(isset($_POST['submit_btn'])){
	switch ($_POST['submit_btn']) {
		case 'add_teacher':
			$result = $obj->add_teacher($_POST);
			if ($result == 1) {
			header("location:teacher_list.php");
		}
		break;
		case 'update_teacher':
			$result = $obj->update_teacher($_POST);
			if ($result == 1) {
				header("location:teacher_list.php");
			}
		break;
		case 'add_student':
			$result = $obj->add_student($_POST);
			if ($result == 1) {
				header("location:students_list.php");
			}
		break;
		case 'update_student':
			$result = $obj->update_student($_POST);
			if ($result == 1) {
				header("location:students_list.php");
			}else{
				echo "Sorry! Something Went Wrong";

			}
		break;
		
		// default:
			
		// break;
		}

}else{
	switch ($_GET['submit_btn']) {
		case 'delete_student':
			$id = $_GET['id'];
			$res = $obj->delete_student($id);
			if ($res) {
				header("location:students_list.php");
			}
		break;
		case 'delete_teacher':
			$id = $_GET['id'];
			$res = $obj->delete_teacher($id);
			if ($res) {
				header("location:teacher_list.php");
			}
		break;
		
		default:
			echo "Sorry! Something Went Wrong";
		break;
	}

}

	




 ?>