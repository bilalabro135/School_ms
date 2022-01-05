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
	 echo "<br>";

 ?>


 <?php 

 	// Class 1
 	class Laptop{
 		// Properties
 		public $processor;
 		public $ram;

 		// Functions
 		function set_value($data1 , $data2){
 			$this->processor = $data1;
 			$this->ram 		 = $data2;
 		}

 		function get_value(){
	 		$var1 = $this->processor ." ". $this->ram;
	 		return $var1;
	 	}
 	}

 	// Class 2
 	class Bottle{
 		// Properties
 		public $set;

 		// Functions
 		// Function 1
 		function set_bottle($data){
 			$this->set = $data;
 		}
 		// Function2
 		function get_bottle(){
 			return $this->set;
 		}

 	}


 	// Class 3
 	class Calculator{
 		// Properties
 		public $val1;
 		public $val2;

 		// Functions
 		// Function 1
 		function sum($data1 , $data2){
 			$this->val1 = $data1;
 			$this->val2 = $data2;
 			$sum_val 	= $data1 + $data2;
 			return $sum_val;
 		}
 		// Function2
 		function sub($data1 , $data2){
 			$this->val1 = $data1;
 			$this->val2 = $data2;
 			$sub_val 	= $data1 - $data2;
 			return $sub_val;
 		}
 		// Function3
 		function div($data1 , $data2){
 			$this->val1 = $data1;
 			$this->val2 = $data2;
 			$div_val 	= $data1 / $data2;
 			return $div_val;
 		}
 		// Function4
 		function mul($data1 , $data2){
 			$this->val1 = $data1;
 			$this->val2 = $data2;
 			$mul_val 	= $data1 * $data2;
 			return $mul_val;
 		}
 	}


 	// Class 4
 	class Arr_Sorting{
 		// Properties
 		public $sort_array;

 		// Functions
 		// Function 1
 		function value_sort($data){
 			$this->sort_array = sort($data);
 			foreach ($data as $key => $value) {
 				echo $value . " ";
 			}
 		}
 	}


 	// Class 5
 	class Constructing{
 		public $name, $age;

 		function __construct($n , $a){
 			$this->name = $n;
 			$this->age 	= $a;
 		}
 		function get_value(){
 			$values = $this->name . $this->age;
 			return $values;
 		}
 	}


 	// Class 6
 	class Data_store{
 		// Properties
 		public $name;
 		public $designation;

 		// Functions
 		// Function 1
 		function __construct($n , $d){
 			$this->name 		= $n;
 			$this->designation 	= $d;
 		}

 		// Function 2
 		function get_data(){
 			$value_data = $this->name . $this->designation;;
 			return $value_data;
 		}
 	}


 	// Class 7
 	class Anime_list{
 		// Properties
 		public $anime;
 		public $cat;
 		public $epi;

 		// Functions
 		// Function 1
 		function __construct($n , $c , $e){
 			$this->anime = $n;
 			$this->cat 	 = $c;
 			$this->epi 	 = $e;
 		}

 		// Function 2
 		function get_anime(){
 			$anime_data = $this->anime . $this->cat . $this->epi;
 			return $anime_data;
 		}
 	}


 	// Class 8
 	class Internee{
 		// Properties
 		public $name , $duration , $learning;

 		// Functions
 		// Function 1
 		function __construct($n , $d , $l){
 			$this->name 	= $n;
 			$this->duration = $d;
 			$this->learning = $l;
 		}

 		// Function 2
 		function get_data(){
 			$data = $this->name . $this->duration . $this->learning;
 			return $data;
 		}
 	}

 	// Class 9
 	class Date_to_time{
 		// Properties
 		public $date1;

 		// Functions
 		// Function 1
 		function __construct($d){
 			$this->date1 = strtotime($d);
 		} 

 		// Function 2
 		function date_here(){
 			$final_date = $this->date1;
 			return $final_date;
 		}
 	}

	// Class 1 object
 	$object1 = new Laptop();
 	$object1->set_value('4Ghz' , '16Ram');
 	echo $object1->get_value();
 	echo "<br>";

 	// Class 2 object
 	$object2 = new Bottle();
 	$object2->set_bottle('Half fill');
 	echo $object2->get_bottle();
 	echo "<br>";

 	// Class 3 object
 	$object3 = new Calculator();
 	
 	echo $object3->sum(12 , 12) . "<br>";
 	echo $object3->sub(12 , 12) . "<br>";
 	echo $object3->div(12 , 12) . "<br>";
 	echo $object3->mul(12 , 12) . "<br>";

 	// Class 4 object
 	$object4 = new arr_Sorting();
 	$array_test = array(12, 13, 20, 15, 8);
 	$object4->value_sort($array_test);
 	echo "<br>";

 	// Class 5 object
 	$object5 = new Constructing('Bilal Abro ', 19);
 	echo $object5->get_value();
 	echo "<br>";

 	// Class 6 object
 	$object6 = new Data_store('Bilal Ahmed ' , 'Developer');
 	echo $object6->get_data();
 	echo "<br>";

 	// Class 7 object
 	$object7 = new Anime_list('Naruto ' , 'Shounen ' , 700);
 	echo $object7->get_anime();
 	echo "<br>";

 	// Class 8 object
 	$object8 = new Internee('Bilal Abro ' , '4 months ' , 'PHP');
 	echo $object8->get_data();
 	echo "<br>";

 	// Class 9 object
 	$object9 = new Date_to_time('12 / 12 / 12');
 	echo $object9->date_here();
 	echo "<br>";

  ?>