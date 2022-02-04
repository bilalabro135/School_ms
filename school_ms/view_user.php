<?php 
	
	require "dbwork.php";

	$id = $_GET['id'];
	$user = $obj->view_user($id);


?>


<!DOCTYPE html>
<html lang="en">
<?php require "head.php"; ?>
<body>
	<div class="wrapper">
		<!-- Navbar Header -->
		<?php require("navbar.php"); ?>
	
		<!-- Sidebar -->
		<?php require("sidebar.php"); ?>
		<form action="process.php" method="POST">
		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">View user</h4>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title">User</h4>
										<a href="users.php" class="btn btn-primary btn-round ml-auto"><i class="fa fa-angle-left"></i> Back </a>
									</div>
								</div>
								<div class="card-body">
									<div class="table-responsive">
		                              <table class="table dt-responsive">
		                                  <tbody><tr>
		                                      <th width="50%">First name</th>
		                                      <td><?php echo $user['fname'] ?></td>
		                                  </tr>
		                                  <tr>
		                                      <th>Last name</th>
		                                      <td><?php echo $user['lname'] ?></td>
		                                  </tr>
		                                  <tr>
		                                      <th>Email</th>
		                                      <td><?php echo $user['username'] ?></td>
		                                  </tr>
		                                  <tr>
		                                      <th>Password</th>
		                                      <td><?php echo $user['password'] ?></td>
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
			
		</form>
	</div>
	<?php require "foot_script.php";
		  require "form_handle.php"; ?>
</body>
</html>