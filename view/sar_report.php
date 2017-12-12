<?php
	 @session_start();
        if(!isset($_SESSION['user'])){
            header("Location:../index.php");
        }
	   

?>
<?php  
//export.php  
$connect = mysqli_connect("localhost", "root", "", "sms");
$output = '';
if(isset($_POST["export"]))
{
 $query = "SELECT * FROM user";
 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                         <th>Name</th>  
                         <th>Address</th>  
                         <th>City</th>  
       <th>Postal Code</th>
       <th>Country</th>
                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
                         <td>'.$row["username"].'</td>  
                         <td>'.$row["first_name"].'</td>  
                         <td>'.$row["last_name"].'</td>  
       <td>'.$row["type"].'</td>  
       <td>'.$row["nic"].'</td>
                    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=download.xls');
  echo $output;
 }
}
?>
<?php
$connect = mysqli_connect("localhost", "root", "", "sms");
$sql = "SELECT * FROM user";  
$result = mysqli_query($connect, $sql);
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
</head>

<body class="home">
    <div class="display-table">
        <div class="row display-table-row">
            <div class="col-md-2 col-sm-1 hidden-xs display-table-cell v-align box" id="navigation">
                <div class="logo">
                    <a href="home.html"><img src="../view/images/002.jpg" alt="merkery_logo" class="hidden-xs hidden-sm">
                        <img src="../view/images/002.jpg" alt="merkery_logo" class="visible-xs visible-sm circle-logo">
                    </a>
                </div>
                <div class="navi">
                    <ul>
                        <li class="active"><a href="../controller/sar_controller.php"><i class="fa fa-home" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Home</span></a></li>
                        <li><a href="../controller/sar_controller.php?op=profile"><i class="fa fa-tasks" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Profile</span></a></li>
                        <li><a href="../controller/sar_controller.php?op=registration"><i class="fa fa-bar-chart" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Registration</span></a></li>
                        <li><a href="../controller/sar_controller.php?op=search_student"><i class="fa fa-user" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Students</span></a></li>
                        <li><a href="../controller/sar_controller.php?op=add_degree"><i class="fa fa-calendar" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Calender</span></a></li>
                        <li><a href="../controller/sar_controller.php?op=reports"><i class="fa fa-cog" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Reports</span></a></li>
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

                <h1>Reports</h1>
                    <div class="row">
                        <div class="col-md-5 col-sm-5 col-xs-12 gutter">

                            <div class="sales">
                                <h2>All students</h2>

                                <div class="btn-group">
                                   <a href="sar_report_1.php" class="btn btn-info" role="button">All students</a>

                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 col-sm-5 col-xs-12 gutter">

                            <div class="sales report">
                                <h2>First Year Students</h2>
                                <div class="btn-group">
                                     <a href="sar_report_2.php" class="btn btn-info" role="button">All students</a>
                                    
                                </div>
                            </div>
                        </div>
                        <br><br>
                        <div class="col-md-5 col-sm-5 col-xs-12 gutter">

                            <div class="sales report">
                                <h2>Secondd Year Students</h2>
                                <div class="btn-group">
                                     <a href="sar_report_3.php" class="btn btn-info" role="button">All students</a>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 col-sm-5 col-xs-12 gutter">

                            <div class="sales report">
                                <h2>Compute Science Students</h2>
                                <div class="btn-group">
                                     <a href="sar_report_4.php" class="btn btn-info" role="button">All students</a>
                                    
                                </div>
                            </div>
                        </div>
                                    <div class="container">  
                   <br />  
                   <br />  
                   <br />  
                    
                  </div>  
                </div>
            </div>
        </div>

    </div>
    

</body>

</html>