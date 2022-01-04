<?php 

	class Vehicles{

		public $a, $b, $c;

		function fn_models(){
			return $this->a . $this->b . $this->c;
		}

	}

		// $object1 = new calculation();
		// $object1->a = 40;
		// $object1->b = 10;
		// echo $object1->fn_sum() . "<br>";
		// echo $object1->fn_sub()	. "<br>";
		// echo $object1->fn_div() . "<br>";
		// echo $object1->fn_mul() . "<br>";

	$car1 	 = new Vehicles();
	$car1->a = 'Volvo V60' . "<br>";
	$car1->b = 'Volvo V90' . "<br>";
	$car1->c = 'Volvo XC60' . "<br>";

	echo $car1->fn_models() . "<br>";

	$car2	 = new Vehicles();
	$car2->a = "Honda". "<br>";
	$car2->b = "City". "<br>";
	$car2->c = "BRV". "<br>";

	echo $car2->fn_models() . "<br>";

	$car3	 = new Vehicles();
	$car3->a = "Corolla". "<br>";
	$car3->b = "Land cruiser". "<br>";
	$car3->c = "Yaris". "<br>";

	echo $car3->fn_models();
	
	class Fruits{
		// Properties
		public $color;
		public $name;

		// Functions
		function set_name($name){
			$this->name = $name;
		}

		function get_name(){
			return $this->name;
		}

	}

	$apple  = new Fruits();
	$banana = new Fruits();
	$orange = new Fruits();
	
	$apple->set_name("Apple");
	
	$banana->set_name("Banana");
	
	$orange->set_name("orange");

	echo $apple->get_name() . "<br>";
	echo $banana->get_name() . "<br>";
	echo $orange->get_name() . "<br>";



	class Cars{
			// Properties
			public $color;
			public $name;

			// Functions
			function set_name($name){
				$this->name = $name;
			}

			function get_name(){
				return $this->name;
			}

		}


		$cars1 = new Cars();
		$cars1->set_name("Corolla");
		echo $cars1->get_name() . "<br>";


		$cars2 = new Cars();
		$cars2->set_name("Civic");
		echo $cars2->get_name() . "<br>";

		$cars3 = new Cars();
		$cars3->set_name("Cultus");
		echo $cars3->get_name() . "<br>";


	class task1{
		// Properties
		public $text;

		// Functions
		function MyClass(){
			$this->text = 'MyClass class has initialized !';
			return $this->text;
		}

	}

	$task1 = new task1();
	echo $task1->MyClass();

	class Task2{
		// Properties
		public $message;

		// Function
		function fn_message($data){
			$this->message = "Hello I am ". $data;
			return $this->message;
		}

	}

	$task2 = new Task2();
	echo $task2->fn_message("Bilal");

	class sorting{
		public $array;

		function array_sort($data){
			$this->array = sort($data);
			return $this->array;
		}
	}

	$test 		= array(10, 29, 12, 30, 60, 20);
	
	$arraysort1 = new sorting();
	print_r($arraysort1->array_sort($test));
	
	// This is what you need for future date from now.
	echo date('Y-m-d', strtotime("+7 day")) . "<br>";

	// This is what you need for future date from specific date.
	echo date('Y-m-d', strtotime('+7 day'));


	// now
	$now = date('Y / M / D');
	echo $now . "<br>";
	// 1 month forward
	$month = date('Y / M / D', strtotime('+1 months'));
	echo $month . "<br>";
	// 25 days back
	$day = date('Y / M / D', strtotime('-25 days'));
	echo $day . "<br>";
	// 1 year forward
	$year = date('Y / M / D', strtotime('+1 years'));
	echo $year . "<br>";

	class cars_new{
		public $name;

		function car_toyota(){
			$this->name = "Toyota company cars : Corolla , landcruiser , prado";
			return $this->name;
		}
		function car_honda(){
			$this->name = "Honda company cars : Civic , BRV , city";
			return $this->name;
		}
		function car_suzuki(){
			$this->name = "Suzuki company cars : Cultus , mehran , khyber";
			return $this->name;
		}
		function car_kia(){
			$this->name = "Kia company cars : Sportage , carnival , picanto";
			return $this->name;
		}
	}

	$cars1 = new cars_new();
	echo $cars1->car_kia();

 ?>