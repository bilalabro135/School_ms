<?php 

	require "dbwork.php";
	$obj->is_logged_in();

	$id = $_GET['id'];
	$teacher = $obj->get_teacher($id);	

		
?>
<!DOCTYPE html>
<html lang="en">
<?php require("head.php"); ?>
<body>

	<div class="wrapper">
		<!--
			Tip 1: You can change the background color of the main header using: data-background-color="blue | purple | light-blue | green | orange | red"
		-->

		<div class="main-header" data-background-color="light-blue">
			<!-- Logo Header -->
			<div class="logo-header">
				
				<a href="dashboard.php" class="logo">
					<img src="assets/img/logoazzara.svg" alt="navbar brand" class="navbar-brand">
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="fa fa-bars"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="fa fa-ellipsis-v"></i></button>
				<div class="navbar-minimize">
					<button class="btn btn-minimize btn-rounded">
						<i class="fa fa-bars"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<?php require("navbar.php"); ?>
			<!-- End Navbar -->
		</div>

		<!-- Sidebar -->
		<?php require("sidebar.php"); ?>
		<!-- End Sidebar -->

		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Update</h4>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
										<div class="d-flex align-items-center">
											<h4 class="card-title">Update Teacher</h4>
											<a href="teacher_list.php" class="btn btn-primary btn-round ml-auto">
												<i class="fa fa-backward"></i>&nbsp;
												Back
												
											</a>
										</div>
									</div>
								<form method ="post" action="edit_teacher.php">
									<div class="card-body">
										<div class="form-group">
											<input type="hidden" class="form-control" id="id" placeholder="Full Name" name="id" value="<?php echo $teacher['id']; ?>">
										</div>
										<div class="form-group">
											<label for="fname">Name</label>
											<input type="text" class="form-control" id="fname" placeholder="Full Name" name="fname" value="<?php echo $teacher['f_name']; ?>">
										</div>
										<div class="form-group">
											<label for="email">Email</label>
											<input type="email" class="form-control" id="email" placeholder="Enter Email" name="email" value="<?php echo $teacher['email']; ?>">
										</div>
										<div class="form-group">
											<label for="password">Password</label>
											<input type="password" class="form-control" id="password" placeholder="Password" name="password">
										</div>
									</div>
									<div class="card-action">
										<button class="btn btn-success" type="submit" name="submit">Update</button>
									</div>
								</form>
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