<?php 

	require "dbwork.php";
	$obj->is_logged_in();

	if (isset($_GET['id'])) {
		$id = $_GET['id'];
	}
	$add_salary = $obj->fetch_teachers();
	$fetch_teachers = $obj->fetch_teachers_salary();
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
						<div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
							<h4 class="card-title">Update salary</h4>
							<a href="teachers_salary.php" class="btn btn-sm btn-primary" style="float: right;">
							<i class="fa fa-angle-left"></i>&nbsp;
								Back
							</a>
						</div>
						<form method="POST" action="process.php">
							<div class="card-body">
								<div class="row">
									<div class="col-md-6 form-group">
										<label>Salary</label>
										<select class="border form-control" name="tchr_id" id="tchr_id" required>
											<option selected disabled value="">--- Please select ---</option>
											<?php foreach ($add_salary as $key => $value) { ?>
											<option value="<?php echo $value['id'] ?>"><?php echo ucwords($value['fname'] ." ". $value['lname']) ?></option>
											<?php 
											}
										 ?>
										</select>
									</div>
									<div class="col-md-6 form-group">
										<label>Salary</label>
										<input type="number" name="salary_id" id="salary_id" class="form-control" placeholder="Salary" readonly>
										<input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
									</div>
								</div>
							</div>
							<div class="card-action">
								<button class="btn btn-sm btn-primary" name="submit_btn" value="update_new_salary">Update salary</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php require "foot_script.php"; ?>

	<script type="text/javascript">
	$(document).ready(function (){
		$('#tchr_id').change(function (){
			var tchr_id = $('#tchr_id').val();
			$.ajax({
				type: "POST",
				url: "request.php",
				data: {
					id: tchr_id,
					fn: "fetch_tchr_salary_by_id"
				},
				success: function (result){
					var res = $.parseJSON(result);
					$('#salary_id').val(res.salary)
				}
			});
		})
	})
</script>

</body>
</html>