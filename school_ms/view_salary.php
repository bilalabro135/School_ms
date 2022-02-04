<?php 

	require "dbwork.php";

	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$teacher_salary = $obj->fetch_salary($id);

		if (!$teacher_salary) {
		header("location:teachers_salary.php");
		}

	}


	$teachers = $obj->fetch_teachers();

 ?>

<!DOCTYPE html>
<html>
<?php require "head.php"; ?>
<body>
	<?php 
	// Navbar starts
	require "sidebar.php";
	// Navbar ends

	// Sidebar starts
	require "navbar.php";
	// Sidebar ends
	 ?>

 <div class="main-panel">
 	<div class="content">
 		<div class="page-inner">
 			<div class="card">
 				<div class="card-header">
 					<div class="d-flex align-items-center">
						<h4 class="card-title">View teacher's salary</h4>
						<a href="teachers_salary.php" class="btn btn-primary btn-sm ml-auto">
							<i class="fa fa-angle-left"></i>
							Back
						</a>
					</div>
 				</div>
 				<div class="card-body">
 					<div class="table-responsive">
                          <table class="table dt-responsive">
	                              <tbody><tr>
	                                  <th width="50%">Id</th>
	                                  <td><?php echo $teacher_salary['id']; ?></td>
	                              </tr>
	                              <tr>
	                                  <th>Full name</th>
	                                  <td><?php foreach ($teachers as $key => $value) { ?>
										<?php if($value['id'] == $teacher_salary['tchr_id']){?>
										<?php echo ucwords($value['fname']) . " " . ucwords($value['lname'])?> 
										<?php 
										}
									?>
								<?php 
								}
							?></td>
	                              </tr>
	                              <tr>
	                                  <th>Salary</th>
	                                  <td><?php echo "PKR : " . $teacher_salary['salary_id']; ?></td>
	                              </tr>
	                          </tbody>
                     		</table><br>
	                    </div>
	 				</div>
	 			</div>
	 		</div>
	 	</div>
	 </div>
</body>
</html>