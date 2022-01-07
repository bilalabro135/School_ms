<?php 

	// Class 1
	class Family_main{
		// Properties
		public $main1;
		public $main2;

		// Functions 
		// Function 1
		function __construct($m1, $m2){
			$this->main1 = $m1;
			$this->main2 = $m2;
		}

		// Function 2
		function get_main(){
			echo "Main member 1 : " . $this->main1 . "<br>";
			echo "Main member 2 : " . $this->main2 . "<br>";
		}
	}

	// Class 2
	class Family_other extends Family_main{
		// Properties
		public $others1;
		public $others2;

		// Functions
		// Function 1
		function __construct($other1, $other2){
			$this->others1 = $other1;
			$this->others2 = $other2;
		}

		// Function 2
		function get_others(){
			echo "Other member 1 : " . $this->others1 . "<br>";
			echo "Other member 2 : " . $this->others2 . "<br>";
		}
	}

	$obj1 = new Family_other('Daughter','Son');
	$obj1->get_others();



 ?>