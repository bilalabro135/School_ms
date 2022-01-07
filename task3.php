<?php 
	
	// Class 1
	class Laptop{
		// Properties
		public $ram;
		public $processor;

		// Functions
		// Function 1 (Construct)
		function __construct($r, $p){
			$this->ram 		 = $r;
			$this->processor = $p;
		}

		// Function 2
		function get_info(){
			echo "Ram : " . $this->ram . "<br>";
			echo "Processor : " . $this->processor . "<br>";
		}

	}

	// Class 2
	class Company extends Laptop{
		// Properties
		public $model;
		public $color;

		// Functions
		// Function 1
		function __construct($d, $c){
			$this->model = $d;
			$this->color = $c;
		}

		// Function 2
		function lp_info(){
			echo "Model : " . $this->model . "<br>";
			echo "color : " . $this->color . "<br>";
		}


	}

	$obj1 = new Company('Model' , 'black');
	$obj1->lp_info();





 ?>