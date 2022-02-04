<?php 
 session_start();
  class Mydb{
    private $db_host = "localhost";
    private $db_user = "root";
    private $db_pass = "";
    private $db_name = "school_ms";

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

      $password  = md5($password);
      
      $query = "SELECT * FROM `users` WHERE `username` = '$username' and `password` = '$password' ";

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

    public function fetch_user(){
      $query = "SELECT * FROM `users`";
      $res = $this->conn->query($query);
      $i = 0;
      $data = array();

      while ($rows = $res->fetch_assoc()) {
        foreach ($rows as $key => $value) {
          $data[$i][$key] = $value;
        }
        $i++;
      }
      return $data;
    }

    public function view_user($id){
      $query = "SELECT * FROM `users` WHERE `id` = '$id'";
      $res = $this->conn->query($query);
      if ($res->num_rows>0) {
        $record = $res->fetch_assoc();
        return $record;
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
      $sql = "SELECT * from `students` where `id` = $id";
      $res = $this->conn->query($sql);
      if ($res->num_rows>0) {
        $record = $res->fetch_assoc();
        return $record;
      }
    }

    public function get_fees_data($id){
      // extract($data);
      $sql = "SELECT * from `std_fees` where `id` = $id";
      $res = $this->conn->query($sql);
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

    public function update_teacher($data){
      extract($data);

      $fname = ltrim($fname);
      $fname = rtrim($fname);
      $lname = ltrim($lname);
      $lname = rtrim($lname);
      $phone_no = ltrim($phone_no);
      $phone_no = rtrim($phone_no);
      $address = rtrim($address);
      $address = rtrim($address);

      $query = "UPDATE `teachers` SET `fname` = '$fname', `lname` = '$lname', `age` = '$age', `qualification` = '$qualification', `gender` = '$gender_id',  `phone_no` = '$phone_no', `address` = '$address', `marital_id` = '$marital_id', `subject_id` = '$subject_id', `class_id` = '$class_id', `salary` = '$salary' WHERE `id` = '$id'";
      $res = $this->conn->query($query);  
      return $res;

    }




    public function update_class($data){
      extract($data);

      $cls_name = rtrim($cls_name);
      $cls_name = rtrim($cls_name);

      $query = "SELECT * FROM `classes` WHERE `cls_name` = '$cls_name'";
      $res   = $this->conn->query($query);
      if(($res->num_rows) > 0){
        header("location:add_class.php");
        return false;
      }else{
        $query = "UPDATE `classes` SET `cls_name` = '$cls_name' WHERE `id` = $id";
        $res   = $this->conn->query($query);
        header("location:classes.php");
        return $res;
      }

    }

     public function update_student($data){
      extract($data);

       $fname = ltrim($fname);
      $fname = rtrim($fname);
      $lname = ltrim($lname);
      $lname = rtrim($lname);
      $phone_no = ltrim($phone_no);
      $phone_no = rtrim($phone_no);
      $address = rtrim($address);
      $address = rtrim($address);

      $query = "UPDATE `students` SET `fname` = '$fname', `lname` = '$lname', `age` = '$age', `fees` = '$fees', `qualification` = '$qualification', `date_of_birth` = '$date_of_birth', `date_of_admission` = '$date_of_admission',  `phone_no` = '$phone_no', `gender` = '$gender_id', `address` = '$address', `merital_id` = '$merital_status' WHERE `id` = '$id'";
      $res = $this->conn->query($query);
      return $res;

    }

     public function join_tables_with_students(){
      $query  = "SELECT  `students`.`id`,
                         `students`.`fname`,
                         `students`.`lname`,
                         `students`.`age`,

                         `qualification`.`name` as `qualification`,
                         `gender`.`name` as `gender`

                          FROM `students`
                          LEFT JOIN `qualification`
                          ON  `students`.`qualification` = `qualification`.`id`

                          LEFT JOIN `merital_status`
                          ON  `students`.`merital_id` = `merital_status`.`id`

                          LEFT JOIN `gender`
                          ON  `students`.`gender` = `gender`.`id`";

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

     public function join_tables_with_teachers(){
      $query  = "SELECT  `teachers`.`id`,
                         `teachers`.`fname`,
                         `teachers`.`lname`,
                         `teachers`.`age`,

                         `qualification`.`name` as `qualification`,
                         `gender`.`name` as `gender`

                          FROM `teachers`
                          LEFT JOIN `qualification`
                          ON  `teachers`.`qualification` = `qualification`.`id`

                          LEFT JOIN `merital_status`
                          ON  `teachers`.`marital_id` = `merital_status`.`id`

                          LEFT JOIN `gender`
                          ON  `teachers`.`gender` = `gender`.`id`";

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

    public function delete_teacher($data){
      $sql = "DELETE FROM `teachers` WHERE `id` = '$data'";
      $res = $this->conn->query($sql);
      return $res;
    }

    public function delete_qualification($id){
      $sql = "DELETE FROM `qualification` WHERE `id` = '$id'";
      $res = $this->conn->query($sql);
      return $res;
    }

    public function delete_user_by_id($id){
      $sql = "DELETE FROM `users` WHERE `id` = '$id'";
      $res = $this->conn->query($sql);
      return $res;
    }

     public function delete_class($id){
      $sql = "DELETE FROM `classes` WHERE `id` = '$id'";
      $res = $this->conn->query($sql);
      return $res;
    }

    public function delete_salary($id){
      $sql = "DELETE FROM `tchr_salary` WHERE `id` = '$id'";
      $res = $this->conn->query($sql);
      return $res;
    }

    public function delete_fees($id){
      $sql = "DELETE FROM `std_fees` WHERE `id` = '$id'";
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

    public function fetch_class(){
      $query  = "SELECT * FROM `classes`";
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

    public function fetch_pagination_data(){
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

    public function fetch_students_fees(){
      $query  = "SELECT  `std_fees`.`id`,
                         `std_fees`.`std_id`,
                         `std_fees`.`fees_id`,
                         `std_fees`.`created_at`,
                         `students`.`fname`
                          FROM `std_fees`
                          INNER JOIN `students`
                          ON  `students`.`id` = `std_fees`.`std_id`";
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

    public function number_to_word( $num = '' ){

    $num    = ( string ) ( ( int ) $num );
   
    if( ( int ) ( $num ) && ctype_digit( $num ) )
    {
        $words  = array( );
       
        $num    = str_replace( array( ',' , ' ' ) , '' , trim( $num ) );
       
        $list1  = array('','one','two','three','four','five','six','seven',
            'eight','nine','ten','eleven','twelve','thirteen','fourteen',
            'fifteen','sixteen','seventeen','eighteen','nineteen');
       
        $list2  = array('','ten','twenty','thirty','forty','fifty','sixty',
            'seventy','eighty','ninety','hundred');
       
        $list3  = array('','thousand','million','billion','trillion',
            'quadrillion','quintillion','sextillion','septillion',
            'octillion','nonillion','decillion','undecillion',
            'duodecillion','tredecillion','quattuordecillion',
            'quindecillion','sexdecillion','septendecillion',
            'octodecillion','novemdecillion','vigintillion');
       
        $num_length = strlen( $num );
        $levels = ( int ) ( ( $num_length + 2 ) / 3 );
        $max_length = $levels * 3;
        $num    = substr( '00'.$num , -$max_length );
        $num_levels = str_split( $num , 3 );
       
        foreach( $num_levels as $num_part )
        {
            $levels--;
            $hundreds   = ( int ) ( $num_part / 100 );
            $hundreds   = ( $hundreds ? ' ' . $list1[$hundreds] . ' Hundred' . ( $hundreds == 1 ? '' : 's' ) . ' ' : '' );
            $tens       = ( int ) ( $num_part % 100 );
            $singles    = '';
           
            if( $tens < 20 ) { $tens = ( $tens ? ' ' . $list1[$tens] . ' ' : '' ); } else { $tens = ( int ) ( $tens / 10 ); $tens = ' ' . $list2[$tens] . ' '; $singles = ( int ) ( $num_part % 10 ); $singles = ' ' . $list1[$singles] . ' '; } $words[] = $hundreds . $tens . $singles . ( ( $levels && ( int ) ( $num_part ) ) ? ' ' . $list3[$levels] . ' ' : '' ); } $commas = count( $words ); if( $commas > 1 )
        {
            $commas = $commas - 1;
        }
       
        $words  = implode( ', ' , $words );
       
        $words  = trim( str_replace( ' ,' , ',' , ucwords( $words ) )  , ', ' );
        if( $commas )
        {
            $words  = str_replace( ',' , ' and' , $words );
        }
       
        return $words;
    }
    else if( ! ( ( int ) $num ) )
    {
        return 'Zero';
    }
    return '';
}

     public function fetch_teachers_salary(){
      $query  = "SELECT  `tchr_salary`.`id`,
                         `tchr_salary`.`tchr_id`,
                         `tchr_salary`.`salary_id`,
                         `tchr_salary`.`created_at`,
                         `teachers`.`fname`,
                         `teachers`.`lname`
                          FROM `tchr_salary`
                          INNER JOIN `teachers`
                          ON  `teachers`.`id` = `tchr_salary`.`tchr_id`";
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

    public function fetch_student_fees(){
      $query = "SELECT
      `std_fees`.`id`,
      `std_fees`.`fees`,
      `std_fees`.`created_at`,
      `students`.`fname`,
      `students`.`lname`

      FROM `std_fees`
      INNER JOIN  `students`
      ON `students`.`id` = `std_fees`.`std_id` ";
      $res   = $this->conn->query($query);
      $i = 0;
      $data = array();
      while ($rows = $res->fetch_assoc()) {
        foreach ($rows as $key => $value) {
          $data[$i][$key] = $value;
        }
      $i++;
      }
    return $data;
  }

    public function join_salary_data(){
      $query  = "SELECT  `tchr_salary`.`id`,
                         `tchr_salary`.`tchr_id`,
                         `tchr_salary`.`salary_id`,
                         `tchr_salary`.`created_at`,
                         `teachers`.`fname`
                          FROM `tchr_salary`
                          INNER JOIN `teachers`
                          ON  `teachers`.`id` = `tchr_salary`.`tchr_id`";
      $res = $this->conn->query($query);
      if ($res->num_rows>0) {
        $record = $res->fetch_assoc();
        return $record;
      }

    }

    public function fetch_fees(){
      $query  = "SELECT * FROM `std_fees`";
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

    public function get_std_fees($id){
      $query  = "SELECT * FROM `std_fees` WHERE `id` = '$id'";
      $res    = $this->conn->query($query);
      
      $record = $res->fetch_assoc();
      return $record;
    }

    public function fetch_salary($id){
      $query  = "SELECT * FROM `tchr_salary` WHERE `id` = '$id'";
      $res    = $this->conn->query($query);

     if ($res->num_rows>0) {
        $row = $res->fetch_assoc();
        return $row;
      }

    }

    public function show_selected_data($id){
      $query  = "SELECT * FROM `students` WHERE `id` = '$id'";
      $res    = $this->conn->query($query);
      
      if ($res->num_rows>0) {
        $row = $res->fetch_assoc();
        return $row;
      }

      

    }

    public function show_selected_tchr_data($id){
      $query  = "SELECT * FROM `teachers` WHERE `id` = '$id'";
      $res    = $this->conn->query($query);
      
      if ($res->num_rows>0) {
        $row = $res->fetch_assoc();
        return $row;
      }

    }


    public function fetch_new_salary($id){
      $query  = "SELECT * FROM `teachers` WHERE `id` = '$id'";
      $res    = $this->conn->query($query);
      
      if ($res->num_rows>0) {
        $row = $res->fetch_assoc();
        return $row;
      }

    }

    public function add_new_fees($data){
      extract($data);
      $sql = "INSERT INTO `std_fees` (`std_id`, `fees_id`) VALUES ('$std_id', '$fees')";
      $res = $this->conn->query($sql);
      return $res;
    }

    function is_exist($table, $col, $data){
      $query     = "SELECT * FROM `$table` where `$col` = '$data' ";
    
      $res    = $this->conn->query($query);
      // $this->debug($res->num_rows);

      if (($res->num_rows) >0) {
        return true; // data exist kart ha
      }else{
        return false; // data exist kart ha
      }
    }


    // public function add_user($data){

    //   $data = $this->unserializeForm($data['data']) ;

    //   extract($data);
           
    //   $fname     = ltrim($fname);
    //   $fname     = rtrim($fname);
    //   $lname     = ltrim($lname);
    //   $lname     = rtrim($lname);
    //   $username  = ltrim($username);
    //   $username  = rtrim($username);
    //   $password  = ltrim($password);
    //   $password  = rtrim($password);

    //   $password  = md5($password);

    //   $rec =  $this->is_exist('users','username',$username);

    //   $result = array();

    //   if($rec){
    //       $result['type'] = 'error';
    //       $result['msg']  = 'Username already exist';
    //       return $result;
    //   }else{
    //       $query    =  "INSERT INTO `users` (`fname`,`lname`,`username`,`password`) VALUES ('$fname','$lname','$username','$password')";
    //       $res      = $this->conn->query($query);
    //       $result   = array();
    //       if($res == 1 ){
    //         $result['type'] = 'success';
    //         $result['msg']  = 'Your data has been submitted!!!';
    //         return $result;
    //       }else{
    //         $result['type'] = 'error';
    //         $result['msg']  = 'Your data has not been submitted!!!';
    //         return $result;
    //       }
    //   }

    // }




    public function unserializeForm($str) {
      $returndata   = array();
      $strArray     = explode("&", $str);
      $i        = 0;

      foreach ($strArray as $item) {
        $array    = explode("=", $item);
        $returndata[$array[0]] = $array[1];
      }
      return $returndata;
    }

    public function add_user($data){

    $data = $this->unserializeForm($data['data']) ;

      extract($data);
           
      $fname     = ltrim($fname);
      $fname     = rtrim($fname);
      $lname     = ltrim($lname);
      $lname     = rtrim($lname);
      $username  = ltrim($username);
      $username  = rtrim($username);
      $password  = ltrim($password);
      $password  = rtrim($password);

      $msg       = array();

      $result    = $this->is_exist('users','username',$username);

      $password  = md5($password);

      if ($result) {
        $msg['type'] = "error";
        $msg['msg'] = "Sorry data already exists";
        echo json_encode(array("status"=>"failed",'msg'=>"not submitted successfully"));
        return false;
      }else{
        $query = "INSERT INTO `users`(`fname`,`lname`,`username`,`password`) VALUES ('$fname','$lname','$username','$password')";
        $res   = $this->conn->query($query);
        $msg['type'] = "error";
        $msg['msg'] = "Sorry data already exists";
        echo json_encode(array("status"=>"success",'msg'=>"submitted successfully"));
        return true;
      }

    //   if($res){
        // echo json_encode(array("status"=>"success",'msg'=>"submitted successfully"));
        // return true;
    //   }else{
        // echo json_encode(array("status"=>"failed",'msg'=>"not submitted successfully"));
        // return false;
    //   }
    //   // return $res;
    // }
    }

    public function update_user($data){

    $data = $this->unserializeForm($data['data']) ;

      extract($data);
           
      $fname     = ltrim($fname);
      $fname     = rtrim($fname);
      $lname     = ltrim($lname);
      $lname     = rtrim($lname);
      $username  = ltrim($username);
      $username  = rtrim($username);
      $password  = ltrim($password);
      $password  = rtrim($password);

      $password  = md5($password);

      $query = "UPDATE `users` SET `fname` = '$fname',`lname` = '$lname',`username` = '$username',`password` = '$password' WHERE `id` = $id";
      $res   = $this->conn->query($query);

      if($res){
        echo json_encode(array("status"=>"success",'msg'=>"submitted successfully"));
        return true;
      }else{
        echo json_encode(array("status"=>"failed",'msg'=>"not submitted successfully"));
        return false;
      }
      // return $res;
    }

       // add qualification 
    public function add_qualification($data){

      $data = $this->unserializeForm($data['data']);

      extract($data);

      $name     = ltrim($name);
      $name     = rtrim($name);

      $query = "INSERT INTO `qualification`(`name`) VALUES ('$name')";
      $res   = $this->conn->query($query);
      
      if($res){
        echo json_encode(array("status"=>"success",'msg'=>"Updated successfully"));
        return true;
      }else{
        echo json_encode(array("status"=>"failed",'msg'=>"not Updated successfully"));
        return false;
      }
    }

    public function add_new_salary($data){
      extract($data);
      $sql = "INSERT INTO `tchr_salary` (`tchr_id`, `salary_id`) VALUES ('$tchr_id', '$salary_id')";
      $res = $this->conn->query($sql);
      return $res;
    }

    public function update_new_salary($data){
      extract($data);
      $sql = "UPDATE `tchr_salary` SET `tchr_id` = '$tchr_id', `salary_id` = '$salary_id' WHERE `id` = '$id'";
      $res = $this->conn->query($sql);
      return $res;
    }

    public function update_new_fees($data){
      extract($data);
      // $this->debug($data);
      $sql = "UPDATE `std_fees` SET `std_id` = '$std_id', `fees_id` = '$fees_id' WHERE `id` = '$id'";
      $res = $this->conn->query($sql);
      return $res;
    }

    public function add_teacher($data){
      extract($data);

      $fname = ltrim($fname);
      $fname = rtrim($fname);
      $lname = ltrim($lname);
      $lname = rtrim($lname);
      $phone_no = ltrim($phone_no);
      $phone_no = rtrim($phone_no);
      $address = rtrim($address);
      $address = rtrim($address);

      $sql = "INSERT INTO `teachers` (`fname`, `lname`, `age` , `qualification`, `gender`, `phone_no`, `address`, `marital_id`, `subject_id`, `class_id` , `salary`) VALUES ('$fname', '$lname', '$age', '$qualification', '$gender_id', '$phone_no', '$address', '$marital_status', '$subject_id', '$class_id' , '$salary')";
      $res = $this->conn->query($sql);
      return $res;
    }

     public function add_student($data){
      extract($data);

      $fname = ltrim($fname);
      $fname = rtrim($fname);
      $lname = ltrim($lname);
      $lname = rtrim($lname);
      $phone_no = ltrim($phone_no);
      $phone_no = rtrim($phone_no);
      $address = ltrim($address);
      $address = rtrim($address);

      $sql = "INSERT INTO `students` (`fname`, `lname`, `fees` , `date_of_birth`, `date_of_admission`, `qualification`, `age`, `gender` , `phone_no`, `merital_id`, `address`) VALUES ('$fname', '$lname', '$fees', '$date_of_birth', '$date_of_admission', '$qualification', '$age', '$gender_id', '$phone_no' , '$merital_status',  '$address')";
      $res = $this->conn->query($sql);
      return $res;
      }

    public function add_fees($data){
      extract($data);
      $sql = "INSERT INTO `std_fees` (`std_id`, `fees`) VALUES ('$students_name', '$fees_add')";
      $res = $this->conn->query($sql);
      return $res;
    }

    public function fetch_std_fees_by_id($data){
      extract($data);
      $query = "SELECT `fees` FROM `students` WHERE `id` = '$id'";
      $res = $this->conn->query($query);

      if ($res->num_rows>0) {
        $record = $res->fetch_assoc();

        echo json_encode(array("fees" => $record['fees']));
        return true;
      }
    }

    public function add_class($data){
      extract($data);

      $cls_name     = ltrim($cls_name);
      $cls_name     = rtrim($cls_name);

      // $this->debug($data);
      $query = "SELECT * FROM `classes` where `cls_name` = '$cls_name' ";
      $res   = $this->conn->query($query);
      if(($res->num_rows) > 0){
        header("location:add_class.php");
        return false;
      }else{
        $query = "INSERT INTO `classes`(`cls_name`) VALUES ('$cls_name')";
        $res   = $this->conn->query($query);
        header("location:classes.php");
        return $res;
      }
      
    }

    public function view_qualification($id){
      extract($id);
      $query  = "SELECT * FROM `qualification` WHERE `id` = $data";

      $res  = $this->conn->query($query);
      // $this->debug($res);
      if ($res->num_rows>0) { 
        $record = $res->fetch_assoc();
        echo json_encode(array("status"=>"success",'data'=>$record['name']));
        return true;
      }
    }

    public function update_qualification($data){
  
      $data = $this->unserializeform($data['data']);
      extract($data);


// $this->debug($data);
      $quali_name    = ltrim($quali_name);
      $quali_name    = rtrim($quali_name);

      
      $query = "UPDATE `qualification` SET `name`='$quali_name'WHERE `id` = '$quali_id'";
      $res   = $this->conn->query($query);
      
      if($res){
        echo json_encode(array("status"=>"success",'msg'=>"Updated successfully"));
        return true;
      }else{
        echo json_encode(array("status"=>"failed",'msg'=>"not Updated successfully"));
        return false;
      }
    }


     public function fetch_salary_by_id($id){
      $query = "SELECT * FROM `tchr_salary` WHERE `id` = '$id'";
      $res = $this->conn->query($query);

      if ($res->num_rows>0) {
        $record = $res->fetch_assoc();
        return $record;
      }
    }

    public function fetch_tchr_salary_by_id($data){
      extract($data);
      $query = "SELECT `salary` FROM `teachers` WHERE `id` = '$id'";
      $res = $this->conn->query($query);

      if ($res->num_rows>0) {
        $record = $res->fetch_assoc();

        echo json_encode(array("salary" => $record['salary']));
        return true;
      }
    }

    public function count_students(){
      $sql = "SELECT count(*) AS 'tot_students' FROM `students`";
      $res = $this->conn->query($sql);
      return $res->fetch_assoc();
    }


    public function count_teachers(){
      $sql = "SELECT count(*) AS 'tot_teachers' FROM `teachers`";
      $res = $this->conn->query($sql);
      return $res->fetch_assoc();
    }


    public function sum_teachers_salary(){
      $sql = "SELECT sum(`salary`) AS 'tchr_salary' FROM `teachers`";
      $res = $this->conn->query($sql);
      return $res->fetch_assoc();
    }

    public function sum_students_fees(){
      $sql = "SELECT sum(`fees`) AS 'std_fees' FROM `students`";
      $res = $this->conn->query($sql);
      return $res->fetch_assoc();
    }

    public function get_classes(){
      $query = "SELECT * FROM `classes`";
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

    public function get_class_by_id($id){
      $query = "SELECT * FROM `classes` WHERE `id` = '$id'";
      $res    = $this->conn->query($query);

      if ($res->num_rows>0) {
          $record = $res->fetch_assoc();
          return $record;
      }
      
    }

    public function get_qualification(){
      $query = "SELECT * FROM `qualification`";
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

    public function get_qualification_by_id($id){
      $query = "SELECT * FROM `qualification` WHERE `id` = '$id'";
      $res    = $this->conn->query($query);
       if ($res->num_rows>0) {
          $record = $res->fetch_assoc();
          return $record;
      }

    }

     public function get_subject(){
      $query = "SELECT * FROM `subjects`";
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

    public function get_merital_status(){
      $query = "SELECT * FROM `merital_status`";
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

    public function get_gender(){
      $query = "SELECT * FROM `gender`";
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

    public function pagination(){
      $page   = $_GET['page'];
      $offset = ($page - 1) * $page;
      $limit = 3;
      $sql = "SELECT * FROM teachers ORDER BY id DESC LIMIT {$offset},{$limit}";
      $res = $this->conn->query($sql);
      if ($res->num_rows >0) {
          $total_records = $res->num_rows;
          $total_pages = ceil($total_records / $limit);
          return $total_pages;
      }
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