<?php 

	// Parent class
	class Employee{
		// Properties
		public $id;
		public $name;
		public $salary;

		// Functions
		// Function 1 (Constructor)
		function __construct($id , $name , $salary){
			$this->id 	  = $id;
			$this->name   = $name;
			$this->salary = $salary;
		}

		// Function 2
		function get_info(){
			echo "Employee id : " . $this->id . "<br>";
			echo "Employee name : " . $this->name . "<br>";
			echo "Employee salary : " . $this->salary . "<br>";
		}

	}

	// class 1
	class Employee_object extends Employee{
		// Properties
		public $va = 4000;
		public $bonus = 5000;
		public $total_salary;

		// Functions
		// Function 1 (Constructor)
		function __construct($id , $name , $salary){
			$this->id 	  = $id;
			$this->name   = $name;
			$this->salary = $salary;
		}

		// Function 2
		function get_info_emp(){
			$this->total_salary = $this->va + $this->bonus + $this->salary;
			echo "Employee id : " . $this->id . "<br>";
			echo "Employee name : " . $this->name . "<br>";
			echo "Employee salary : " . $this->total_salary . "<br>";
		}

	}

	$obj1 = new Employee_object(1 , 'Bilal' , 10000);
	$obj1->get_info_emp();


 ?>