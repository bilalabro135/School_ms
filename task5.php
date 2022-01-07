<?php 

	// Class 1
	class Geeksroot{
		// Properties
		public $id;
		public $name;

		// Functions
		// Function 1
		function __construct($i, $n){
			$this->id = $i;
			$this->name = $n;
		}

		// Function 2
		function get_info(){
			echo "ID : " . $this->id . "<br>";
			echo "Name : " .$this->name . "<br>";
		}

	}

	// Class 2
	class Employee extends Geeksroot{
		// Properties
		public $depart;
		public $id;
		public $name;

		// Functions
		// Function 1
		function __construct($i, $n, $d){
			$this->id = $i;
			$this->name = $n;
			$this->depart = $d;
		}

		// Function 2
		function get_detail(){
			echo "Department : " . $this->depart . "<br>";
			echo "ID : " . $this->id . "<br>";
			echo "Name : " .$this->name . "<br>";
		}

	}

	$obj = new Employee('developer', 1,  'Bilal');
	$obj->get_detail();



 ?>