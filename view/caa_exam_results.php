<?php
    if ( $_SERVER['REQUEST_METHOD']=='GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) ) {
            /* 
               Up to you which header to send, some prefer 404 even if 
               the files does exist for security
            */
            header( 'HTTP/1.0 403 Forbidden', TRUE, 403 );

            /* choose the appropriate page to redirect users */
          //  die( header( 'location: /error.php' ) );

        }

        @session_start();
        if(!isset($_SESSION['user'])){
            header("Location:../index.php");
        }

?>
<?php
require('../model/caa_exam_model.php');
require('../model/db_model.php');
$db = new DB();
 

$sar = new CaaExamModel();
$output = '';
$rows = 0;
if(isset($_POST["import"]))
{
 $e = explode(".", $_FILES["excel"]["name"]);
 $extension = end($e); // For getting Extension of selected file
 $allowed_extension = array("xls", "xlsx"); //allowed extension
 if(in_array($extension, $allowed_extension)) //check selected file extension is present in allowed extension array
 {
  $file = $_FILES["excel"]["tmp_name"]; // getting temporary source of excel file
  include("../Classes/PHPExcel/IOFactory.php"); // Add PHPExcel Library in this code
  $objPHPExcel = PHPExcel_IOFactory::load($file); // create object of PHPExcel library by using load() method and in load method define path of selected file
        
        
  $output .= "<label class='text-success'>Data Inserted</label><br /><table class='table table-bordered'>";

  $output .= "<tr style='color:green;'>";
        $output .= '<th style = "font-weight: bold;">'."index no".'</th>';
        $output .= '<th style = "font-weight: bold;">'."Exam results".'</th>';
        $output .= '<th style = "font-weight: bold;">'."Assignments".'</th>';
       
  foreach ($objPHPExcel->getWorksheetIterator() as $worksheet)
  {
   $highestRow = $worksheet->getHighestRow();
   for($row=2; $row<=$highestRow; $row++)
   {
   
    $index = $db->quote($worksheet->getCellByColumnAndRow(0, $row)->getValue());
    $exam= $db->quote($worksheet->getCellByColumnAndRow(1, $row)->getValue());
    $ass = $db->quote($worksheet->getCellByColumnAndRow(2, $row)->getValue());
    

    if($index=="''"){
        break;
    }   
        
    
    $row_c= $caa_exam->result($index, $exam, $ass);
    if($row_c==1){
        $rows++;
        $output .= "<tr style='color:blue;'>";
        $output .= '<td>'.$index.'</td>';
        $output .= '<td>'.$exam.'</td>';
        $output .= '<td>'.$ass.'</td>';
       

      
        $output .= '</tr>';
    }else{
        $output .= "<tr style='color:red;'>";
        $output .= '<td>'.$index.'</td>';
        $output .= '<td>'.$exam.'</td>';
        $output .= '<td>'.$ass.'</td>';
        $output .= '</tr>';
    }
   }
  } 
  $output .= '</table>';

 }
 else
 {
  $output = '<label class="text-danger">Invalid File</label>'; //if non excel file then
 }
}
?>


<!DOCTYPE html>
<html>


<head>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../view/css/style2.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="test/main.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</head>

<body class="home">
    <div class="display-table">
        <div class="row display-table-row">
            <div class="col-md-2 col-sm-1 hidden-xs display-table-cell v-align box" id="navigation">
                <div class="logo">
                    <a href="home.html"><img src="../view/images/002.png" alt="merkery_logo" class="hidden-xs hidden-sm">
                        <img src="../view/images/002.png" alt="merkery_logo" class="visible-xs visible-sm circle-logo">
                    </a>
                </div>
                <div class="navi">
                    <ul>
                        <li ><a href="../controller/caa_exam_controller.php"><i class="fa fa-home" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Home</span></a></li>
                        <li><a href="../controller/caa_exam_controller.php?op=profile"><i class="fa fa-tasks" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Profile</span></a></li>
                        <li class="active"><a href="../controller/caa_exam_controller.php?op=results"><i class="fa fa-bar-chart" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Results</span></a></li>
                        <li><a href="../controller/caa_exam_controller.php?op=search_student"><i class="fa fa-user" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Student</span></a></li>
                        <li><a href="../controller/caa_exam_controller.php?op=add_degree"><i class="fa fa-calendar" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Courses</span></a></li>
                        <li><a href="../controller/caa_exam_controller.php?op=reports"><i class="fa fa-cog" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Reports</span></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-10 col-sm-11 display-table-cell v-align">
                <!--<button type="button" class="slide-toggle">Slide Toggle</button> -->
                <div class="row">
                    <header>
                        <div class="col-md-7">

                            <nav class="navbar-default pull-left">
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle collapsed" data-toggle="offcanvas" data-target="#side-menu" aria-expanded="false">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div>
                            </nav>

                            <div class="title hidden-xs hidden-sm">
                                <h3>University of Colombo School of Computing</h3>
                            </div>

                            <!-- <div class="search hidden-xs hidden-sm">
                                <input type="text" placeholder="Search" id="search">
                            </div> -->
                        </div>
                        <div class="col-md-5">
                            <div class="header-rightside">
                                <ul class="list-inline header-top pull-right">
                                    <!-- <li class="hidden-xs"><a href="#" class="add-project" data-toggle="modal" data-target="#add_project">Add Project</a></li> -->
                                    <li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i></a></li>
                                    <li>
                                        <a href="#" class="icon-info">
                                            <i class="fa fa-bell" aria-hidden="true"></i>
                                            <span class="label label-primary">3</span>
                                        </a>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['type'] ?>
                                            <b class="caret"></b></a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <div class="navbar-content">
                                                    <span><?php echo $_SESSION['fname'] ?><?php echo $_SESSION['lname'] ?></span>
                                                    <p class="text-muted small">
                                                        <?php echo $_SESSION['username'] ?>
                                                    </p>
                                                    <div class="divider">
                                                    </div>
                                                    <a href="../index.php?op=logout" class="view btn-sm active">log out</a>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </header>
                </div>
                <div class="user-dashboard">
                  <div class="alert alert-warning alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         <strong><?php if($rows>0){ echo $rows." results added";}else{echo "no results added yet";}?></strong> 
        </div>
                  <div class="container box navd " style="overflow-x:scroll; white-space: nowrap;  ">
                
                  
                   <h3 align="center">Enter results</h3><br />
                   <form method="post" enctype="multipart/form-data">
                    <label>Select Excel File</label>
                    <input type="file" name="excel" />
                    <br />
                    <input type="submit" name="import" class="btn btn-info" value="Import" />
                   </form>
                   <br />
                   <br />
                   <?php
                   echo $output;
                   ?>
                  </div> 

                </div>
            </div>
        </div>

    </div>
    

</body>

</html>