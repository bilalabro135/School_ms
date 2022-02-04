<?php 

	require "dbwork.php";

	 $data = $obj->get_qualification();

 ?>

<!DOCTYPE html>
<html lang="en">
<?php 
	require ("head.php");
?>
<body>
	<style type="text/css">
	.cus_error{
		color:red;
		font-style: italic;
		font-size: 10px;"
	}
	.main-panel{
		overflow-y: scroll;
	}
</style>
	<div class="wrapper">
		<div class="main-header">
			<!-- Navbar Header -->
		<?php require("navbar.php"); ?>
	
		<!-- Sidebar -->
		<?php require("sidebar.php"); ?>
	
			<div class="main-panel">
				<div class="content">
					<div class="page-inner">
						<div class="page-header">
							<h4 class="page-title">Qualification</h4>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-header">
										<div class="d-flex align-items-center">
											<h4 class="card-title">Qualification</h4>
											<button type="button" class="btn btn-primary btn-sm ml-auto" data-toggle="modal" data-target="#exampleModal">
                                            <i class="fa fa-plus"></i>
											  Add new Qualification
											</button>
										</div>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table id="add-row" class="table table-striped table-hover" >
												<thead>
													<tr>
														<th>Id</th>
														<th>Name</th>
														<th style="width: 20%">Action</th>
													</tr>
												</thead>
												<tbody>
													<?php foreach ($data as $key => $value) { ?>
													<tr>
														<td><?php echo $value['id']?></td>
														<td><?php echo ucfirst($value['name'])?></td>
														<td>
														<div class="form-button-action">
															<a href="" class="btn btn-link btn-primary btn-lg view_quali" data-id = "<?php echo $value['id']?>" data-toggle="modal" data-target="#exampleModalView">
																<i class="fa fa-eye" aria-hidden="true"></i>
												            </a>
															<a href="" class="btn btn-link btn-primary btn-lg edit_quali" data-id="<?php echo $value['id'] ?>" data-original-title="Edit" id="update_quali" data-toggle="modal" data-target="#exampleModalEdit">
																<i class="fa fa-edit"></i>
												            </a>
															<a href="process.php?id=<?php echo $value['id']?>&submit_btn=delete_qualification" type="button" class="btn btn-link btn-danger btn-lg" data-original-title="Remove">
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

			<!-- qualification modal add :: STARTS-->
			    <div class="modal fade background_manage" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				    <div class="modal-dialog" role="document">
					    <div class="modal-content">
					        <div class="modal-header">
						        <h5 class="modal-title" id="exampleModalLabel">Add qualification</h5>
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						          <span aria-hidden="true">&times;</span>
						        </button>
					        </div>
			    			<form id ="form">
								<div class="modal-body">
								  	<div class="row">
										<div class="col">
											<div class="form-group">
												<label for="name">Qualification <span class="text-danger">*</span> </label>
												<input type="text" autofocus class="form-control" name = "name" id="name" placeholder="Qualification" >
												<span id="name-error" class="cus_error"></span>
											</div>
										</div>
										
									</div>
								</div>
						        <div class="modal-footer">
							        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
							        <button type="button" class="btn btn-primary" id ="submit_btn">Add qualification</button>
						        </div>
				  			</form>
				    	</div>
				    </div>
				</div>
			<!-- qualification modal add :: ENDS-->
			
			<!-- qualification modal view :: STARTS-->
			    <div class="modal fade background_manage" id="exampleModalView" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				    <div class="modal-dialog" role="document">
					    <div class="modal-content">
					        <div class="modal-header">
						        <h5 class="modal-title" id="exampleModalLabel">Add qualification</h5>
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						          <span aria-hidden="true">&times;</span>
						        </button>
					        </div>
			    			<form id ="form">
								<div class="modal-body">
								  	<table class="table dt-responsive">
								  		<thead>
								  			<tr>
								  				<th>Id</th>
								  				<td><span class="quali_id"></span></td>
								  			</tr>
								  			<tr>
								  				<th>Qualification</th>
								  				<td><span class="quali_name"></span></td>
								  			</tr>
								  		</thead>
								  	</table>
								</div>
						        <div class="modal-footer">
							        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
						        </div>
				  			</form>
				    	</div>
				    </div>
				</div>
			<!-- qualification modal view :: ENDS-->

			<!-- qualification modal update :: STARTS-->
			    <div class="modal fade background_manage" id="exampleModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalEdit" aria-hidden="true">
				    <div class="modal-dialog" role="document">
					    <div class="modal-content">
					        <div class="modal-header">
						        <h5 class="modal-title" id="exampleModalEdit">View qualification</h5>
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						          <span aria-hidden="true">&times;</span>
						        </button>
					        </div>
					        <form id="update_form">
								<div class="modal-body">
									<div class="form-group">
										<!-- <label for="qualification">Id<span class="text-danger">*</span></label> -->
										<input type="hidden" class="form-control" name = "quali_id" id = "quali_id" >
										<label for="qualification">Qualification <span class="text-danger">*</span></label>
										<input type="text" class="form-control" name = "quali_name" id = "quali_name">
									</div>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
									<button type="button" class="btn btn-primary" id ="update_quali_btn">Update qualification</button>
								</div>
							</form>
				    	</div>
				    </div>
			<!-- qualification modal update ::ENDS-->
		</div>
	<?php require "foot_script.php"; ?>
	<script type="text/javascript">
		$(document).ready(function (){
			function cus_message( title,mes, icon, typee){
				var content = {};
				content.message = mes;
				content.title = title;
				content.icon = icon

				$.notify(content,{
					type: typee,
					placement: {
						from: "top",
						align: "right"
					},
					time: 1000,
					delay: 2000,
				});
			}

			// validate the field in which you are typing using input ID
			function cus_validate(id){
				var len = ( ($.trim($('#'+id).val()).length));
				if( len <= 0){

					$('#'+id).css('border','1px solid red');
					$('#'+id).focus();
					$('#'+id).val("");

					$('#'+id+'-error').text("Please fill this field");
					return false;

				}else{
					$('#'+id).css('border','1px solid green');
					$('#'+id+'-error').text("");
					return true;
				}
			}

			// getting Id of input field in which you are typing
			$("input").focusout(function(){
				 var id = $(this).attr('id');
				 return cus_validate(id)

;	
			});

			// validate all the fields in the forms
			function validate_all_fields(){

				if( (cus_validate("name"))  ){
					 	return true;
					}else{
						return false;
					}
				
			}


			$('#submit_btn').click(function (){
				// call validate_all_fields functions before submit.
				// console.log("click");
				var res =  validate_all_fields();
				if(res){
						// alert("Wow, You have entered all fields");

						$.ajax({
							type: "POST",
							url: "request.php",
							data:{

							  	data: $('#form').serialize(),
								fn  :'add_qualification'
							},
							success: function (result){
								// console.log("adfasdfadsf");

								var rec = $.parseJSON(result);
								$('#exampleModal').modal('toggle')

								if(rec.status == "success"){
									
									cus_message("Submitted", "Record has been submitted successfully", "fas fa-check", "success")
								}else{
									cus_message("Error", "Record has not been submitted", "fas fa-times", "danger")
								}
									
								$('#name').val("");
							}
						});
					}else{
						// alert("Please fill all the field");
					}
			  })

			$('.view_quali').click(function(){
				var quali_id = $(this).attr('data-id');

				if(quali_id){
					$.ajax({
						type: "POST",
						url: "request.php",
						data:{

						  	data: quali_id,
							fn  :'view_qualification'
						},
						success: function (result){
							// console.log('test');
							var rec = $.parseJSON(result);
							$('.quali_id').text(quali_id);
							$('.quali_name').text(rec.data);
						}
					});
				}
			})

			$('.edit_quali').click(function(){
				var quali_id = $(this).attr('data-id');

				if(quali_id){
					$.ajax({
						type: "POST",
						url: "request.php",
						data:{

						  	data: quali_id,
							fn  :'view_qualification'
						},
						success: function (result){
							// console.log('test');
							var rec = $.parseJSON(result);
							$('#quali_id').val(quali_id);
							$('#quali_name').val(rec.data);
						}
					});
				}
			})


			$('#update_quali_btn').click(function (){
			// call validate_all_fields functions before submit.
			// console.log("click");
			// var res =  validate_all_fields();
			// if(res){
					// alert("Wow, You have entered all fields");

					$.ajax({
						type: "POST",
						url: "request.php",
						data:{

						  	data: $('#update_form').serialize(),
							fn  :'update_qualification'
						},
						success: function (result){
							// console.log("adfasdfadsf");

							var rec = $.parseJSON(result);
							$('#exampleModalEdit').modal('toggle')

							if(rec.status == "success"){
								
								cus_message("Submitted", "Record has been submitted successfully", "fas fa-check", "success")
							}else{
								cus_message("Error", "Record has not been submitted", "fas fa-times", "danger")
							}
								
							$('#quali_name').val("");
						}
					});
				// }else{
				// 	// alert("Please fill all the field");
				// }
		  })





		})
	</script>
	<?php require "form_handle.php"; ?>
</body>
</html>