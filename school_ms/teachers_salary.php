<?php 

	require "dbwork.php";
	$obj->is_logged_in();

	$teachers = $obj->fetch_teachers_salary();
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
						<h4 class="page-title">Teachers Salary</h4>
					</div>
					<div class="card">
						<div class="card-header">
							<div class="d-flex align-items-center">
								<h4 class="card-title">Add Row</h4>
								<a href="add_salary.php" class="btn btn-primary btn-sm ml-auto" style="float: right;">
								<i class="fa fa-plus"></i>
									Add salary
								</a>
							</div>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table id="add-row" class="display table table-striped table-hover">
									<thead>
										<tr>
											<th>Id</th>
											<th>First name</th>
											<th>Submitted on</th>
											<th>Salary</th>
											<th style="width: 10%">Action</th>
										</tr>
									</thead>
									<tbody>
									<?php 
											foreach ($teachers as $key => $value) { ?>
												<tr>
													<td><?php echo $value['id']?></td>
													<td><?php echo ucwords($value['fname'])?></td>
													<td><?php echo $value['created_at']?></td>
													<td><?php echo $value['salary_id']?></td>
													<td>
														<div class="form-button-action">
															<a href="view_salary.php?id=<?php echo $value['id']; ?>">
															<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="View">
																<i class="fa fa-eye" style="font-size: 18px;"></i>
															</button>
															</a>
															<a href="update_salary.php?id=<?php echo $value['id']; ?>">
															<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
																<i class="fa fa-edit" style="font-size: 18px;"></i>
															</button>
															</a>
															<a href="process.php?id=<?php echo $value['id']?>&submit_btn=delete_salary">
															<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
																<i class="fas fa-trash-alt text-danger" style="font-size: 18px;"></i>
															</button>
															</a>
														</div>
													</td>
												</tr><?php 
											}
										?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
	</div>
</div>

<?php require "foot_script.php"; ?>

	<?php require "foot_script.php";
	  require "form_handle.php";
 ?>

</body>
</html>