<?php
	
	$testarray = array(10 , 10 , 10 , 10 , 20);

	function array_count($data){
		$var1 = 0;
		foreach ($data as $key => $value) {
			$var1++;
		}
		return $var1;
	}

	echo array_count($testarray);
	echo "Hello World and terminal";

 ?>
