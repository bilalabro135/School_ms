<?php 

	// Class 1
	class Anime_list{
		// Properties
		public $type;
		public $category;

		// Functions
		// Function 1
		function __construct($t, $c){
			$this->type 	= $t;
			$this->category = $c;
		}

		// Functions 2
		function set_anime(){
			echo "Type : " . $this->type . "<br>";
			echo "Category : " . $this->category . "<br>";
		}
	}


	// Class 2
	class Anime_suggest extends Anime_list{
		// Properties
		public $ad;

		// Functions
		// Function 1
		function __construct($ad){
			$this->ad = $ad;
		}

		// Function 2
		function get_anime(){
			// echo $this->ad;
			echo "Suggestion : " . $this->ad . "<br>";		
		}

	}
	
	$obj = new Anime_suggest('Naruto.');
	$obj->get_anime();





 ?>