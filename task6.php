<?php 

	// Class 1
	class Human{
		// Properties
		public $val1;
		public $val2;

		// Functions
		// Function 1
		function __construct($v1, $v2){
			$this->val1 = $v1;
			$this->val2 = $v2;
		}

		// Function 2
		function human_detail(){
			echo "Human main 1 : " . $this->val1 . "<br>";
			echo "Human main 2 : " . $this->val2 . "<br>";
		}

	}

	// Class 2
	class Human_desgin extends Human{
		// Properties
		public $desgin1;
		public $desgin2;

		// Functions
		// Function 1
		function __construct($d1, $d2){
			$this->desgin1 = $d1;
			$this->desgin2 = $d2;
		}

		// Function 2
		function human_desgin_detail(){
			echo "Human desgin 1 : " . $this->desgin1 . "<br>";
			echo "Human desgin 2 : " . $this->desgin2 . "<br>";
		}

	}



	$obj = new Human('skeleton' , 'muscles');
	$obj->human_detail();






?>