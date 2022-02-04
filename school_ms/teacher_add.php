
<?php require "dbwork.php";
	
	$get_class = $obj->get_classes();
	$get_qualification = $obj->get_qualification();
	$get_subjects = $obj->get_subject();
	$get_merital_status = $obj->get_merital_status();
	$get_gender = $obj->get_gender();

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
						<h4 class="page-title">Teachers Form</h4>
					</div>
					<div class="row">
						<div class="col-md-12">
								<div class="card">
									<div class="card-header">
										<div class="d-flex align-items-center">
											<h4 class="card-title">Add Teacher</h4>
											<a href="teacher_list.php" class="btn btn-primary btn-sm ml-auto">
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
												<div class="col-md-6 form-group">
													<label for="lname">Last name <span class="text-danger">*</span></label>
													<input type="text" class="form-control" id="lname" placeholder="Last name" name="lname" required>
												</div>
											</div>
											<div class="row">	
												<div class="form-group col-md-6">
													<label for="age">Age <span class="text-danger">*</span></label>
													<input type="number" class="form-control" id="age" placeholder="Age" name="age" required min="18" max="60">
												</div>
												<div class="form-group col-md-6">
													<label for="gender_id">Gender <span class="text-danger">*</span></label>&nbsp;
													<select name="gender_id" id="gender_id" class="form-control" required>
														<option selected disabled value="">--- Please select ---</option>
														<option value="1">Male</option>
														<option value="2">Female</option>
														<option value="3">Other</option>
													</select>
												</div>
											</div>
											<div class="row">
												<div class="form-group col-md-6">
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
												<div class="form-group col-md-6">
													<label for="phone_no">Phone no: <span class="text-danger">*</span></label>
													<input type="tel" class="form-control" id="phone_no" placeholder="Phone no:" name="phone_no" required min="1" pattern="[0-9]{11}">
												</div>
											</div>
											<div class="row">
												<div class="form-group col-md-6">
													<label for="subject_id">Subject <span class="text-danger">*</span></label>
													<select name="subject_id" id="subject_id" class="form-control" required>
														<option selected disabled value="">--- Please select ---</option>
														<?php foreach ($get_subjects as $key => $value) { ?>
															<option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
															<?php
															} 
														?>
													</select>
												</div>
												<div class="form-group col-md-6">
													<label for="class_id">Class <span class="text-danger">*</span></label>
													<select name="class_id" id="class_id" class="form-control" required>
														<option selected disabled value="">--- Please select ---</option>
														<?php foreach ($get_class as $key => $value) { ?>
															<option value="<?php echo $value['cls_name'] ?>"><?php echo $value['cls_name'] ?></option>
														<?php
														}
													?>
													</select>
												</div>
											</div>
											<div class="row">
												<div class="form-group col-md-6">
													<label for="salary">Salary <span class="text-danger">*</span></label>
													<input type="number" class="form-control" id="salary" placeholder="Salary" name="salary" required min="15000" max="40000">
												</div>
												<div class="form-group col-md-6">
													<label for="merital_status">Marital status <span class="text-danger">*</span></label>
													<select name="marital_status" id="merital_status" class="form-control" required>
														<option selected disabled value="">--- Please select ---</option>
														<?php foreach ($get_merital_status as $key => $value) { ?>
														<option value="<?php echo $value['id'] ?>"><?php echo $value['name'] ?></option>
														<?php 
														}
													?>
													</select>
												</div>
											</div>
											<div class="row">
												<div class="form-group col-md-12">
													<label for="Address">Address <span class="text-danger">*</span></label>
													<textarea class="form-control" id="Address" placeholder="Address" name="address" required></textarea>
												</div>
											</div>
										</div>
										<div class="card-action">
											<button name="submit_btn" value="add_new_teacher" class="btn btn-sm btn-primary">Submit</button>
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