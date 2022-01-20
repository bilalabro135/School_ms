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
										<label>Name</label>
										<h3><i><?php echo $teacher['f_name']; ?></i></h3>
										<br>
										<label>Email</label>
										<h3><i><?php echo $teacher['email']; ?></i></h3>
										<br>
										<label>Password</label>
										<h3><i><?php echo $teacher['password']; ?></i></h3>
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
