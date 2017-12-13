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

      function checkDegree($name,$year){

        $query = "SELECT * FROM degree WHERE name = ".$name." and ".$year."";
        $result = self::$db->select($query);

        return $result;
      }

      function regDegree($name,$duration,$desc,$year){

        $query = "INSERT INTO degree(name,duration,description,start_year) VALUES($name,$duration,$desc,$year)";

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