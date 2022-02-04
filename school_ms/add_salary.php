<?php 

	require "dbwork.php";
	$obj->is_logged_in();

	$add_fees = $obj->fetch_teachers();
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
					<div class="page-header">
						<h4 class="page-title">Teacher salary</h4>
					</div>
					<div class="card">
						<div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
							<h4 class="card-title">Add teacher salary</h4>
							<a href="teachers_salary.php" class="btn btn-info btn-sm" style="float: right;">
							<i class="fa fa-angle-left"></i>&nbsp;
								Back
							</a>
						</div>
						<form method="POST" action="process.php">
							<div class="card-body">
								<div class="row">
									<div class="col-md-6">
										<label>Teacher</label>
										<select class="form-control"  name="tchr_id" id="tchr_id">
											<option selected disabled value="">--- Please select ---</option>

											<?php 
												foreach ($add_fees as $key => $value) { ?>
													<option value="<?php echo $value['id'] ?>"><?php echo $value['fname'] ?></option><?php 
												}
											?>

										</select>
									</div>
								
									<div class="col-md-6">
										<label>Salary</label>
										<input type="number" name="salary_id" id="salary_id" class="form-control" placeholder="RS. 0" readonly>
									</div>
								</div>
							
							</div>
							<div class="card-action">
								<button type="submit" class="btn btn-info btn-sm" name="submit_btn" value="add_new_salary">Add salary</button>
								<!-- <button type="cancel" class="btn btn-danger btn-sm">Cancel</button> -->
							</div>
						</form>
					
					</div>
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