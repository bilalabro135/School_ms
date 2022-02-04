
<?php require "dbwork.php";

	$data = $obj->fetch_pagination_data();
	$fetch_data = $obj->pagination();


 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<style type="text/css">
		ul{
			padding: 0;
		}
		ul li{
			display: inline-block;
			background: #0982ffe6;
			margin: 0 4px;
		}
		ul li a{
			color: #fff;
			padding: 4px 8px;
			font-size: 12px;
		}
	</style>
</head>
<body>
	<div class="container">
		<table class="table table-striped table-bordered" style="text-align: center; margin-top: 50px;">
			<tr>
				<th>Id</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Age</th>
				<th>Qualification</th>
				<th>Phone</th>
			</tr>
			<?php foreach ($data as $key => $value) { ?>
			<tr>
				<td><?php echo $value['id'] ?></td>
				<td><?php echo $value['fname'] ?></td>
				<td><?php echo $value['lname'] ?></td>
				<td><?php echo $value['age'] ?></td>
				<td><?php echo $value['qualification'] ?></td>
				<td><?php echo $value['phone_no'] ?></td>
			</tr>
			<?php } ?>
		</table>
		<?php echo "<ul>"; ?>
		<?php for ($i=1; $i <= $fetch_data; $i++) {
				echo "<li><a href='pagination.php?page=$i'>$i</a></li>";
		} ?>
			<!-- <li><a href="#">2</a></li>
			<li><a href="#">3</a></li> -->
		<?php echo "</ul>"; ?>
	</div>
</body>
</html>