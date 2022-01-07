<?php 
	
	// Class 1
	class Vehicles{
		// Properties
		public $wheels;
		public $staring;
		public $engine;

		 // Functions
		 // Function 1
		function info(){
			echo "Wheels : " . $this->wheels;
			echo "Staring : " . $this->staring;
			echo "Engine : " . $this->engine;
		}

	}

	// Class 2
	class Honda extends Vehicles{
		// Properties
		public $name;
		public $color;

		// Functions
		// Function 1 (construct)
		function __construct($w, $s, $e, $n, $c){
			$this->wheels = $w;
			$this->staring = $s;
			$this->engine = $e;
			$this->name = $n;
			$this->color = $c;
		}

		// Function 2
		function get_info(){
			echo "Wheels : " . $this->wheels . "<br>";
			echo "Staring : " . $this->staring . "<br>";
			echo "Engine : " . $this->engine . "<br>";
			echo "Name : " . $this->name . "<br>";
			echo "Color : " . $this->color . "<br>";
		}
	}

	$obj = new Honda(4 , 1 , 1 , 'civic' , 'black');
	$obj->get_info();




 ?>