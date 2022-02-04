<?php 

	require "dbwork.php";
	$obj->is_logged_in();

	if (isset($_GET['id'])) {
		$id = $_GET['id'];
	}
	$students = $obj->get_student($id);
	if (!$students) {
		header("location:students_list.php");
	}
	$view_students = $obj->get_qualification();
	$view_gender = $obj->get_gender();
	// $obj->debug($view_students);
	// $students_fees = $obj->fetch_students_fees();

		
?>

<!DOCTYPE html>
<html lang="en">
<?php 
	require "head.php";
?>
<body>
	<div class="wrapper">
		<!-- Navbar Header -->
		<?php require("navbar.php"); ?>
	
		<!-- Sidebar -->
		<?php require("sidebar.php"); ?>

		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title">View student</h4>
										<a href="students_list.php" class="btn btn-primary btn-round ml-auto">
											<i class="fa fa-angle-left"></i>
											Back
										</a>
									</div>
								</div>
								<div class="card-body">
									<div class="table-responsive">
		                              <table class="table dt-responsive">
		                              	<tbody>
		                              		<tr>
		                                      <th width="50%">Id</th>
		                                      <td><?php echo $students['id'] ?></td>
		                                  </tr>
		                                  <tr>
		                                      <th>First name</th>
		                                      <td><?php echo ucfirst($students['fname']) ?></td>
		                                  </tr>
		                                  <tr>
		                                      <th>Last name</th>
		                                      <td><?php echo ucfirst($students['lname']) ?></td>
		                                  </tr>
		                                  <tr>
		                                      <th>Age</th>
		                                      <td><?php echo $students['age'] ?></td>
		                                  </tr>
		                                  <tr>
		                                      <th>Fees</th>
		                                      <td><?php echo $students['fees'] ?></td>
		                                  </tr>
		                                  <tr>
		                                      <th>Date of birth</th>
		                                      <td><?php echo $students['date_of_birth'] ?></td>
		                                  </tr>
		                                  <tr>
		                                      <th>Date of admission</th>
		                                      <td><?php echo $students['date_of_admission'] ?></td>
		                                  </tr>
		                                  <tr>
		                                      <th>Qualification</th>
		                                      <td><?php foreach ($view_students  as $key => $value) {
                                      				if ($value['id'] == $students['qualification']) {
                                      				 		echo ucfirst($value['name']);
                                      				 	} 
                                      				}
                                      			?>
		                                      		
		                                      </td>
		                                  </tr>
		                                  <tr>
		                                      <th>Gender</th>
		                                      <td><?php foreach ($view_gender  as $key => $value) {
                                      				if ($value['id'] == $students['gender']) {
                                      				 		echo ucfirst($value['name']);
                                      				 	} 
                                      				}
                                      			?>
		                                      </td>
		                                  </tr>
		                                  <tr>
		                                      <th>Phone no:</th>
		                                      <td><?php echo $students['phone_no'] ?></td>
		                                  </tr>
		                                  <tr>
		                                      <th>Address</th>
		                                      <td><?php echo ucfirst($students['address']) ?></td>
		                                  </tr>
		                             	</tbody>
		                              </table>
		                          	</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
	<?php require "foot_script.php"; ?>
</body>
</html>
