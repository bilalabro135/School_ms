<?php 

	require "dbwork.php";
	$obj->is_logged_in();

	$id = $_GET['id'];
	$view_class = $obj->get_class_by_id($id);
	
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
										<h4 class="card-title">View class</h4>
										<a href="classes.php" class="btn btn-primary btn-round ml-auto">
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
		                                      <th width="50%">Class id</th>
		                                      <td><?php echo $view_class['id'] ?></td>
		                                  </tr>
		                                  <tr>
		                                      <th>Class name</th>
		                                      <td><?php echo $view_class['cls_name'] ?></td>
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
