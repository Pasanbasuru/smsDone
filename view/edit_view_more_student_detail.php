<?php

session_start();
if(isset($_GET['result'])){
    $result=$_GET['result'];
}
else{
    $result=null;
}
?>

<?php
$s_id='';
$fname='';
$lname='';
$midname='';
$school='';
$bday='';
$race='';
$religion='';
$reg='';
$out='';
$gender='';
$nic='';
$index='';
//check the student main details session is valid
if(isset($_SESSION['details'])){
    foreach ($_SESSION['details'] as $user) {
        $s_id=$user['s_id'];
        $fname=$user['first_name'];
        $midname=$user['mid_name'];
        $lname=$user['last_name'];
        $school=$user['school'];
        $bday=$user['birthdate'];
        $race=$user['race'];
        $religion=$user['religion'];
        $reg=$user['reg_date'];
        $out=$user['out_date'];
        $gender=$user['gender'];
        $nic=$user['nic'];
        $index=$user['index_no'];
    }
}
//check the student address details session is valid
$no="";
$street="";
$town="";
if(isset($_SESSION['adddetails'])){
    foreach ($_SESSION['adddetails'] as $user) {
        $no=$user['number_'];
        $street=$user['street'];
        $town=$user['town'];


    }
}
//check the student contact details session is valid
$contact1="";
$contact2="";
$emg_contact="";
$emg_person="";

if(isset($_SESSION['condetails'])){
    foreach ($_SESSION['condetails'] as $user) {
        $contact1=$user['contact1'];
        $contact2=$user['contact2'];
        $emg_contact=$user['emg_contact'];
        $emg_person=$user['emg_person'];

    }
}
//check the student course details session is valid
$course_id="";
$exam_grade="";
$assignment_grade="";
$cstart_date="";
$cend_date="";
$attendance="";
$attempt="";
$year="";

if(isset($_SESSION['coursedetails'])){
    foreach ($_SESSION['coursedetails'] as $user) {
        $course_id=$user['course_id'];
        $exam_grade=$user['exam_grade'];
        $assignment_grade=$user['assignment_grade'];
        $cstart_date=$user['start_date'];
        $cend_date=$user['end_date'];
        $attendance=$user['attendance'];
        $attempt=$user['attempt'];
        $year=$user['year'];
        if(!$exam_grade or !$assignment_grade or !$cstart_date or !$cend_date or !$attendance or !$attempt or !$year){
            $exam_grade="-";
            $assignment_grade="-";
            $cstart_date="-";
            $cend_date="-";
            $attendance="-";
            $attempt="-";
            $year="-";
        }

    }
}
//check the degree  details session is valid
$dstart_date="";
$degree_id="";
$dend_date="";
$class="";

if(isset($_SESSION['degdetails'])){
    foreach ($_SESSION['degdetails'] as $user) {
        $degree_id=$user['degree_id'];
        $dstart_date=$user['start_date'];
        $dend_date=$user['end_date'];
        $class=$user['class'];
        if(!$dstart_date or !$dend_date or !$class){
            $dstart_date="-";
            $dend_date="-";
            $class="-";
        }

    }
}
//check the family  details session is valid
$father_name="";
$mother_name="";
$spouse="";
if(isset($_SESSION['famdetails'])){
    foreach ($_SESSION['famdetails'] as $user) {
        $father_name=$user['father_name'];
        $mother_name=$user['mother_name'];
        $spouse=$user['spouse'];
        if(!$father_name or !$mother_name or !$spouse){
            $father_name="-";
            $mother_name="-";
            $spouse="-";
        }

    }
}
//check the hostal  details session is valid
$hostel_id="";
$hstart_date="";
$hend_date="";
if(isset($_SESSION['hosdetails'])){
    foreach ($_SESSION['hosdetails'] as $user) {
        $hostel_id=$user['hostel_id'];
        $hstart_date=$user['start_date'];
        $hend_date=$user['end_date'];
        if(!$hend_date or !$hstart_date ){
            $hend_date="-";
            $hstart_date="-";
        }

    }
}
//check the scholar  details session is valid

?>

<!DOCTYPE html>
<html>


<head>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../view/css/style2.css">
    <link rel="stylesheet" type="text/css" href="../view/css/style1.css">

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
                <a href="home.html"><img src="../view/images/profile_pic/<?php echo $nic;?>" alt="merkery_logo" class="hidden-xs hidden-sm">

                </a>
            </div>
            <div class="navi">
                <ul>
                    <li><a href="../controller/admin_controller.php"><i class="fa fa-home" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Profile</span></a></li>
                    <li class="active"><a href="../controller/admin_controller.php?op=Home"><i class="fa fa-tasks" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Home</span></a></li>
                    <li><a href="../controller/admin_controller.php?op=Modify Students"><i class="fa fa-bar-chart" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Modify Students</span></a></li>
                    <li><a href="../controller/admin_controller.php?op=Search Students"><i class="fa fa-user" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Search Students</span></a></li>
                    <li><a href="../controller/admin_controller.php?op=Add Student Details"><i class="fa fa-cog" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Add Student Details</span></a></li>
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
                                                <span><?php echo $_SESSION['fname'] ?> <?php echo $_SESSION['lname'] ?></span>
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
            <!-- Student Profile here -->
            <div class="row panel panel-success" style="margin-top:2%;">
                <div class="panel-heading lead">
                    <div class="row">
                        <div class="col-lg-8 col-md-8"><i class="fa fa-users"></i> Your Details</div>
                        <div class="col-lg-4 col-md-4 text-right">
                            <div class="btn-group text-center">
                                <a href="student-view.php?sid=1&amp;id=68" class="btn btn-success btn-sm btn-default"><i class="fa fa-eye fa-1x"></i></a>
                                <a href="student-modify.php?sid=1&amp;id=68" class="btn btn-success btn-sm btn-default"><i class="fa fa-edit fa-1x"></i></a>
                                <a href="student-print.php?sid=1&amp;id=68" class="btn btn-success btn-sm btn-default"><i class="fa fa-print fa-1x"></i></a>
                                <a href="student-delete.php?sid=1&amp;id=68" class="btn btn-success btn-sm btn-default"><i class="fa fa-trash-o fa-1x"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="col-sm-10 col-sm-offset-2">
                            <?php echo $result; ?>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-lg-12 col-md-12">

                            <div class="row">
                                <div class="col-lg-3 col-md-3">
                                    <center>
                                        <span class="text-left">
                                        <img src="../view/images/profile_pic/<?php echo $nic;?>" class="img-responsive img-thumbnail">


                                            <!-- Modal -->

                                            <!-- /.modal -->
                                    </span></center>




                                </div>
                                <div class="col-lg-9 col-md-9">
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a data-toggle="tab" href="#Summery" class="text-success"><i class="fa fa-indent"></i> Summery</a></li>
                                        <li><a data-toggle="tab" href="#Contact" class="text-success"><i class="fa fa-bookmark-o"></i> Contact Info</a></li>
                                        <li><a data-toggle="tab" href="#Address" class="text-success"><i class="fa fa-home"></i> Address</a></li>
                                        <li><a data-toggle="tab" href="#Degree" class="text-success"><i class="fa fa-info"></i> Degree and Course Info</a></li>
                                        <li><a data-toggle="tab" href="#Family" class="text-success"><i class="fa fa-university"></i> Family Info</a></li>
                                        <li><a data-toggle="tab" href="#Hostal" class="text-success"><i class="fa fa-home"></i> Hostal Info</a></li>
                                        <li><a data-toggle="tab" href="#Scholar" class="text-success"><i class="fa fa-thumbs-up"></i> Scholar Info</a></li>
                                    </ul>



                                    <form action="../controller/admin_controller.php" method="post" class="tab-content">

                                        <div id="Summery" class="tab-pane fade in active">

                                            <div class="table-responsive panel">
                                                <table class="table">
                                                    <tbody>

                                                    <tr>
                                                        <td class="text-success"><i class="fa fa-user"></i> Student ID :</td>
                                                        <td> <input type="text" value="<?php echo $index; ?>" class="form-control" id="email" name="s_id" placeholder="" required disabled/></td>

                                                    </tr>

                                                    <tr>
                                                        <td class="text-success"><i class="fa fa-user"></i> First Name</td>
                                                        <td> <input type="text" value="<?php echo $fname; ?>" class="form-control" id="email" name="firstname" placeholder="Enter email" required /></td>

                                                    </tr>
                                                    <tr>
                                                        <td class="text-success"><i class="fa fa-user"></i> Mid Name</td>
                                                        <td> <input type="text" value="<?php echo $midname; ?>" class="form-control" id="email" name="firstname" placeholder="Enter email" required /></td>

                                                    </tr>
                                                    <tr>
                                                        <td class="text-success"><i class="fa fa-user"></i> Last Name</td>
                                                        <td> <input type="text" value="<?php echo $lname; ?>" class="form-control" id="email" name="lastname" placeholder="Enter email" required /></td>

                                                    </tr>

                                                    <tr>
                                                        <td class="text-success"><i class="fa fa-calendar"></i> Birthday</td>
                                                        <td> <input type="date" value="<?php echo $bday; ?>" class="form-control" id="email" name="email" placeholder="Enter email" required /></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="text-success"><i class="fa fa-university"></i> School</td>

                                                        <td> <input type="text" value="<?php echo $school; ?>" class="form-control" id="email" name="email" placeholder="Enter email" required /></td>                                                               </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <div id="Family" class="tab-pane fade">
                                            <div class="table-responsive panel">
                                                <table class="table">
                                                    <tbody>

                                                    <tr>
                                                        <td class="text-success"><i class="fa fa-user"></i> Father Name</td>
                                                        <td><?php echo $father_name;?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-success"><i class="fa fa-user"></i> Mother Name</td>
                                                        <td><?php echo $mother_name;?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-success"><i class="fa fa-user"></i> Spouse</td>
                                                        <td><?php echo $spouse;?></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div id="Contact" class="tab-pane fade">
                                            <div class="table-responsive panel">
                                                <table class="table">
                                                    <tbody>

                                                    <tr>
                                                        <td class="text-success"><i class="glyphicon glyphicon-phone"></i> Mobile Number </td>
                                                        <td><?php echo $contact1;?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-success"><i class="glyphicon glyphicon-phone"></i> Land Line Number</td>
                                                        <td><?php echo $contact2;?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-success"><i class="fa fa-flag"></i> Emergency Contact</td>
                                                        <td><?php echo $emg_contact;?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-success"><i class="fa fa-user"></i> Emergency Person</td>
                                                        <td><?php echo $emg_person;?></td>
                                                    </tr>


                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div id="Degree" class="tab-pane fade">
                                            <div class="table-responsive panel">
                                                <table class="table">
                                                    <tbody>
                                                    <tr>
                                                        <td class="text-success"><i class="fa fa-university"></i> Degree ID</td>
                                                        <td><?php echo $degree_id?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-success"><i class="fa fa-calendar"></i> Start Date</td>
                                                        <td><?php echo $dstart_date;?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-success"><i class="fa fa-home"></i> End Date</td>
                                                        <td><?php echo $dend_date;?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-success"><i class="fa fa-home"></i> Class</td>
                                                        <td><?php echo $class;?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-success"><i class="fa fa-calendar"></i> Academic Year</td>
                                                        <td><?php echo $year;?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-success"><i class="fa fa-calendar"></i> Course ID</td>
                                                        <td><?php echo $course_id;?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-success"><i class="fa fa-calendar"></i> Exam Grade</td>
                                                        <td><?php echo $exam_grade;?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-success"><i class="fa fa-calendar"></i> Assignment Grade </td>
                                                        <td><?php echo $assignment_grade;?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-success"><i class="fa fa-calendar"></i> Start Date</td>
                                                        <td><?php echo $cstart_date;?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-success"><i class="fa fa-calendar"></i> End Date</td>
                                                        <td><?php echo $cend_date;?></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="text-success"><i class="fa fa-thumbs-up"></i>Attendence</td>
                                                        <td><?php echo $attendance;?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-success"><i class="glyphicon glyphicon-time"></i> Attempt</td>
                                                        <td><?php echo $attempt;?></td>
                                                    </tr>

                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                        <div id="Address" class="tab-pane fade">
                                            <div class="table-responsive panel">
                                                <table class="table">
                                                    <tbody>

                                                    <tr>
                                                        <td class="text-success"><i class="fa fa-home"></i>Home No</td>
                                                        <td>
                                                            <?php echo $no;?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-success"><i class="fa fa-home"></i> Street</td>
                                                        <td>
                                                            <?php echo $street;?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-success"><i class="fa fa-home"></i> Town</td>
                                                        <td>
                                                            <?php echo $town;?>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div id="Hostal" class="tab-pane fade">
                                            <div class="table-responsive panel">
                                                <table class="table">
                                                    <tbody>
                                                    <tr>
                                                        <td class="text-success"><i class="fa fa-university"></i> Hostal ID</td>
                                                        <td><?php echo $hostel_id;?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-success"><i class="fa fa-university"></i> Start Date</td>
                                                        <td><?php echo $hstart_date;?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-success"><i class="fa fa-university"></i> End date</td>
                                                        <td><?php echo $hend_date;?></td>
                                                    </tr>


                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                        <div id="Scholar" class="tab-pane fade">
                                            <div class="table-responsive panel">
                                                <table class="table">
                                                    <tbody>

                                                    

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <button name="op" value="cancel_changes" type="submit" class="btn btn-danger" style="float: right; margin-left: 10px;"><i class="fa fa-trash"></i> Cancel</button>
                                        <button name="op" value="save_changes" type="submit" class="btn btn-success" style="float: right"><i class="fa fa-gear"></i> Save Changes</button>
                                    </form>

                                </div>



                            </div>

                        </div>
                    </div>
                </div>
                <!-- /.table-responsive -->

            </div><!-- /.contend -->

        </div>


    </div>
</div>

</div>



</body>

</html>