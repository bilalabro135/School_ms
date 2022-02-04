<?php 

	require "dbwork.php";

	switch ($_POST['fn']) {
		case 'fetch_std_fees_by_id':
			$res = $obj->fetch_std_fees_by_id($_POST);
		break;

		case 'fetch_tchr_salary_by_id':
			$res = $obj->fetch_tchr_salary_by_id($_POST);
		break;
		case 'add_user':
			$res = $obj->add_user($_POST);
		break;
		case 'add_qualification':
			$res = $obj->add_qualification($_POST);
		break;
		case 'view_qualification':
			$res = $obj->view_qualification($_POST);
		break;
		case 'update_qualification':
			$res = $obj->update_qualification($_POST);
		break;
		case 'update_user':
			$res = $obj->update_user($_POST);
		break;
		
		default:
			// code...
			break;
	}



 ?>