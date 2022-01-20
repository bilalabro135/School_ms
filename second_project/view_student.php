<?php 

	require "dbwork.php";
	$obj->is_logged_in();

	
		$id = $_GET['id'];
		$teacher = $obj->get_student($id);	

		
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
						<h4 class="page-title">View teacher</h4>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-body">

									<div class="table-responsive">
										<label>First Name</label>
										<h3><i><?php echo $teacher['fname']; ?></i></h3>
										<br>
										<label>Last Name</label>
										<h3><i><?php echo $teacher['lname']; ?></i></h3>
										<br>
										<label>Date of birth</label>
										<h3><i><?php echo $teacher['date_of_birth']; ?></i></h3>
										<br>
										<label>Date of admission</label>
										<h3><i><?php echo $teacher['date_of_admission']; ?></i></h3>
										<br>
										<label>Address</label>
										<h3><i><?php echo $teacher['address']; ?></i></h3>
										<br>
										<label>Phone No:</label>
										<h3><i><?php echo $teacher['phone_no']; ?></i></h3>
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
