
<?php require "dbwork.php";

	$get_qualification = $obj->get_qualification();
	$get_gender = $obj->get_gender();
	$get_merital_status = $obj->get_merital_status();
	$get_classes = $obj->get_classes();
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

		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Students Form</h4>
					</div>
					<div class="row">
						<div class="col-md-12">

								<div class="card">
									<div class="card-header">
										<div class="d-flex align-items-center">
											<h4 class="card-title">Add Student</h4>
											<a href="students_list.php" class="btn btn-primary btn-sm ml-auto">
												<i class="fa fa-angle-left"></i>
												Back
												
											</a>
										</div>
									</div>
									<form method="POST" action="process.php">
										<div class="card-body">
											<div class="row">
												<div class="col-md-6 form-group">
													<label for="fname">First name <span class="text-danger">*</span></label>
													<input type="text" class="form-control" id="fname" placeholder="First name" name="fname" required>
												</div>
												<div  class="col-md-6 form-group">
													<label for="lname">Last name <span class="text-danger">*</span></label>
													<input type="text" class="form-control" id="lname" placeholder="Last name" name="lname" required>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6 form-group">
													<label for="date_of_birth">Date of birth <span class="text-danger">*</span></label>
													<input type="date" class="form-control" id="date_of_birth" name="date_of_birth" required>
												</div>
												<div class="col-md-6 form-group">
													<label for="date_of_admission">Date of admission <span class="text-danger">*</span></label>
													<input type="date" class="form-control" id="date_of_admission" name="date_of_admission" required>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6 form-group">
													<label for="qualification">Qualification <span class="text-danger">*</span></label>
														<select class="form-control" name="qualification" id="qualification" required>
															<option selected disabled value="">--- Please select ---</option>
															<?php foreach ($get_qualification as $key => $value) { ?>
																<option value="<?php echo $value['id'] ?>"><?php echo $value['name'] ?></option>
															<?php
														}
													?>
														</select>
												</div>
												<div class="col-md-6 form-group">
													<label for="age">Age <span class="text-danger">*</span></label>
													<input type="number" class="form-control" id="age" placeholder="Your age" name="age" required min="12" max="25">
												</div>
											</div>
											<div class="row">
												<div class="col-md-6 form-group">
													<label for="gender_id">Gender <span class="text-danger">*</span></label>
													<select name="gender_id" id="gender_id" class="form-control" required>
														<option selected disabled value="">--- Please select ---</option>
														<?php foreach ($get_gender as $key => $value) { ?>
														<option value="<?php echo $value['id'] ?>"><?php echo $value['name'] ?></option>
														<?php 
														}
													?>
													</select>
												</div>
												<div class="col-md-6 form-group">
													<label for="phone">Phone no: <span class="text-danger">*</span></label>
													<input type="tel" class="form-control" id="phone" placeholder="Phone no:" name="phone_no" required step="1"  pattern="[0-9]{11}">
												</div>
											</div>
											<div class="row">
												<div class="col-md-6 form-group">
													<label for="fees">Fees <span class="text-danger">*</span></label>
													<input type="number" name="fees" id="fees" class="form-control" placeholder="Enter fees" required min="2000" max="5000">
												</div>
												<div class="col-md-6 form-group">
													<label>Marital status</label>
													<select name="merital_status" id="merital_status" class="form-control" required>
														<option selected disabled value="">--- Please select ---</option>
														<?php foreach ($get_merital_status as $key => $value) { ?>
														<option value="<?php echo $value['id'] ?>"><?php echo $value['name'] ?></option>
														<?php 
														}
													?>
													</select>
												</div>
											</div>
											<div>
												<label for="address">Address <span class="text-danger">*</span></label>
												<textarea class="form-control" id="address" placeholder="Address" name="address" required></textarea>
											</div>
										</div>
										<div class="card-action">
											<button name="submit_btn" value="add_student" class="btn btn-sm btn-primary">Submit</button>
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