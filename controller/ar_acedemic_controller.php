<?php
ob_start();
session_start();
if(isset($_SESSION['type']) && isset($_SESSION['user'])){

	$type = $_SESSION['type'];

	
	
	switch ($type) {
		case 'admin':
			header("Location:admin_controller.php");
			break;

		case 'student':
			header("Location:student_controller.php");
			break;

		case 'lecturer':
			header("Location:lecturer_controller.php");
			break;

		case 'caa_academic':
			header("Location:caa_academic_controller.php");
			break;

		case 'SAR_exam':
			header("Location:SAR_exam_controller.php");
			break;

		case 'ar_acedemic':
			// AR Acedemic contoller is here
			break;
			
		default:
			header( 'location: ../index.php' ) ;
			break;
	}
	
 }

 	// load the view
	require('../view/ar_acedemic.php');

 	require('../model/ar_acedemic_model.php');
	require('../model/db_model.php');

	@$op = $_REQUEST['op'];

	$aracedemic_controller = new ArAcedemicController();

	switch ($op) {
		case 'view_ar_acedemic':
			$aracedemic_controller->view_ar_acedemic();
			break;
        case 'update_ar_acedmic':
            $aracedemic_controller->update_ar_acedmic();
            break;
		case 'view_student':
			$aracedemic_controller->view_student();
			break;
        case 'manage_user':
            $aracedemic_controller->manage_user();
            break;
        case 'report':
            $aracedemic_controller->report();
            break;
        case 'events':
            $aracedemic_controller->events();
            break;
        case 'addevent':
            $aracedemic_controller->addevent();
            break;
        case 'view_mahapola':
            $aracedemic_controller->view_mahapola();
            break;
        case 'view_bursary':
            $aracedemic_controller->view_bursary();
            break;
        case 'view_other_scholarship':
            $aracedemic_controller->view_other_scholarship();
            break;
		default:
			//header("Location:../index.php");
			break;
	}


 	class ArAcedemicController{
 		protected static $db;
 		protected static $ar_acedemic;

 		function __construct(){
 			self::$db = new DB();
 			self::$ar_acedemic=new ArAcedemicModel();
 		}

 		function view_ar_acedemic(){

 			$aracedemic_id=$_SESSION['username'];
 			$result = self::$ar_acedemic->view_ar_acedemic($aracedemic_id);
 			if($result){
				$_SESSION['value']=$result;
				header("Location:../view/ar_acedemic_profile.php");
			}else{
				echo "something wrong";
			}

 		}
        function view_student(){
            header("Location:../view/ar_acedemic_stdet.php");
        }

 		function update_ar_acedmic(){

            $username=$_SESSION['username'];
            $gender=self::$db->quote($_POST['gender']);
            $dob=self::$db->quote($_POST['dob']);
            $tel=self::$db->quote($_POST['tel']);
            $email=self::$db->quote($_POST['email']);
            $edu=self::$db->quote($_POST['edu']);
            $research=self::$db->quote($_POST['research']);
            $course=self::$db->quote($_POST['course']);
            $awards=self::$db->quote($_POST['awards']);



            $result = self::$ar_acedemic->update_ar_acedmic($username,$gender,$dob,$tel,$email,$edu,$research,$course,$awards);
            if($result){
                header("Location:../controller/ar_acedemic_controller.php?op=view_ar_acedemic");
            }else{
                header("Location:../view/ar_acedemic_profile.php");
                echo "something wrong";
            }


        }

 		function manage_user(){
            header("Location:../view/ar_acedemic_manusr.php");
        }

        function report(){
            header("Location:../view/ar_acedemic_report.php");
        }

        function events(){
            header("Location:../view/ar_acedemic_event.php");
        }

        function addevent(){

           $eventdate = self::$db->quote($_POST['eventdate']);
           $eventtitle = self::$db->quote($_POST['eventtitle']);
           $eventdes = self::$db->quote($_POST['eventdescripton']);

           //$file = $_FILES['eventfile']['name'];
           $fname = strtolower($_FILES['eventfile']['tmp_name']);




           move_uploaded_file($_FILES['eventfile']['tmp_name'], 'uploads/'.$fname);

           $result = self::$ar_acedemic->addevent($eventdate,$eventtitle,$eventdes,$fname);

            if($result == 1){
                header("Location:../view/ar_acedemic_event.php");
                echo "Event Details Added Successfully....";

            }else{
                header("Location:../view/ar_acedemic_event.php");
                echo "something wrong";
            }
            }
        function view_mahapola(){

            header("Location:../view/ar_view_mahapola.php");

        }

        function view_bursary()
        {

            header("Location:../view/ar_view_bursary.php");

        }
        function view_other_scholarship(){

            header("Location:../view/ar_acedmic_otherschol.php");

        }

 	}
?>