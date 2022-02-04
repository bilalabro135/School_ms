<?php 
	
	require "dbwork.php";
	$user = $obj->fetch_user();


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
		<form action="process.php" method="POST">
		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Users list</h4>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title">Users</h4>
										<a href="add_user.php" class="btn btn-primary btn-sm ml-auto"><i class="fa fa-plus"></i> Add new User </a>
									</div>
								</div>
								<div class="card-body">
									<div class="table-responsive customCLass">
										<table id="add-row" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th>Id</th>
                                                    <th>First name</th>
                                                    <th>Last name</th>
                                                    <th>Username</th>
													<th style="width: 10%">Action</th>
												</tr>
											</thead>
											<tbody>
												<?php foreach ($user as $key => $value) { ?>
												<tr>
													<td><?php echo ucfirst ($value['id'])?></td>
													<td><?php echo ucfirst ($value['fname'])?></td>
                                                    <td><?php echo ucfirst ($value['lname'])?></td>
                                                    <td><?php echo ucfirst ($value['username'])?></td>
													<td>
														<div class="form-button-action">
															<a href="view_user.php?id=<?php echo $value['id']?>" class="btn btn-link btn-primary btn-lg" value="view_user" data-original-title="view">
																<i class="fa fa-eye" aria-hidden="true"></i>
												            </a>
															<a href="update_user.php?id=<?php echo $value['id']?>" class="btn btn-link btn-primary btn-lg" data-original-title="Edit">
																<i class="fa fa-edit"></i>
												            </a>
															<a href="process.php?id=<?php echo $value['id']?>&submit_btn=delete_user" type="button" class="btn btn-link btn-danger btn-lg" data-original-title="Remove">
															<i class="fas fa-trash-alt"></i>
												            </a>
														</div>
													</td>
												</tr>
											<?php }?>
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
			
		</form>
	</div>
	<?php require "foot_script.php";
		  require "form_handle.php"; ?>
</body>
</html>