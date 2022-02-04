<?php 

	require "dbwork.php";
	$obj->is_logged_in();

	
	$id = $_GET['id'];
	$students_fees = $obj->get_fees_data($id);
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
					<div class="page-header">
						<h4 class="page-title">View students fees</h4>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title">view fees</h4>
										<a href="students_fees.php" class="btn btn-primary btn-round ml-auto">
											<i class="fa fa-angle-left"></i>
											Back
										</a>
									</div>
								</div>
								<div class="card-body">
									<div class="table-responsive">
			                          <table class="table dt-responsive">
				                              <tbody><tr>
				                                  <th width="50%">Id</th>
				                                  <td><?php foreach ($students_fees as $key => $value) {?>
												<?php echo $value['std_id'];
														 $id = $value['std_id'];?>
												<?php $students_data = $obj->get_student($id); }?></td>
				                              </tr>
				                              <tr>
				                                  <th>Full name</th>
				                                  <td><?php echo $students_data['fname']." ".$students_data['lname'] ?></td>
				                              </tr>
				                              <tr>
				                              	  <th>Fees</th>
				                              	  <td><?php echo "PKR : " . $value['fees_id']; ?></td>
				                              </tr>
				                          </tbody>
			                     		</table><br>
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
