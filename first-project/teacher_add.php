
<?php require "dbwork.php"; ?>

<!DOCTYPE html>
<html lang="en">
<?php require "head.php"; ?>
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
						<h4 class="page-title">Teachers Form</h4>
					</div>
					<div class="row">
						<div class="col-md-12">

								<div class="card">
									<div class="card-header">
										<div class="d-flex align-items-center">
											<h4 class="card-title">Add Teacher</h4>
											<a href="teacher_list.php" class="btn btn-primary btn-round ml-auto">
												<i class="fa fa-backward"></i>&nbsp;
												Back
												
											</a>
										</div>
									</div>
									<form method="POST" action="add_teacher.php">
										<div class="card-body">
											<div class="form-group">
												<label for="fname">Full Name</label>
												<input type="text" class="form-control" id="password" placeholder="Full Name" name="fname">
											</div>
											<div class="form-group">
												<label for="email2">Enter Email</label>
												<input type="text" class="form-control" id="email2" placeholder="Enter Email" name="email">
												<small id="emailHelp2" class="form-text text-muted">We'll never share your email with anyone else.</small>
											</div>
											<div class="form-group">
												<label for="password">Password</label>
												<input type="password" class="form-control" id="password" placeholder="Password" name="password">
											</div>
										</div>
										<div class="card-action">
											<button name="submit_btn" value="add_teacher" class="btn btn-success">Submit</button>
											<button class="btn btn-danger">Cancel</button>
										</div>
									</form>
								</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php require "foot_script.php"; ?>
</div>
</body>
</html>