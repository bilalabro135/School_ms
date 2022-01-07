<?php 

	// class 1
	class Animals{
		// Properties
		public $val1 , $val2 , $val3;

		// Functions
		// Function 1
		function __construct($v1,$v2,$v3){
			$this->val1 = $v1;
			$this->val2 = $v2;
			$this->val3 = $v3;
		}

	}

	// class 2
	class Animal_speci extends Animals{
		// Properties
		public $sp1, $sp2;

		// Functions
		// Function 1
		function __construct($v1, $v2, $v3, $sp1, $sp2){
			$this->val1 = $v1;
			$this->val2 = $v2;
			$this->val3 = $v3;
			$this->sp1 = $sp1;
			$this->sp2 = $sp2;
		}

		// Function 2
		function get_animal_name(){
			echo "Common in animals : " . $this->val1 . "<br>";
			echo "Common in animals : " . $this->val2 . "<br>";
			echo "Common in animals : " . $this->val3 . "<br>";
			echo "Specification of animals : " . $this->sp1 . "<br>";
			echo "Specification of animals : " . $this->sp2 . "<br>";
		}
	}

	$obj = new Animal_speci('4 Legs','2 Eyes','Breeding','(Reptiles)','(Amphibians)');
	$obj->get_animal_name();




 ?>