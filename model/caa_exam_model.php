<?php 

 class CaaExamModel
 {
 	
 	protected static $db;

	
	function __construct()
	{
		self::$db = new DB();
		
	}

    function results($index, $exam, $ass){
       
        
        
    }

    
    

    

    

    
     function profile(){
        $id = $_SESSION['id'];
        $query = "SELECT * FROM user WHERE id = ".$id." ";

        $result = self::$db->select($query);

        return $result;
      }

      function checkCourse($code,$year){

        $query = "SELECT * FROM Course WHERE course_code = ".$code." and ".$year."";
        $result = self::$db->select($query);

        return $result;
      }

      function regCourse($name,$code,$c_year,$des,$year,$credit,$type,$sem){

        $query = "INSERT INTO course(course_name,course_code,course_year,credits,description,semester,c_type,year) VALUES($name,$code,$c_year,$credit,$des,$sem,$type,$year)";

        die($query);

         $result = self::$db->query($query);

         return $result;
         

      }
      function search_degree($id){
        $query = "SELECT * FROM `degree` WHERE degree_id = ".$id." ";

        $result = self::$db->select($query);

        return $result;
    }

    function update_user($id,$name,$dur,$des,$year){



        $query="UPDATE degree SET name={$name},duration={$dur},description={$des},start_year={$year} WHERE degree_id={$id}";

        $result = self::$db->query($query);

        return $result;


    }






    
 }

?>