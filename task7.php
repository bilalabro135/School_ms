<?php 

	// Class 1
	class Muslim{
		// Properties
		public $major;

		// Functions
		// Function 1
		function __construct($m){
			$this->major = $m;
		}

		// Function 2
		function get_major(){
			echo "Major duty : " . $this->major;
		}

	}

	// Class 2
	class Other_duty extends Muslim{
		// Properties
		public $duty1;
		public $duty2;
		public $duty3;
		public $duty4;
		public $duty5;

		// Functions
		// Function 1
		function __construct($d1,$d2,$d3,$d4){
			$this->duty1 = $d1;
			$this->duty2 = $d2;
			$this->duty3 = $d3;
			$this->duty4 = $d4;
		}

		// Function 2
		function get_duties(){
			echo "Duty 1 : " . $this->duty1 . "<br>";
			echo "Duty 2 : " . $this->duty2 . "<br>";
			echo "Duty 3 : " . $this->duty3 . "<br>";
			echo "Duty 4 : " . $this->duty4 . "<br>";
		}

	}

	$obj = new Other_duty('Namaz', 'Roza', 'Zakaat','Hajj');
	$obj->get_duties();




 ?>