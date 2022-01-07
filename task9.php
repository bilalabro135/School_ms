<?php 

	class First{
		public $var1;
		public $var2;

		function __construct($v1, $v2){
			$this->var1 = $v1;
			$this->var2 = $v2;
		}
	}

	class Second extends First{
		public $var3;

		function __construct($v1, $v2, $v3){
			$this->var1 = $v1;
			$this->var2 = $v2;
			$this->var3 = $v3;
		}
		function get_method(){
			echo $this->var1;
			echo $this->var2;
			echo $this->var3;
		}
	}

	$obj2 = new Second(20 , 20 ,20);
	$obj2->get_method();

?>