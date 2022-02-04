<?php 

	require "dbwork.php";
	$obj->is_logged_in();

	$students = $obj->fetch_students();
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$student_fees = $obj->get_std_fees($id);

		// $obj->debug($student_fees);
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
						<div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
							<h4 class="card-title">Update fees</h4>
							<a href="students_fees.php" class="btn btn-sm btn-primary" style="float: right;">
							<i class="fa fa-angle-left"></i>&nbsp;
								Back
							</a>
						</div>
						<form method="POST" action="process.php">
							<div class="card-body">
								<div class="row">
								<div class="col-md-6">
									<input type="hidden" name="id" value="<?php echo $student_fees['id'] ?>">
								<label>Student</label>
								<select class="border form-control" name="std_id" id="std_id">
									<option selected disabled>--- Please select ---</option>
									<?php foreach ($students as $key => $value) { ?>
									<option value="<?php echo $value['id'] ?>"><?php echo ucwords($value['fname'] ." ". $value['lname']) ?></option>
									<?php 
									}
								 ?>
								</select>
								</div>
									<div class="col-md-6">
										<label>Fees</label>
									
										<input type="number" name="fees_id" id="fees_id" class="form-control" value="<?php echo $student_fees['fees_id'] ?>" placeholder="Fees" readonly>

									</div>
								</div>
							</div>
							<div class="card-action">
								<button class="btn btn-sm btn-primary" name="submit_btn" value="update_new_fees">Update fees</button>
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
					$('#fees_id').val(res.fees)
				}
			});
		})
	})
</script>

</body>
</html>