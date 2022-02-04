<?php 

	require "dbwork.php";


if(isset($_POST['submit_btn'])){
	switch ($_POST['submit_btn']) {
		case 'add_new_teacher':
			$res = $obj->add_teacher($_POST);
			if ($res == 1) {
			header("location:teacher_list.php");
		}else{
			echo "Something went wrong";
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
				}else{
					echo "Something went wrong";
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
		case 'add_new_fees':
			$result = $obj->add_new_fees($_POST);
			if ($result == 1) {
				header("location:students_fees.php");
			}else{
				echo "Sorry! Something Went Wrong";

			}
		break;
		case 'add_new_salary':
			$result = $obj->add_new_salary($_POST);
			if ($result == 1) {
				header("location:teachers_salary.php");
			}else{
				echo "Sorry! Something Went Wrong";

			}
		break;
		case 'update_new_salary':
			$res = $obj->update_new_salary($_POST);
			if ($res == 1) {
				header("location:teachers_salary.php");
			}else{
				echo "Sorry! Something Went Wrong";

			}
			break;
		case 'cls_name':
			$res = $obj->add_class($_POST);
			if ($res == 1) {
				header("location:classes.php");
			}else{
				header("location:add_class.php?msg=0");
			}
		break;
		case 'update_new_fees':
			$res = $obj->update_new_fees($_POST);
			if ($res == 1) {
				header("location:students_fees.php");
			}
		break;
		case 'update_class':
			$res = $obj->update_class($_POST);
			if ($res == 1) {
				header("location:classes.php");
			}
		break;
		default:
			echo "Sorry! Something Went Wrong";
		break;
		}

}

	if (isset($_GET['submit_btn'])) {
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
		case 'delete_salary':
			$id = $_GET['id'];
			$res = $obj->delete_salary($id);
			if ($res) {
				header("location:teachers_salary.php");
			}
		break;
		case 'delete_fees':
			$id = $_GET['id'];
			$res = $obj->delete_fees($id);
			if ($res) {
				header("location:students_fees.php");
			}
		break;
		case 'delete_class':
			$id = $_GET['id'];
			$res = $obj->delete_class($id);
			if ($res) {
				header("location:classes.php");
			}
		break;
		case 'delete_user':
			$id = $_GET['id'];
			$res = $obj->delete_user_by_id($id);
			if ($res) {
				header("location:users.php");
			}
		break;
		case 'delete_qualification':
			$id = $_GET['id'];
			$res = $obj->delete_qualification($id);
			if ($res) {
				header("location:qualifications.php");
			}
		break;
		
		default:
			echo "Sorry! Something Went Wrong";
		break;
	}

	}else{
		if (!defined('MyConst')) {
			die('Direct access not permitted');
		}
	}



 ?>