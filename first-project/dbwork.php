<?php 
 session_start();
  class Mydb{
    private $db_host = "localhost";
    private $db_user = "root";
    private $db_pass = "";
    private $db_name = "school";

    public $conn = "";
    public $mysqli = "";
    public $res = array();

    function __construct(){
      $this->conn = new mysqli($this->db_host, $this->db_user, $this->db_pass,$this->db_name) or die("Connection failed");
    }

    public function set_session($data) {
      $_SESSION['user'] = $data;
    }

    public function is_logged_in(){
      if (!(isset($_SESSION['user']))) {
        header("location:index.php");
      }
    }

     public function logged_out(){
      session_unset();
      session_destroy();
      header("location:index.php");
    }

    public function login($data) {
      extract ($data);
      $query = "SELECT * FROM `registerusers` WHERE `username` = '$username' and `password` = '$password' ";

      $res = $this->conn->query($query);
  
      if ($res->num_rows>0) {
      	$record = $res->fetch_assoc();

      	if (isset($record['username'])) {
      		$this->set_session($record);
      		return true;
      	}else{
      		return false;
      	}
      }
      
    }

    public function get_teacher($id){
      // extract($data);
      $sql = "SELECT * from `teachers` where `id` ='$id'";
      $res = $this->conn->query($sql);
      if ($res->num_rows>0) {
        $record = $res->fetch_assoc();
        return $record;
      }
    }

     public function get_student($id){
      // extract($data);
      $sql = "SELECT * from `students` where `id` ='$id'";
      $res = $this->conn->query($sql);
      if ($res->num_rows>0) {
        $record = $res->fetch_assoc();
        return $record;
      }
    }

    public function update_teacher($data){
      extract($data);
      $query = "UPDATE `teachers` SET `f_name` = '$fname', `email` = '$email', `password` = '$password' WHERE `id` = '$id'";
      $res = $this->conn->query($query);  
      return $res;

    }

     public function update_student($data){
      extract($data);
      $query = "UPDATE `students` SET `f_name` = '$fname', `email` = '$email', `password` = '$password' WHERE `id` = '$id'";
      $res = $this->conn->query($query);  
      return $res;

    }

    public function delete_teacher($data){
      $sql = "DELETE FROM `teachers` WHERE `id` = '$data'";
      $res = $this->conn->query($sql);
      return $res;
    }

    public function delete_student($data){
      $sql = "DELETE FROM `students` WHERE `id` = '$data'";
      $res = $this->conn->query($sql);
      return $res;
    }


    public function fetch_teachers(){
      $query  = "SELECT * FROM `teachers`";
      $res    = $this->conn->query($query);
      $i= 0;

      $data = array();


      while($row = $res->fetch_assoc()){
        foreach ($row as $key => $value) {
          $data[$i][$key] = $value;
        }
        $i++;
      }
      
      return $data;

    }

    public function fetch_students(){
      $query  = "SELECT * FROM `students`";
      $res    = $this->conn->query($query);
      $i= 0;

      $data = array();


      while($row = $res->fetch_assoc()){
        foreach ($row as $key => $value) {
          $data[$i][$key] = $value;
        }
        $i++;
      }
      
      return $data;

    }

    public function add_teacher($data){
      extract($data);
      $sql = "INSERT INTO `teachers` (`f_name`, `email`, `password`) VALUES ('$fname', '$email', '$password')";
      $res = $this->conn->query($sql);
      return $res;
    }

     public function add_student($data){
      extract($data);
      $sql = "INSERT INTO `students` (`f_name`, `email`, `password`) VALUES ('$fname', '$email', '$password')";
      $res = $this->conn->query($sql);
      return $res;
    }




    public function insert_data($data, $params = array()){
      if ($this->table_exists($data)) {

        $table_col   = implode(',', array_keys($params));
        $table_value = implode("','", $params);

        $sql = "INSERT INTO $data ($table_col) VALUES ('$table_value')";

        if ($this->name_survey($table_value)) {
          if ($this->mysqli->query($sql)) {
            array_push($this->res, $this->mysqli->insert_id);
            return true;
          }else{
            array_push($this->res, $this->mysqli->error);
            return false;
          }
        }

      }
    }

    public function table_exists($table){
      $sql    = 'SHOW TABLES FROM school LIKE "$table"';
      $tableinDB  = $this->mysqli->query($sql);
      if ($tableinDB) {
        if ($tableinDB->num_rows == 1) {
          return true;
        }else{
          array_push($this->res, $table . "Does not exists in database");
          return false;
        }
      }
    }

    public function update_data($data, $param = array(), $where = null){
      if ($this->table_exists($data)) {
        
        $args = array();

        foreach ($param as $key => $value) {
          $args[] = "$key = '$value'";
        }
        $sql = "UPDATE $data SET " . implode(',', $args);
        if ($where != null) {
          $sql .= " WHERE $where";
        }
        echo $sql;

        if ($this->mysqli->query($sql)) {
          array_push($this->res, $this->mysqli->affected_rows);
        }else{
          array_push($this->res, $this->mysqli->error);
        }
      }else{
        return false;
      }
    }

    public function delete_data($table, $where = null){
      if ($this->table_exists($table)) {
        $sql = "DELETE FROM $table";
        if ($where != null) {
          $sql .= " WHERE $where";
        }

        if ($this->mysqli->query($sql)) {
          array_push($this->res, $this->mysqli->affected_rows);
        }else{
          array_push($this->res, $this->mysqli->error);
        }

      }else{
        return false;
      }
    }

    // public function set_session(){
    //  $_SESSION['user'] = $_POST;
    //  return $_SESSION['user'];
    // }

    public function select_data($data, $where = null){
      if ($this->table_exists($data)){
        $sql = "SELECT * FROM '$data'";
        if($where != null) {
          $sql .= " WHERE '$where'";
        }

        if (isset($sql)) {
          $connect = $this->mysqli->query($sql);
          if ($connect->num_rows>0) {
            $record = $connect->fetch_assoc();
            return $record;
          }
        }else{
          array_push($this->res, $this->mysqli->error);
        }
      }
    }

    // Properties
    public function name_survey($data){
      $pattern  = '/[a-z]/i';
      if (!preg_match($pattern , $data) == 1) {
        return "Invalid name";
      }else{
        return $data;
      }
    }

    public function email_survey($data){
      $pattern  = '/^[a-z0-9]/';
      if (!preg_match($pattern , $data) == 1) {
        return "Invalid email";
      }else{
        return $data;
      }
    }
    

		public function debug($data){
			echo "<pre>";  
			print_r($data);
			echo "</pre>";
			exit();
		}
  }

  $obj = new Mydb();
?>