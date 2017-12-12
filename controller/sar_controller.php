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
			// SAR exam contoller is here
			break;
			
		default:
			header( 'location: ../index.php' ) ;
			break;
	}
	
 }

 	// load the view
	require('../view/sar.php');
	
 	require('../model/sar_model.php');
	require('../model/db_model.php');

	@$op = $_REQUEST['op'];

	$sar_controller = new SarController();
	
	switch ($op) {

		case 'registration':
		
			$sar_controller->registration();
			break;
		case 'import_reg':
			$sar_controller->import_reg();
			break;
		case 'reports':
        	$sar_controller->reports();
        	break;
        case 'profile':
        	$sar_controller->profile();
        	break;
        case 'search_student':
        	$sar_controller->search_user();
        	break;
        case 'add_degree':
        	$sar_controller->degree();
        	break;	

        case 'reg_degree':
        	$sar_controller->regDegree();	
        	break;	
        case 'view_degree':
        	$sar_controller->viewDegree();	
        	break;								
		default:
			
			//header("Location:../view/sar.php");
			break;
	}

	class SarController{
	 		protected static $db;
	 		protected static $sar;
	 		

	 		function __construct(){
	 			self::$db = new DB();
	 			self::$sar= new SarModel(); 			
	 		}

	 		

	 		function registration(){
	 			
	 			header("Location:../view/sar_registration.php");
	 		}

	 		function import_reg(){
	 			header("Location:../view/view_subjects.php");
	 		}

	 		function reports(){
	 			header("Location:../view/sar_report.php");
	 		}

	 		function profile(){

 			
 				$result = self::$sar->profile();
 			if($result){
				$_SESSION['value']=$result;
				header("Location:../view/sar_profile.php");
			}else{
				echo "something wrong";
			}
			
 			
 			}
 			function search_user(){
				header("Location:../view/sar_search_student.php");
			}

			function degree(){
				header("Location:../view/add_degree.php");
			}

			function regDegree(){
 		

			$name = self::$db->quote($_POST['name']);
			$duration = self::$db->quote($_POST['duration']);
			$desc = self::$db->quote($_POST['des']);
			$year = self::$db->quote($_POST['year']);

			$checkDegree = self::$sar->checkDegree($name,$year);
			if (!$checkDegree) {
				$result = self::$sar->regDegree($name,$duration,$desc,$year);

				if($result == 1){
				
					$result='<div class="alert alert-success">Successfully added..!!</div>';
	            	header("Location:../view/sar_reg_degree.php?result=$result");
				
				}else{
					$result='<div class="alert alert-danger">Scholarship already added..!!</div>';
	            	header("Location:../view/sar_reg_degree.php?result=$result");
				}
			}else{
				$result='<div class="alert alert-danger">This degree is already defined!!</div>';
	            header("Location:../view/sar_reg_degree.php?result=$result");
			}
			
			

			
		}

		function viewDegree(){
			header("Location:../view/view_degree.php");

		}


	 	}