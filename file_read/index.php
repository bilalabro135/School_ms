<?php 

	$file = fopen("feb2022.csv","r");

	while ($data = fgetcsv($file)) {
		$array[] = $data;
	}
	fclose($file);

 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<style type="text/css">
		table{
			width: 100%;
			border: 1px solid #000;
		}
		table th,table td{
			border: 1px solid #000;
			text-align: center;
		}
	</style>
</head>
<body>
	<table>
		<tr>
			<th>Id</th>
			<th>Name</th>
			<th>Attendence</th>
			<th>Date/Time</th>
		</tr>
		<?php foreach ($array as $key => $value) { 
			if ($_POST['get_name'] == $value[0]) {?>
		<tr>
			<td><?php echo $value[0]; ?></td>
			<td><?php echo $value[1]; ?></td>
			<td><?php if ($value[2] == 0) {
				echo "Checked in"; }
				else{
					echo "Checked out";
				}?></td>
			<td><?php echo $value[4]; ?></td>
		</tr>
		<?php 
		}
	} ?>
	</table>
</body>
</html>