<?php 

	require "dbwork.php";
	$obj->is_logged_in();

	if (isset($_GET['id'])) {
		$id = $_GET['id'];
	}
	$teacher = $obj->get_teacher($id);
	if (!$teacher) {
		header("location:teachers_list.php");
	}
	$view_teacher = $obj->get_qualification();
	$view_subject = $obj->get_subject();
	$view_class = $obj->get_classes();
	$view_gender = $obj->get_gender();

		
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
										<h4 class="card-title">View Teacher</h4>
										<a href="teacher_list.php" class="btn btn-primary btn-round ml-auto">
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
		                                      <td><?php echo $teacher['id'] ?></td>
		                                  </tr>
		                                  <tr>
		                                      <th>First name</th>
		                                      <td><?php echo ucfirst($teacher['fname']) ?></td>
		                                  </tr>
		                                  <tr>
		                                      <th>Last name</th>
		                                      <td><?php echo ucfirst($teacher['lname']) ?></td>
		                                  </tr>
		                                  <tr>
		                                      <th>Age</th>
		                                      <td><?php echo $teacher['age'] ?></td>
		                                  </tr>
		                                  <tr>
		                                      <th>Qualification</th>
		                                      <td><?php foreach ($view_teacher  as $key => $value) {
                                      				if ($value['id'] == $teacher['qualification']) {
                                      				 		echo ucfirst($value['name']);
                                      				 	} 
                                      				}
                                      			?>
		                                      		
		                                      </td>
		                                  </tr>
		                                  <tr>
		                                      <th>Gender</th>
		                                      <td><?php foreach ($view_gender  as $key => $value) {
                                      				if ($value['id'] == $teacher['gender']) {
                                      				 		echo ucfirst($value['name']);
                                      				 	} 
                                      				}
                                      			?>
		                                      </td>
		                                  </tr>
		                                  <tr>
		                                      <th>Subject</th>
		                                      <td><?php foreach ($view_subject  as $key => $value) {
                                      				if ($value['id'] == $teacher['subject_id']) {
                                      				 		echo ucfirst($value['name']);
                                      				 	} 
                                      				}
                                      			?>
		                                      </td>
		                                  </tr>
		                                   <tr>
		                                      <th>Class</th>
		                                      <td><?php foreach ($view_class  as $key => $value) {
                                      				if ($value['id'] == $teacher['class_id']) {
                                      				 		echo ucfirst($value['cls_name']);
                                      				 	} 
                                      				}
                                      			?>
		                                      </td>
		                                  </tr>
		                                  <tr>
		                                      <th>Phone no:</th>
		                                      <td><?php echo $teacher['phone_no'] ?></td>
		                                  </tr>
		                                  <tr>
		                                      <th>Address</th>
		                                      <td><?php echo ucfirst($teacher['address']) ?></td>
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
	<?php require "foot_script.php"; ?>
</body>
</html>
