<?php 

	require "dbwork.php";
	$obj->is_logged_in();

	
	$id = $_GET['id'];
	$students_fees = $obj->get_fees_data($id);
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
					<div class="page-header .no-print">
						<h4 class="page-title">View student challan</h4>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header no-print">
									<div class="d-flex align-items-center print_btn">
										<h4 class="card-title">Challan</h4>
										<button  class="btn btn-info btn-sm"  onclick="printDiv('main')">
                            			<i class="fa fa-print"></i></button>
                            		</div>
								</div>
								<div class="card-body" id="main">
									<div class="table-responsive">
			                          	<table class="table dt-responsive">
				                            <tbody>
				                              	<tr>
				                              		<?php for ($i=1; $i <=4; $i++) { ?>
				                              		<td style="width: 25%;">
				                              			<table class="inner_table" style="width: 100%;">
														<div class="d-flex align-items-center">
															<img src="assets/img/bafl-logo-home.png" width="80px">
															<h4 class="card-title bank_name">bank alfalah limited</h4>
														</div>
														<br>
				                              			<div class="d-flex align-items-center">
															<img src="assets/img/st_logo.png" width="50px">
															<h4 class="card-title bank_name">St. Bonaventure's High School</h4>
														</div>
														<br>
					                              			<tr>
					                              				<th>A/C NO.</th>
					                              				<th>Nil</th>
					                              			</tr>
					                              			<tr>
					                              				<th>Challan No.</th>
							                                  	<td><?php foreach ($students_fees as $key => $value) {?>
																<?php echo $value['std_id'];
																$id = $value['std_id'];?>
																<?php $students_data = $obj->get_student($id); }?></td>
					                              			</tr>
					                              			<tr>
					                              				<th>Name:</th>
					                                 			<td><?php echo $students_data['fname']." ".$students_data['lname']; ?></td>
					                              			</tr>
					                              			<tr>
					                              				<th>Month of:</th>
					                                 			<td><?php echo date("M"); ?></td>
					                              			</tr>
					                              			<tr>
					                              				<th>Purpose of deposit</th>
					                              				<th>Amount</th>
					                              			</tr>
					                              			<tr>
					                              				<th>Monthly tution fee</th>
					                              				<td><?php echo "PKR : " . $value['fees_id']; ?></td>
					                              			</tr>
					                              			<tr>
					                              				<th>Total fees</th>
					                              	  			<td><?php echo "PKR : " . $value['fees_id'];?></td>
					                              			</tr>
					                              			<tr>
					                              				<th>Total fees in words</th>
					                              	  			<td><?php echo $obj->number_to_word($value['fees_id']) . " rupees"?></td>
					                              			</tr>
					                              			<tr>
					                              				<th>Due date</th>
					                              	  			<td><?php echo date('10 / M / Y'); ?></td>
					                              			</tr>
					                              			<tr class="notice">
					                              				<th>Notice: <br>
					                              					<span>A. Until 10th after due date will be charges Rs.200/-</span>
					                              				</th>
					                              			</tr>
					                              		</table>
					                              	</td>
					                              	<?php } ?>
				                              	</tr>
				                          	</tbody>
			                     		</table><br>
	                   				</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</div>
	<script>
		function printDiv(divName){
            // var div = document.getElementById('btns');
            //     div.remove();
            // $(".btns").remove();
			var printContents = document.getElementById(divName).innerHTML;
			var originalContents = document.body.innerHTML;
          
            // console.log( printContents.children(".btns")) ;
            // console.log(printContents)
			document.body.innerHTML = printContents;
            
			window.print();
            // $(".btns").append();
			document.body.innerHTML = originalContents;

		}
    </script>
	<?php require "foot_script.php"; ?>
</body>
</html>
