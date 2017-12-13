<?php 

 class SarModel
 {
 	
 	protected static $db;

	
	function __construct()
	{
		self::$db = new DB();
		
	}

    function regStudent($fname, $lname, $gender, $mname, $school, $bdate, $race, $religion, $number, $street, $town, $contact1, $contact2, $econtact, $eperson, $father, $mother, $spouse, $course, $email, $nic, $pcode){
       
        $cur_date = self::$db->quote(date("Y/m/d"));
        $query = "INSERT INTO student(first_name, mid_name, last_name, school, birthdate, race, religion, reg_date, gender, nic) VALUES ($fname, $mname,$lname, $school, $bdate, $race, $religion, $cur_date, $gender, $nic)";

        $result = self::$db->query($query);
       
       
        
        if($result){
            $query1 = "SELECT s_id FROM student ORDER BY s_id DESC LIMIT 1 ";
            $result1 = self::$db->select($query1);
            
            $id = $result1[0]['s_id'];
            

            //generat index number
            $this->generateIndex($id,$course);

            $this->addUser($email,$fname, $lname, $nic); // create login
            $this->addContact($id,$contact1,$contact2,$econtact,$eperson); //add conatct details
            $this->addLocation($id,$number,$street,$town,$pcode); // add location details
            $this->addFamily($id,$father,$mother,$spouse); // add family details
            $this->addDegree($id,$course,$cur_date); // add degree programme
            $this->addCourse($id);




        }
        return $result;
    }

    function generateIndex($id,$course){

        $no = '';

        $curYear = date('Y');
        $yr = substr($curYear,2,4);

        $query = "SELECT degree_id FROM degree WHERE name=$course";
        $result = self::$db->select($query);
       
        $c_id = $result[0]['degree_id'];

        $no .= $yr.$c_id;
        $len = strlen($id);
        $rem = 4-$len;
        for($i=0;$i<$rem;$i++){
            $no .= "0";
        }
        $no .= $id;

        $query1 = "UPDATE student SET index_no=$no WHERE s_id=$id";
       
        $result1 = self::$db->query($query1);
        

    }

    

    function hashPassword($password){
        //using bcrypt 
        $option = ['cost' => 12];
        $hash = password_hash($password,PASSWORD_BCRYPT,$option);
        //add quotes
        $h_password = "'" . $hash . "'";
        return $h_password;
    }

    function addUser($email,$fname, $lname, $nic){

        $pass = $this->hashPassword($nic);
        $type = self::$db->quote("student");
        $query = "INSERT INTO user(username,password,first_name,last_name,type,nic) VALUES ($email,$pass,$fname,$lname,$type,$nic)";

        $result = self::$db->query($query);
    }

    function addContact($id,$contact1,$contact2,$econtact,$eperson){

        $query = "INSERT INTO student_contact(s_id,contact1,contact2,emg_contact,emg_person) VALUES($id,$contact1,$contact2,$econtact,$eperson)";

        $result = self::$db->query($query);
    }

    function addLocation($id,$number,$street,$town,$pcode){

        $query = "INSERT INTO student_address(s_id,number_,street,town,p_code) VALUES($id,$number,$street,$town,$pcode)";

        $result = self::$db->query($query);
    }

     function addFamily($id,$father,$mother,$spouse){

        $query = "INSERT INTO student_family(s_id,father_name,mother_name,spouse) VALUES($id,$father,$mother,$spouse)";
       
        $result = self::$db->query($query);
    }

    function addDegree($id,$course,$cur_date){

        $query1 = "SELECT degree_id FROM degree where name=$course";
        $result1 = self::$db->select($query1);
        $d_id = $result1[0]['degree_id'];
        $query = "INSERT INTO student_degree(s_id,degree_id,start_date,end_date,class) VALUES($id,$d_id,$cur_date,null,null)";
         $result = self::$db->query($query);
    }
     function addCourse($id){
        $curYear = date('Y');
        $query = "SELECT course_code FROM course WHERE year=$curYear and semester=1 and course_year=1";

        $result = self::$db->select($query);

        for($i=0;$i<count($result);$i++){

            $c_id = self::$db->quote($result[$i]['course_code']);

            $query = "INSERT INTO student_course(s_id,course_id,year) VALUES($id,$c_id,$curYear)";
            
             $result = self::$db->query($query);

        }
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