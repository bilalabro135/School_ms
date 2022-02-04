<?php 

	require "dbwork.php";
	$obj->is_logged_in();

	$class = $obj->fetch_class();
	if (isset($_GET['msg']) && ($_GET['msg']) == 0) { ?>
		<script>
			alert("Class already exists");
		</script>
	
	<?php 
	}
?>

<!DOCTYPE html>
<html lang="en">
<?php 
	require("head.php");
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
					<div class="card">
						<div class="card-header">
							<div class="d-flex align-items-center">
								<h4 class="card-title">Add new class</h4>
								<a href="classes.php" class="btn btn-primary btn-sm ml-auto" style="float: right;">
								<i class="fa fa-angle-left"></i>
								Back</a>
							</div>
						</div>
						<form method="POST" action="process.php">
							<div class="card-body">
								<div class="row">
									<div class="col">
										<label>Class</label>
										<input type="text" name="cls_name" class="form-control" placeholder="Class">
									</div>
								</div>
							</div>
							<div class="card-action">
								<button type="submit" class="btn btn-sm btn-primary" name="submit_btn" value="cls_name">Add Class</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		
	</div>
</div>

<?php require "foot_script.php"; ?>

</body>
</html>