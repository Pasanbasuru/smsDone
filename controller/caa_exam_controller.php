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
			header("Location:sar_controller.php");
			break;

		case 'CAA_exam':

			// lies here
			break;
			
		default:
			header( 'location: ../index.php' ) ;
			break;
	}
	
 }

 	// load the view

	require('../view/caa_exam.php');
	
 	require('../model/caa_exam_model.php');
	require('../model/db_model.php');

	@$op = $_REQUEST['op'];

	if(isset($_GET['edit_id'])){
		$var1 = $_GET['edit_id']; 
		$op="edit_User";
	}

	$caa_exam_controller = new CaaExamController();
	
	switch ($op) {

		case 'results':
		
			$caa_exam_controller->results();
			break;
		case 'import_reg':
			$sar_controller->import_reg();
			break;
		case 'reports':
        	$caa_exam_controller->reports();
        	break;
        case 'profile':
        	$caa_exam_controller->profile();
        	break;
        case 'search_student':
        	$caa_exam_controller->search_user();
        	break;
        case 'add_course':
        	$caa_exam_controller->course();
        	break;	

        case 'reg_course':
        	$caa_exam_controller->regCourse();	
        	break;	
        case 'view_course':
        	$caa_exam_controller->viewCourse();	
        	break;	
        case 'edit_User':
            $caa_exam_controller->edit_user($var1);
            break;	
        case 'Updated':
            $caa_exam_controller->updated();
            break;						
		default:
			
			//header("Location:../view/sar.php");
			break;
	}

	class CaaExamController{
	 		protected static $db;
	 		protected static $caa_exam;
	 		

	 		function __construct(){
	 			self::$db = new DB();
	 			self::$caa_exam= new CaaExamModel(); 			
	 		}

	 		

	 		function results(){
	 			
	 			header("Location:../view/caa_exam_results.php");
	 		}

	 		function import_reg(){
	 			header("Location:../view/view_subjects.php");
	 		}

	 		function reports(){
	 			header("Location:../view/caa_exam_reports.php");
	 		}

	 		function profile(){

 			
 				$result = self::$caa_exam->profile();
 			if($result){
				$_SESSION['value']=$result;
				header("Location:../view/caa_exam_profile.php");
			}else{
				echo "something wrong";
			}
			
 			
 			}
 			function search_user(){
				header("Location:../view/caa_exam_search_students.php");
			}

			function course(){
				header("Location:../view/add_course.php");
			}

			function regCourse(){
 		

			$name = self::$db->quote($_POST['name']);
			$code = self::$db->quote($_POST['code']);
			$c_year = self::$db->quote($_POST['c_year']);
			$des = self::$db->quote($_POST['des']);
			$year = self::$db->quote($_POST['year']);
			$credit = self::$db->quote($_POST['credit']);
			$type = self::$db->quote($_POST['type']);
			$sem = self::$db->quote($_POST['sem']);

			$checkCourse = self::$caa_exam->checkCourse($code,$year);
			if (!$checkCourse) {
				$result = self::$caa_exam->regCourse($name,$code,$c_year,$des,$year,$credit,$type);

				if($result == 1){
				
					$result='<div class="alert alert-success">Successfully added..!!</div>';
	            	header("Location:../view/caa_exam_reg_degree.php?result=$result");
				
				}else{
					$result='<div class="alert alert-danger">Incorrect details..!!</div>';
	            	header("Location:../view/caa_exam_reg_degree.php?result=$result");
				}
			}else{
				$result='<div class="alert alert-danger">This degree is already defined!!</div>';
	           header("Location:../view/caa_exam_reg_degree.php?result=$result");
			}
			
			

			
		}

		function viewDegree(){
			header("Location:../view/view_degree.php");

		}

		function edit_user($var1){

            $result = self::$sar->search_course($var1);

            if($result){
                $_SESSION['degree']=$result;
                header("Location:../view/edit_course.php");
            }else{
                echo "something wrong";
            }


        }

        function updated(){
            if(isset($_SESSION['degree'])){

                foreach ($_SESSION['degree'] as $d) {
                    $id=$d['degree_id'];


                }
            }

            $name = self::$db->quote($_POST['name']);
            $dur = self::$db->quote($_POST['dur']);
            $des = self::$db->quote($_POST['des']);
            $year = self::$db->quote($_POST['year']);
            



            $result = self::$sar->update_user($id,$name,$dur,$des,$year);

            if($result == 1){
                
                $result='<div class="alert alert-success">This Degree updated Successfully to the System</div>';
                header("Location:../view/view_degree.php?result=$result");


            }else{
                $result='<div class="alert alert-danger">Sorry!You cannot Update this Degree </div>';
                header("Location:../view/view_degree.php?result=$result");

            }

        }




	 	}