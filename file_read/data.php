<?php 

	$file = fopen("feb2022.csv","r");

	while ($data = fgetcsv($file)) {
		$array[] = $data;
	}
	fclose($file);

	$cus_arr = array();
	$cus_index = array();

	foreach ($array as $key => $value) {
		if (!in_array($value[1], $cus_arr)) {
			array_push($cus_arr, $value[1]);
		}
		if (!in_array($value[0], $cus_index)) {
			array_push($cus_index, $value[0]);

		}
		$cus_assoc[$value[0]] = $value[1];
	}

	// echo "<pre>";
	// print_r($cus_assoc);
	// echo "</pre>";

	// echo "<pre>";
	// print_r($cus_assoc);
	// echo "</pre> <br>";

	// echo "<pre>";
	// print_r($cus_arr);
	// echo "</pre> <br>";

	// echo "<pre>";
	// print_r($cus_index);
	// echo "</pre>";


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<br>
		<form action="index.php" method="POST" required>
			<select class="form-control" name="get_name">
				<option value="">--- Please select ---</option>
				<?php foreach ($cus_assoc as $key => $value) {?>
				<option value="<?php echo $key; ?>"><?php echo $value ?></option>
				<?php
				$demo_key = $key;
				} 
			?>
			</select>
			<br>
			<button type="submit" class="btn btn-success">Submit</button>
		</form>
	</div>
</body>
</html>