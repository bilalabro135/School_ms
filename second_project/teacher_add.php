
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
									<form method="POST" action="process.php">
										<div class="card-body">
											<div class="form-group">
												<label for="fname">First Name</label>
												<input type="text" class="form-control" id="fname" placeholder="First Name" name="fname">
											</div>
											<div class="form-group">
												<label for="lname">Last Name</label>
												<input type="text" class="form-control" id="lname" placeholder="Last Name" name="lname">
											</div>
											<div class="form-group">
												<label for="age">Age</label>
												<input type="number" class="form-control" id="age" placeholder="age" name="age">
											</div>
											<div class="form-group">
												<label for="qualification">Qualification</label>
												<input type="text" class="form-control" id="qualification" placeholder="Qualification" name="qualification">
											</div>
											<div class="form-group">
												<select name="gender_id" class="btn btn-light border">
													<option value="Male">Male</option>
													<option value="Female">Female</option>
												</select>
											</div>
											<div class="form-group">
												<label for="Phone">Phone</label>
												<input type="number" class="form-control" id="phone" placeholder="Phone No:" name="phone_no">
											</div>
											<div class="form-group">
												<label for="Address">Address</label>
												<textarea class="form-control" id="Address" placeholder="Address" name="address"></textarea>
											</div>
											<div class="form-group">
												<label for="subject">Subject</label>
												<input type="text" class="form-control" id="subject" placeholder="subject" name="subject_id">
											</div>
											<div class="form-group">
												<label for="class">Class</label>
												<input type="text" class="form-control" id="class" placeholder="Class" name="class_id">
											</div>
											<div class="form-group">
												<label for="salary">Salary</label>
												<input type="number" class="form-control" id="salary" placeholder="Salary" name="salary">
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