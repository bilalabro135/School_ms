
<?php require "dbwork.php";
	
	$id = $_GET['id'];
	$selected_students = $obj->show_selected_data($id);
	$students = $obj->get_student($id);
	// $obj->debug($students);
	$get_qualification = $obj->get_qualification();
	$get_gender = $obj->get_gender();
	$get_merital_status = $obj->get_merital_status();
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
						<h4 class="page-title">Student</h4>
					</div>
					<div class="row">
						<div class="col-md-12">

								<div class="card">
									<div class="card-header">
										<div class="d-flex align-items-center">
											<h4 class="card-title">Update student</h4>
											<a href="students_list.php" class="btn btn-primary btn-sm ml-auto">
												<i class="fa fa-angle-left"></i>
												Back
												
											</a>
										</div>
									</div>
									<form method="POST" action="process.php">
										<div class="card-body">
											<input type="hidden" name="id" value="<?php echo $selected_students['id'] ?>">
											<div class="row">
												<div class="col-md-6 form-group">
													<label for="fname">First name <span class="text-danger">*</span></label>
													<input type="text" class="form-control" id="fname" placeholder="First name" name="fname" value="<?php echo $selected_students['fname'] ?>" required>
												</div>
												<div  class="col-md-6 form-group">
													<label for="lname">Last name <span class="text-danger">*</span></label>
													<input type="text" class="form-control" id="lname" placeholder="Last name" name="lname" value="<?php echo $selected_students['lname'] ?>" required>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6 form-group">
													<label for="date_of_birth">Date of birth <span class="text-danger">*</span></label>
													<input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value="<?php echo $selected_students['date_of_birth'] ?>" required>
												</div>
												<div class="col-md-6 form-group">
													<label for="date_of_admission">Date of admission <span class="text-danger">*</span></label>
													<input type="date" class="form-control" id="date_of_admission" name="date_of_admission" value="<?php echo $selected_students['date_of_admission'] ?>" required>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6 form-group">
													<label for="qualification">Qualification <span class="text-danger">*</span></label>
														<select class="form-control" name="qualification" id="qualification">
														<?php foreach ($get_qualification as $key => $value) {
																if ($value['id'] == $students['qualification']) { ?>
																<option selected value="<?php echo $value['id'] ?>"><?php echo $value['name'] ?></option>
																<?php
																}else{ ?>
																	<option value="<?php echo $value['id'] ?>"><?php echo $value['name'] ?></option>
																<?php
															 	}
															}
														?>
														</select>
												</div>
												<div class="col-md-6 form-group">
													<label for="age">Age <span class="text-danger">*</span></label>
													<input type="number" class="form-control" id="age" placeholder="Your age" name="age" value="<?php echo $selected_students['age'] ?>" required min="12" max="25">
												</div>
											</div>
											<div class="row">
												<div class="col-md-6 form-group">
													<label for="gender_id">Gender <span class="text-danger">*</span></label>
													<select name="gender_id" id="gender_id" class="form-control" required>
														<?php if ($students['gender'] == 1) {?>
															<option value="1" selected>Male</option>
															<option value="2">Female</option>
															<option value="3">Other</option>
														<?php 
														}
													?>
													<?php if ($students['gender'] == 2) {?>
															<option value="1">Male</option>
															<option value="2" selected>Female</option>
															<option value="3">Other</option>
														<?php 
														}
													?>
													<?php if ($students['gender'] == 3) {?>
															<option value="1">Male</option>
															<option value="2">Female</option>
															<option value="3" selected>Other</option>
														<?php 
														}
													?>
													</select>
												</div>
												<div class="col-md-6 form-group">
													<label for="phone">Phone no: <span class="text-danger">*</span></label>
													<input type="tel" class="form-control" id="phone" placeholder="Phone no:" name="phone_no" value="<?php echo $selected_students['phone_no'] ?>" required step="1" min="1 " pattern="[0-9]{11}">
												</div>
											</div>
											<div class="row">
												<div class="col-md-6 form-group">
													<label for="fees">Fees <span class="text-danger">*</span></label>
													<input type="number" name="fees" id="fees" class="form-control" placeholder="Enter fees" value="<?php echo $selected_students['fees'] ?>" required min="2000" max="5000">
												</div>
												<div class="col-md-6 form-group">
													<label for="gender_id">Merital status <span class="text-danger">*</span></label>
													<select name="merital_status" id="gender_id" class="form-control" required>
													<?php foreach ($get_merital_status as $key => $value) {
																if ($value['id'] == $students['merital_id']) { ?>
																<option selected value="<?php echo $value['id'] ?>"><?php echo $value['name'] ?></option>
																<?php
																}else{ ?>
																	<option value="<?php echo $value['id'] ?>"><?php echo $value['name'] ?></option>
																<?php
															 	}
															}
														?>
													</select>
												</div>
											</div>
											<div class="row">
												<div class="col">
												<label for="address">Address <span class="text-danger">*</span></label>
												<textarea class="form-control" id="address" placeholder="Address" name="address" required><?php echo $selected_students['address'] ?></textarea>
											</div>
											</div>
										</div>
										<div class="card-action">
											<button name="submit_btn" value="update_student" class="btn btn-sm btn-primary">Submit</button>
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