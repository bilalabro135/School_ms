
<?php require "dbwork.php";
	
	$get_class = $obj->get_classes();
	$get_gender = $obj->get_gender();
	$get_qualification = $obj->get_qualification();
	$id = $_GET['id'];
	$teachers = $obj->show_selected_tchr_data($id);
	$get_subjects = $obj->get_subject();
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
						<h4 class="page-title">Teacher</h4>
					</div>
					<div class="row">
						<div class="col-md-12">

								<div class="card">
									<div class="card-header">
										<div class="d-flex align-items-center">
											<h4 class="card-title">Update teacher</h4>
											<a href="teacher_list.php" class="btn btn-primary btn-sm ml-auto">
												<i class="fa fa-angle-left"></i>
												Back
												
											</a>
										</div>
									</div>
									<form method="POST" action="process.php">
										<div class="card-body">
											<div class="row">
												<input type="hidden" name="id" value="<?php echo $id ?>">
												<div class="col-md-6">
													<label>First name <span class="text-danger">*</span></label>
													<input type="text" class="form-control" id="fname" placeholder="First name" name="fname" value="<?php echo $teachers['fname']; ?>" required>
												</div>
												<div class="col-md-6">
													<label>Last name <span class="text-danger">*</span></label>
													<input type="text" class="form-control" id="lname" placeholder="Last name" name="lname" value="<?php echo $teachers['lname']; ?>" required>
												</div>
											</div>
											<div class="row">	
												<div class="form-group col-md-6">
													<label>Age <span class="text-danger">*</span></label>
													<input type="number" class="form-control" id="age" placeholder="Age" name="age" value="<?php echo $teachers['age']; ?>" min="18" max="60" required>
												</div>
												<div class="form-group col-md-6">
													<label for="gender">Gender <span class="text-danger">*</span></label>&nbsp;
													<select name="gender_id" class="form-control">
													<?php if ($teachers['gender'] == 1) {?>
															<option value="1" selected>Male</option>
															<option value="2">Female</option>
															<option value="3">Other</option>
														<?php 
														}
													?>
													<?php if ($teachers['gender'] == 2) {?>
															<option value="1">Male</option>
															<option value="2" selected>Female</option>
															<option value="3">Other</option>
														<?php 
														}
													?>
													<?php if ($teachers['gender'] == 3) {?>
															<option value="1">Male</option>
															<option value="2">Female</option>
															<option value="3" selected>Other</option>
														<?php 
														}
													?>
													</select>
												</div>
											</div>
											<div class="row">
												<div class="form-group col-md-6">
													<label>Qualification <span class="text-danger">*</span></label>
													<select class="form-control" name="qualification">
													<?php foreach ($get_qualification as $key => $value) {
																if ($value['id'] == $teachers['qualification']) { ?>
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
												<div class="form-group col-md-6">
													<label>Phone no: <span class="text-danger">*</span></label>
													<input type="tel" class="form-control" id="phone" pattern="[0-9]{11}" placeholder="Phone no:" value="<?php echo $teachers['phone_no'] ?>" name="phone_no" required>
												</div>
											</div>
											<div class="row">
												<div class="form-group col-md-6">
													<label>Subject <span class="text-danger">*</span></label>
													<select name="subject_id" id="subject_id" class="form-control" required>
													<?php foreach ($get_subjects as $key => $value) {
																if ($value['id'] == $teachers['subject_id']) { ?>
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
												<div class="form-group col-md-6">
													<label>Class <span class="text-danger">*</span></label>
													<select name="class_id" class="form-control">
													<?php foreach ($get_class as $key => $value) {
																if ($value['id'] == $teachers['class_id']) { ?>
																<option selected value="<?php echo $value['id'] ?>"><?php echo $value['cls_name'] ?></option>
																<?php
																}else{ ?>
																	<option value="<?php echo $value['id'] ?>"><?php echo $value['cls_name'] ?></option>
																<?php
															 	}
															}
														?>
													</select>
												</div>
											</div>
											<div class="row">
												<div class="form-group col-md-6">
													<label>Salary <span class="text-danger">*</span></label>
													<input type="number" class="form-control" id="salary" placeholder="Salary" name="salary" value="<?php echo $teachers['salary']; ?>" required>
												</div>
												<div class="form-group col-md-6">
													<label for="gender">Marital status <span class="text-danger">*</span></label>&nbsp;
													<select name="marital_id" class="form-control" required>
													<?php foreach ($get_merital_status as $key => $value) {
																if ($value['id'] == $teachers['marital_id']) { ?>
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
												<div class="form-group col-md-12">
													<label>Address <span class="text-danger">*</span></label>
													<textarea class="form-control" id="Address" placeholder="Address" name="address" required><?php echo $teachers['address'] ?></textarea>
												</div>
											</div>
										</div>
										<div class="card-action">
											<button name="submit_btn" value="update_teacher" class="btn btn-sm btn-primary">Submit</button>
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