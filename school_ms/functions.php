<?php 
	require "dbwork.php";

	 if(!(isset($_POST['submit_btn']))) {
	 	header("location:index.php");
	 }
		switch ($_POST['submit_btn']) {
			case 'login_btn':
				$data = $obj->login($_POST);
				if ($data) {
					header("location:dashboard.php");
				}else{
					header("location:index.php");
				}
			break;
			case 'add_teacher':
			// extract($_POST);
			// 	$sql = "INSERT INTO `teachers` VALUES '$fname' , '$email' , '$password'";
			// 	$obj->;
			break;
		
		default:
			header("location:index.php");
		break;
		}

		

 ?>
