<?php 

	require "dbwork.php";
	$obj->is_logged_in();

	$add_fees = $obj->fetch_students();
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
						<h4 class="page-title">Student fees</h4>
					</div>
					<div class="card">
						<div class="card-header" style="display: flex; align-items: center;">
							<h4 class="card-title">Add student fees</h4>
							<a href="students_fees.php"class="btn btn-primary btn-sm ml-auto" style="float: right;">
								<i class="fa fa-"></i>
								Back
							</a>
						</div>
						<form method="POST" action="process.php">
							<div class="card-body">
								<div class="row">
									<div class="col-md-6">
										<label>Student</label><br>
										<select class="border form-control" name="std_id" id="std_id">
											<option selected disabled>Please Select Name</option>
											<?php foreach ($add_fees as $key => $value) { ?>
											<option value="<?php echo $value['id'] ?>"><?php echo ucwords($value['fname'] ." ". $value['lname']) ?></option>
											<?php 
											}
										 ?>
										</select>
									</div>
									<div class="col-md-6">
										<label>Fees</label>
										<input type="number" name="fees" id="fees" class="form-control" placeholder="RS.0" readonly>
									</div>
								</div>
							</div>
							<div class="card-action">
								<button class="btn btn-info" name="submit_btn" value="add_new_fees">Add fees</button>
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
		$('#std_id').change(function (){
			var std_id = $('#std_id').val();
			$.ajax({
				type: "POST",
				url: "request.php",
				data: {
					id: std_id,
					fn: "fetch_std_fees_by_id"
				},
				success: function (result){
					var res = $.parseJSON(result);
					$('#fees').val(res.fees)
				}
			});
		})
	})
</script>

</body>
</html>